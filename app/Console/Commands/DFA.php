<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Utilities\Jobs\CheckBitwiseNumber as Job;

class DFA extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bit:wise {number} {divisible}';

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
        $num = $arguments['number'];
        $k = $arguments['divisible'];
        $rem = Job::run($num, $k);

        if ($rem == 0) {
            $this->info(' Output for state S0 = ' . $rem . ' Current State is S0 which is final state, hence the number is divisible by ' . $k);
        } else {
            $this->info('This will never happen with our above machine as all state can be final state');
        }
    }
}
