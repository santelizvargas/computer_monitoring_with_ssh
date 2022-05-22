<x-layout title="Computers" schedule="test()">
    <div class="__container--form--create">
        <form action="{{ route('computers.store') }}" method="post" class="__form--create">
            @csrf
            <h2>New Computer</h2>
            <div>
                <span><i class="bi bi-pc-display-horizontal"></i></span>
                <input type="text" name="name" id="name" required>
            </div>

            <div>
                <span><i class="bi bi-globe2"></i></span>
                <input type="text" name="ip" id="ip" required>
            </div>

            <div>
                <span><i class="bi bi-hammer"></i></span>
                <input type="text" name="role" id="role" required>
            </div>

            <button type="submit">
                Send
            </button>
        </form>
    </div>

</x-layout>
