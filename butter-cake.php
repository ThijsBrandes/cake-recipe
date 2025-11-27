<?php

class ButterCakeRecipe
{
    protected array $ingredients = [
        '1 pack of KoopMans butter cake mix',
        '1 egg',
        '200 grams of dairy butter',
    ];

    protected array $kitchenSupplies = [
        '24cm in diameter springform pan',
        'mixer with dough hooks',
        'spoon',
        'fork',
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
    public function handle(): void
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

    public function prepare(): void
    {
        $ovens = array_keys($this->ovenSettings);
        $chosenOven = $this->choice('Which oven would you like to use?', $ovens);

        $ovenTemperature = $this->ovenSettings[$chosenOven];

        $this->info("\n\e[1mGreat choice! Let's get started...\e[0m\n");

        $this->info("Place your oven rack in the middle of the oven...");
        $ovenRackPlaced = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($ovenRackPlaced === 'No') {
            $this->warn("Don't forget to place your oven rack in the middle before proceeding!");
            return;
        }
        
        $this->info("\n\e[1mNext step...\e[0m\n");

        $this->info('Please preheat your oven to ' . $ovenTemperature . '...');
        $ovenPreheated = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($ovenPreheated === 'No') {
            $this->warn("Don't forget to preheat your oven to " . $ovenTemperature . " before proceeding!");
            return;
        }

        $this->info("\n\e[1mNext step...\e[0m\n");

        $this->info("Beat {$this->ingredients[1]} in a small bowl...");
        $eggBeaten = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($eggBeaten === 'No') {
            $this->warn("Don't forget to beat {$this->ingredients[1]} in a small bowl before proceeding!");
            return;
        }

        $this->info("\n\e[32m✔ You're ready to make the batter!\e[0m");
        
        usleep(1500000);
    }

    public function makeBatter(): void
    {
        $this->info("\n\e[1mNext step...\e[0m\n");
        $this->info("Using a {$this->kitchenSupplies[1]}, soften the {$this->ingredients[2]} in a mixing bowl...");
        $softenedButter = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($softenedButter === 'No') {
            $this->warn("Don't forget to soften the {$this->ingredients[2]} in a mixing bowl before proceeding!");
            return;
        }

        $this->info("\n\e[1mNext step...\e[0m\n");

        $this->info("Then add the {$this->ingredients[0]} and 2/3 of the beaten {$this->ingredients[1]}...");
        $ingredientsAdded = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($ingredientsAdded === 'No') {
            $this->warn("Don't forget to add the {$this->ingredients[0]} and 2/3 of the beaten {$this->ingredients[1]} before proceeding!");
            return;
        }

        $this->info("\n\e[1mNext step...\e[0m\n");

        $this->info("Knead the mixture with a {$this->kitchenSupplies[1]} or by hand until a cohesive dough forms...");
        $doughFormed = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($doughFormed === 'No') {
            $this->warn("Don't forget to knead the mixture with a {$this->kitchenSupplies[1]} or by hand until a cohesive dough forms before proceeding!");
            return;
        }

        $this->info("\n\e[1mNext step...\e[0m\n");

        $this->info("Place the dough in the {$this->kitchenSupplies[0]} and spread the dough over the {$this->kitchenSupplies[0]} using the rounded side of a wet {$this->kitchenSupplies[2]}...");
        $doughSpread = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($doughSpread === 'No') {
            $this->warn("Don't forget to place the dough in the {$this->kitchenSupplies[0]} and spread the dough over the {$this->kitchenSupplies[0]} using the rounded side of a wet {$this->kitchenSupplies[2]} before proceeding!");
            return;
        }

        $this->info("\n\e[1mNext step...\e[0m\n");

        $this->info("Brush the dough with the remaining beaten {$this->ingredients[1]}...");
        $doughBrushed = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($doughBrushed === 'No') {
            $this->warn("Don't forget to brush the dough with the remaining beaten {$this->ingredients[1]} before proceeding!");
            return;
        }

        $this->info("\n\e[1mNext step...\e[0m\n");

        $this->info("Using a {$this->kitchenSupplies[3]}, draw diagonal lines in the dough to create a diamond pattern...");
        $diamondPatternCreated = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($diamondPatternCreated === 'No') {
            $this->warn("Don't forget to draw diagonal lines in the dough to create a diamond pattern before proceeding!");
            return;
        }

        $this->info("\n\e[32m✔ You're ready to bake!\e[0m");
        
        usleep(1500000);
    }

    public function calculateTime(float $startTime, float $endTime): void
    {
        $duration = $endTime - $startTime;
        $this->info("\n-----------------------------------------------");
        $this->info("Time taken: " . number_format($duration / 60, 2) . " minutes");
        $this->info("Average time for preperation: " . $this->preperationTime['preperation']);
        $this->info("-----------------------------------------------");
    }

    public function bake(): void
    {
        $this->info("\n\e[1mNext step...\e[0m\n");
        $this->info("Bake the cake in the oven for {$this->preperationTime['baking']}...");
        $baked = strtolower($this->ask("\e[1mStart timer? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($baked === 'No') {
            $this->warn("Don't forget to bake the cake in the oven for {$this->preperationTime['baking']} before proceeding!");
            
            return;
        }

        $this->info("\nHit enter to stop the timer...");
        $bar = $this->createProgressBar($this->preperationTime['bakingTime']);
        $bar->start();

        $timerStopped = false;
        for ($i = 0; $i < $this->preperationTime['bakingTime'] && !$timerStopped; $i++) {
            for ($j = 0; $j < 60 && !$timerStopped; $j++) {
                $read = [STDIN];
                $write = null;
                $except = null;

                if (stream_select($read, $write, $except, 0, 0) > 0) {
                    $input = trim(fgets(STDIN));
                    if ($input === '') {
                        $timerStopped = true;
                        $this->info("\n\e[33mTimer stopped by user.\e[0m\n");
                        
                        break;
                    }
                }

                sleep(1);
            }

            if (!$timerStopped) {
                $bar->advance();
            }
        }

        $bar->finish();
        $this->info("\n");

        $this->info("\n\e[1mNext step...\e[0m\n");

        $this->info("Take the cake out of the oven...");
        $cakeTakenOut = strtolower($this->ask("\e[1mDone? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($cakeTakenOut === 'No') {
            $this->warn("Don't forget to take the cake out of the oven before proceeding!");
            return;
        }

        $this->info("\n\e[32m✔ You're ready to cool!\e[0m");
        
        usleep(1500000);
    }

    public function cool(): void
    {
        $this->info("\n\e[1mNext step...\e[0m\n");
        $this->info("Let the cake cool for {$this->preperationTime['cooling']} before taking it out of the {$this->kitchenSupplies[0]}");
        $cooled = strtolower($this->ask("\e[1mStart timer? (yes/no)\e[0m")) === 'yes' ? 'Yes' : 'No';

        if ($cooled === 'No') {
            $this->warn("Don't forget to let the cake cool for {$this->preperationTime['cooling']} before taking it out of the {$this->kitchenSupplies[0]} before proceeding!");
            
            return;
        }

        $this->info("\nHit enter to stop the timer...");
        $bar = $this->createProgressBar($this->preperationTime['coolingTime']);
        $bar->start();

        $timerStopped = false;

        for ($i = 0; $i < $this->preperationTime['coolingTime'] && !$timerStopped; $i++) {
            for ($j = 0; $j < 60 && !$timerStopped; $j++) {
                $read = [STDIN];
                $write = null;
                $except = null;

                if (stream_select($read, $write, $except, 0, 0) > 0) {
                    $input = trim(fgets(STDIN));
                    if ($input === '') {
                        $timerStopped = true;
                        $this->info("\n\e[33mTimer stopped by user.\e[0m\n");
                        
                        break;
                    }
                }

                sleep(1);
            }

            if (!$timerStopped) {
                $bar->advance();
            }
        }

        $bar->finish();
        $this->info("\n");

        $this->info("\n\e[32m✔ You're ready to serve!\e[0m");

        usleep(1500000);
    }

    public function serve(): void
    {
        $this->info("\n\e[1mNext step...\e[0m\n");
        $this->info("Bring the cake to work and show off your (orange)talent!");

        sleep(5);
    }

    protected function info(string $message): void
    {
        echo $message . "\n";
    }

    protected function warn(string $message): void
    {
        echo "\e[33m" . $message . "\e[0m\n";
    }

    protected function ask(string $question): string
    {
        echo $question . " ";

        $handle = fopen("php://stdin", "r");
        $line = fgets($handle);
        fclose($handle);

        return trim($line);
    }

    protected function choice(string $question, array $choices): string
    {
        $this->info($question);

        foreach ($choices as $index => $choice) {
            $this->info("  [" . ($index + 1) . "] " . $choice);
        }

        $selected = null;

        while ($selected === null) {
            $input = $this->ask("\e[1m> \e[0m");
            $index = (int)$input - 1;

            if (isset($choices[$index])) {
                $selected = $choices[$index];
            } else {
                $this->warn("Invalid choice. Please try again.");
            }
        }

        return $selected;
    }

    protected function createProgressBar(int $max): object
    {
        return new class($max) {
            private int $max;
            private int $current = 0;
            private bool $started = false;

            public function __construct(int $max)
            {
                $this->max = $max;
            }

            public function start(): void
            {
                $this->started = true;
                $this->display();
            }

            public function advance(): void
            {
                if (!$this->started) {
                    return;
                }
                $this->current++;
                $this->display();
            }

            public function finish(): void
            {
                $this->current = $this->max;
                $this->display();
            }

            private function display(): void
            {
                $percentage = $this->max > 0 ? ($this->current / $this->max) * 100 : 0;
                $filled = (int)($percentage / 2);
                $empty = 50 - $filled;

                echo "\r[";
                echo str_repeat("=", $filled);
                echo str_repeat(" ", $empty);
                echo "] " . number_format($percentage, 1) . "%";
            }
        };
    }
}

if (php_sapi_name() === 'cli' && basename(__FILE__) === basename($_SERVER['PHP_SELF'])) {
    $recipe = new ButterCakeRecipe();
    $recipe->handle();
}