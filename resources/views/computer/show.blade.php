<x-layout>
    <div class="__container--details text-white">
        @foreach ($computer->commands as $command)
            <textarea>
            {{ $outputs[$loop->index] }}
            {{-- {{ $command }} --}}
            </textarea>
        @endforeach
    </div>
</x-layout>
