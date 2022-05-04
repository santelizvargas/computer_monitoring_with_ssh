<x-layout title="Computers">
    <div class="__container--computers">
        <div class="__container--child">
            @forelse($computers as $computer)
                <a href="{{ route('computers.show', $computer->id) }}">
                    <h2>{{ $computer->name }}</h2>
                </a>

            @empty
                <a href="{{ route('computers.create') }}">
                    Create computer
                </a>
            @endforelse
        </div>
    </div>
</x-layout>
