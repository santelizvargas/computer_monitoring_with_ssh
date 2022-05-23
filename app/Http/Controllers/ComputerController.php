<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ComputerController extends Controller
{
    private array $commands = [
        'memory',
        'disk',
        'ports',
        'process',
        'users',
        'table',
        'logs',
        'read',
        'ls'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Computer::all();

        return view(
            'computer.index', 
            [
                'computers' => $computers,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('computer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = $request->role;

        array_push($this->commands, $role);

        Computer::create([
            'name' => $request->name,
            'ip' => $request->ip,
            'role' => $role,
            'commands' => $this->commands
        ]);

        return redirect()->route('computers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function show(Computer $computer)
    {
        $outputs = collect($computer->commands)
            ->map(function($command) use($computer) {
                
                $process = new Process(['./monitoring.sh', $computer->ip, $command]);
                // $process = new Process(['./monitoring.sh', $command]);

                try {
                    $process->mustRun();
                    return $process->getOutput();
                } catch (ProcessFailedException $exception) {
                    return $exception->getMessage();
                }
            })
            ->toArray();

        $logs = $computer->logs()->latest()->first();

        return view('computer.show', [
            'computer' => $computer,
            'outputs' => $outputs,
            'logs' => $logs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function edit(Computer $computer)
    {
        return view('computer.edit', ['computer' => $computer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Computer $computer)
    {
        $commands = collect($computer->commands)
            ->filter(function($command) use($request) {
                return $command !== $request->oldRole;
            })
            ->toArray();

        array_push($commands, $request->role);

        $computer->update([
            'name' => $request->name,
            'ip' => $request->ip,
            'commands' => $commands
        ]);

        return redirect()->route('computers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Computer $computer)
    {
        $computer->delete();

        return redirect()->route('computers.index');
    }
}
