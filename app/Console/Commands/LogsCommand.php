<?php

namespace App\Console\Commands;

use App\Models\Computer;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LogsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $process = new Process(['./monitoring.sh', 'logs']);
        $process->mustRun();

                Storage::append('archivo.txt', $process->getOutput());
        // Computer::all()->foreach(function($computer) {
                // $process = new Process(['./monitoring.sh', $computer->ip, 'logs']);
                // $process = new Process(['./monitoring.sh', 'logs']);

                // Storage::append('archivo.txt', $process->getOutput());
    
                // try {
                //     $process->mustRun();
                //     $computer->logs->attach($process->getOutput());
                // } catch (ProcessFailedException $exception) {
                //     echo $exception->getMessage();
                // }
            // });
    }
}
