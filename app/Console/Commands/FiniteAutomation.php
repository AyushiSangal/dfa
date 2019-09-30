<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FiniteAutomation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Finite:Automata {number} {size}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arguments = $this->arguments();
        // Drive Code 

        // size of binary array 
        $size = $arguments['size'];

        $num = $arguments['number'];
        $split_num = str_split($num);

        if ($this->isMultiple3($split_num, $size))
            $this->info('Current State is S0 which is final state, hence the number is divisible by 3');
        else
            $this->info('This will never happen with our above machine as all state can be final state');
    }

    public function isMultiple3($c, $size)
    {

        // initial state is 0th 
        $state = '0';

        for ($i = 0; $i < $size; $i++) {

            // storing binary digit 
            $digit = $c[$i];

            switch ($state) {

                    // when state is 0 
                case '0':
                    if ($digit == '1')
                        $state = '1';
                    break;

                    // when state is 1 
                case '1':
                    if ($digit == '0')
                        $state = '2';
                    else
                        $state = '0';
                    break;

                    // when state is 2 
                case '2':
                    if ($digit == '0')
                        $state = '1';
                    break;
            }
        }

        // if final state is 0th state 
        if ($state == '0') {
            return true;
        }

        return false;
    }
}
