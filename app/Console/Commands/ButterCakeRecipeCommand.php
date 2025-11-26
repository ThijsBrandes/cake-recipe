<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ButterCakeRecipeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recipe:butter-cake';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a butter cake using this command (Based on the KoopMans package)
    STORAGE TIP
    Keep the butter cake in a sealed container for up to 4 days.
    Frozen, the butter cake will keep for up to 3 weeks (if properly wrapped).
    
    TIP
    Mix about 100g of mixed (chopped) nuts with the remaining egg. Spread the nut mixture over the cake and press it down lightly.
    Note: Do not use pecans or walnuts.';

    protected array $ingredients = [
        '1 pack of KoopMans butter cake mix',
        '1 egg',
        '200 grams of dairy butter',
    ];

    protected array $kitchenSupplies = [
        '24cm in diameter pringform pan',
        'Mixer with dough hooks',
        'Spoon',
        'Fork',
    ];

    protected array $ovenSettings = [
        'Electric oven (recommended)' => '180°C',
        'Gas oven' => 'Setting 3-4',
        'Convection oven' => '165°C',
    ];

    protected array $preperationTime = [
        'preperation' => '± 10 minutes',
        'baking' => '± 25 minutes',
        'bakingTime' => 25,
        'cooling' => '± 1 hour',
        'coolingTime' => 60,
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startTime = microtime(true);

        $this->prepare();
        $this->makeBatter();

        $endTime = microtime(true);
        $this->calculateTime($startTime, $endTime);

        $this->bake();
        $this->cool();
        $this->serve();
    }

    public function prepare() {

        $ovens = array_keys($this->ovenSettings);
        $chosenOven = $this->choice('Which oven would you like to use?', $ovens);

        $ovenTemperature = $this->ovenSettings[$chosenOven];

        $this->info("Place your oven rack in the middle of the oven...");
        $ovenRackPlaced = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($ovenRackPlaced === 'No') {
            $this->warn("Don't forget to place your oven rack in the middle before proceeding!");
            return;
        }
        $this->info("\e[1mNext step...\e[0m");

        $this->info('Please preheat your oven to ' . $ovenTemperature . '...');
        $ovenPreheated = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($ovenPreheated === 'No') {
            $this->warn("Don't forget to preheat your oven to " . $ovenTemperature . " before proceeding!");
            return;
        }

        $this->info("\e[1mNext step...\e[0m");

        $this->info("Beat {$this->ingredients[1]} in a small bowl...");
        $eggBeaten = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($eggBeaten === 'No') {
            $this->warn("Don't forget to beat {$this->ingredients[1]} in a small bowl before proceeding!");
            return;
        }

        $this->info("\e[32m✔ You're ready to make the batter!\e[0m\n");
        sleep(1.5);
    }

    public function makeBatter() {
        $this->info("\e[1mNext step...\e[0m");
        $this->info("Using a {$this->kitchenSupplies[1]}, soften the {$this->ingredients[2]} in a mixing bowl...");
        $softenedButter = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($softenedButter === 'No') {
            $this->warn("Don't forget to soften the {$this->ingredients[2]} in a mixing bowl before proceeding!");
            return;
        }

        $this->info("Then add the {$this->ingredients[0]} and 2/3 of the beaten {$this->ingredients[1]}...");
        $ingredientsAdded = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($ingredientsAdded === 'No') {
            $this->warn("Don't forget to add the {$this->ingredients[0]} and 2/3 of the beaten {$this->ingredients[1]} before proceeding!");
            return;
        }

        $this->info("Knead the mixture with a {$this->kitchenSupplies[1]} or by hand until a cohesive dough forms...");
        $doughFormed = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($doughFormed === 'No') {
            $this->warn("Don't forget to knead the mixture with a {$this->kitchenSupplies[1]} or by hand until a cohesive dough forms before proceeding!");
            return;
        }

        $this->info("Place the dough in the {$this->kitchenSupplies[0]} and spread the dough over the {$this->kitchenSupplies[0]} using the rounded side of a wet {$this->kitchenSupplies[2]}...");
        $doughSpread = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($doughSpread === 'No') {
            $this->warn("Don't forget to place the dough in the {$this->kitchenSupplies[0]} and spread the dough over the {$this->kitchenSupplies[0]} using the rounded side of a wet {$this->kitchenSupplies[2]} before proceeding!");
            return;
        }

        $this->info("Brush the dough with the remaining beaten {$this->ingredients[1]}...");
        $doughBrushed = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($doughBrushed === 'No') {
            $this->warn("Don't forget to brush the dough with the remaining beaten {$this->ingredients[1]} before proceeding!");
            return;
        }

        $this->info("Using a {$this->kitchenSupplies[3]}, draw diagonal lines in the dough to create a diamond pattern...");
        $diamondPatternCreated = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($diamondPatternCreated === 'No') {
            $this->warn("Don't forget to draw diagonal lines in the dough to create a diamond pattern before proceeding!");
            return;
        }

        $this->info("\e[32m✔ You're ready to bake!\e[0m\n");
        sleep(1.5);
    }

    public function calculateTime($startTime, $endTime) {
        $duration = $endTime - $startTime;
        $this->info("\n-----------------------------------------------");
        $this->info("Time taken: " . number_format($duration / 60, 2) . " minutes");
        $this->info("Average time for preperation: " . $this->preperationTime['preperation']);
        $this->info("-----------------------------------------------\n");
    }

    public function bake() {
        $this->info("\e[1mNext step...\e[0m");
        $this->info("Bake the cake in the oven for {$this->preperationTime['baking']}...");
        $baked = strtolower($this->ask("\e[1mStart timer? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($baked === 'No') {
            $this->warn("Don't forget to bake the cake in the oven for {$this->preperationTime['baking']} before proceeding!");
            return;
        }

        $bar = $this->output->createProgressBar($this->preperationTime['bakingTime']);
        $bar->start();

        for ($i = 0; $i < $this->preperationTime['bakingTime']; $i++) {
            $bar->advance();
            sleep(60);
        }

        $bar->finish();
        $this->info("\n");

        $this->info("Take the cake out of the oven...");
        $cakeTakenOut = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($cakeTakenOut === 'No') {
            $this->warn("Don't forget to take the cake out of the oven before proceeding!");
            return;
        }

        $this->info("\e[32m✔ You're ready to cool!\e[0m\n");
        sleep(1.5);
    }

    public function cool() {
        $this->info("\e[1mNext step...\e[0m");
        $this->info("Let the cake cool for {$this->preperationTime['cooling']} before taking it out of the {$this->kitchenSupplies[0]}");
        $cooled = strtolower($this->ask("\e[1mStart timer? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($cooled === 'No') {
            $this->warn("Don't forget to let the cake cool for {$this->preperationTime['cooling']} before taking it out of the $this->kitchenSupplies[0] before proceeding!");
            return;
        }

        $bar = $this->output->createProgressBar($this->preperationTime['coolingTime']);
        $bar->start();

        for ($i = 0; $i < $this->preperationTime['coolingTime']; $i++) {
            $bar->advance();
            sleep(60);
        }

        $bar->finish();
        $this->info("\n");

        $this->info("\e[32m✔ You're ready to serve!\e[0m\n");
        sleep(1.5);
    }

    public function serve() {
        $this->info("\e[1mNext step...\e[0m");
        $this->info("Bring the cake to work and show off your (orange)talent!");
        sleep(5);
    }
}
