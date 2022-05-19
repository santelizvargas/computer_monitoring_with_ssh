<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Computer;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
        Computer::all()->foreach(function($computer) {
            $process = new Process(['./monitoring.sh', $computer->ip, 'logs']);

            try {
                $process->mustRun();
                $computer->logs->attach($process->getOutput());
            } catch (ProcessFailedException $exception) {
                echo $exception->getMessage();
            }
        });
        return 0;
    }
}
