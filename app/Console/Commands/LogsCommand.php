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
        foreach(Computer::all() as $computer) {
        $process = shell_exec('ifconfig');
        Storage::append("archivo.txt", $process);
        }
               
    }
}
