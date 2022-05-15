<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LogsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save logs in info log file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        file_put_contents('info.log', "Every 5 seconds" . now());
        return 0;
    }
}
