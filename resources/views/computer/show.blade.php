<x-layout>
    <div class="__container--details text-white">
        @foreach ($computer->commands as $command)
            @if ($computer->commands[$loop->index] !== 'cliente')
                <pre>
                 {{ $outputs[$loop->index] }}
                </pre>
            @endif
        @endforeach
    </div>
</x-layout>
