<x-layout title="Computers">
    <form 
        action="{{ route('computers.store') }}" 
        method="post"
    >
        @csrf

        <input type="text" name="name" id="name">

        <input type="text" name="ip" id="ip">

        <input type="text" name="role" id="role">

        <button type="submit">
            Send
        </button>
    </form>
</x-layout>