<?php

namespace App\Console\Commands;

use App\Models\Computer;
use App\Models\Log;
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
    protected $description = 'commnd logs save with CRON shedule 5 seconds';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach(Computer::all() as $computer) {

            $sshConection = exec('ssh root@'.$computer->ip.' hostname');
        
            $process = new Process([
                './public/monitoring.sh',
                 $computer->ip, 'logs'
                ]);

            
            try {
                $process->mustRun();

                Log::create([
                    'computer_id' => $computer->id,
                    'logs' => $process->getOutput()
                ]);

                Storage::append(
                    ''.$sshConection.'-'.$computer->ip.'.log',
                    '['. date("Y-m-d H:i:s").'] -> '. $process->getOutput()
                );

            } catch (ProcessFailedException $exception) {
                Log::create([
                'computer_id' => $computer->id,
                    'logs' => $exception->getMessage()
                ]);
            }
        
        }
               
    }
}
