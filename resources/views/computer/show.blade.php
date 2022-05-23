<x-layout>
    <div class="__container--details text-white">
            <div id="__data--computer">
                <div>
                    <h2>Information of computer <i class="bi bi-pc-display-horizontal"></i></h2>
                </div>
                <div>
                    <h2 class="mb-1">{{ $computer->name }}</h2>
                    <p><i class="bi bi-globe2"></i> {{ $computer->ip }}</p>
                    <p><i class="bi bi-hammer"></i> {{ $computer->role }}</p>
                </div>
            </div>
            
        <div>
            @foreach ($computer->commands as $command)
                @if ($computer->commands[$loop->index] !== 'cliente')
                    <button class="__accordion"> {{ $command }} </button>
                    <pre class="__panel">
                        {{ $outputs[$loop->index] }}
                    </pre>
                @endif
            @endforeach

            <button class="__accordion">  Logs </button>
            <pre class="__panel">
                {{$logs->logs}}
            </pre>
        </div>

    </div>
</x-layout>
