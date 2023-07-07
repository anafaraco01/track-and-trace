<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- resources/views/vehicles/index.blade.php -->

                @section('content')
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
                    <section class="hero  is-small  is-bold" style="background-color: cornflowerblue">
                        <div class="hero-body">
                            <div class="container">
                                <p class="title is-2">Coordinates</p>
                                <p class="subtitle is-3">Set your coordinates</p>
                            </div>
                        </div>
                    </section>
                    <table class="table">
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
                            <tr bgcolor="{{ $coordinate->permission === 'Allowed' ? 'lightgreen' : ($coordinate->permission === 'Forbidden' ? 'red' : ($coordinate->permission === 'Conditional' ? 'lightblue': '')) }}">

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
