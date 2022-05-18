<x-layout>
    <div class="__container--details text-white">
       <div> {{ $computer->name}}
        {{ $computer->ip}}
        {{ $computer->role}}
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
    </div>

    </div>
</x-layout>
