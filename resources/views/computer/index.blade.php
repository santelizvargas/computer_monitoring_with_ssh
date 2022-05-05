<x-layout title="Computers">
    <div class="__container--computers">
        <div class="__container--child">
            <table>
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Ip
                        </th>
                        <th>
                            Options
                        </th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($computers as $computer)
                        <tr>
                            <a href="{{ route('computers.show', $computer->id) }}">
                                <td>
                                    <i class="bi bi-pc-display-horizontal"></i> {{ $computer->name }}
                                </td>
                                <td>
                                    <i class="bi bi-globe2"></i> {{ $computer->ip }}
                                </td>
                                <td id="__options">
                                    <a href="{{ route('computers.show', $computer->id) }}" name="show">
                                        <i class="bi bi-eye-fill"></i> See
                                    </a>

                                    <a href="#">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                </td>
                            </a>
                        </tr>
                    @empty
                        <td colspan="3">
                            no hay maquinas
                        </td>
                    @endforelse


                </tbody>
            </table>

        </div>

        <a href="{{ route('computers.create') }}" id="__create--computer">
            <i class="bi bi-plus-square"></i> Create computer
        </a>

    </div>
</x-layout>
