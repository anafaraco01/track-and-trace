<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coordinates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- resources/views/vehicles/index.blade.php -->

                @section('content')
                    <table>
                        <thead>
                        <tr>
                            <th>Place</th>
                            <th>Y Coordinate</th>
                            <th>X Coordinate</th>
                            <th>Permission</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coordinates as $coordinate)
                            <tr>
                                <td>{{ $coordinate->place }}</td>
                                <td>{{ $coordinate->y_coordinate }}</td>
                                <td>{{ $coordinate->x_coordinate }}</td>
                                <td>{{ $coordinate->permission }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endsection
            </div>
        </div>
    </div>
</x-app-layout>
