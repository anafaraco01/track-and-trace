    <x-app-layout>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

        <style>
            table td + td {
                border-left: 2px solid red;
            }
        </style>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- resources/views/vehicles/index.blade.php -->

                    @section('content')
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
                        <section class="hero is-small is-bold" style="background-color: cornflowerblue">
                            <div class="hero-body">
                                <div class="container">
                                    <p class="title is-2">Coordinates</p>
                                    <p class="subtitle is-3">Set your coordinates</p>
                                </div>
                            </div>
                        </section>
                        <br>
                        <div class="container">
                            <div class="columns is-centered">
                                <div class="column is-12">
                                    <table class="table rounded is-fullwidth is-size-4">
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
                                                <td class="nv-box">{{ $coordinate->place }}</td>
                                                <td class="nv-box">{{ $coordinate->y_coordinate }}</td>
                                                <td class="nv-box">{{ $coordinate->x_coordinate }}</td>
                                                <td class="{{ $coordinate->permission === 'Allowed' ? 'bg-green-500' : ($coordinate->permission === 'Forbidden' ? 'bg-red-500' : ($coordinate->permission === 'Conditional' ? 'bg-blue-400' : '')) }}">{{ $coordinate->permission }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endsection
                </div>
            </div>
        </div>
    </x-app-layout>
