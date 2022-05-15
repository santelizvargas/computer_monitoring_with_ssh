<x-layout>
    <div class="__container--details text-white">
        @foreach ($computer->commands as $command)
            @if ($computer->commands[$loop->index] !== 'cliente')
                <textarea readonly>
                 {{ $outputs[$loop->index] }}
            {{-- {{ $command }} --}}
            </textarea>
            @endif
        @endforeach
    </div>
</x-layout>
