<!-- resources/views/vehicles/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Local</h1>

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
