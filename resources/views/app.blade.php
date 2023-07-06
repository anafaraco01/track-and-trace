<x-app-layout>

@section('head')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
              integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
              crossorigin=""/>
        <style>
            /*
     * Always set the map height explicitly to define the size of the div element
     * that contains the map.
     */
            #map { height: 80vh; width: 50vw; left: 25vw; top: 5vh}

        </style>
    @endsection

    @section('content')




<div id="map"></div>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
<script>
    let coordinates = @json($coordinates);

    let map = L.map('map').setView([51.4976, 3.61], 15);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    coordinates.forEach(function (coordinate) {
        L.marker([coordinate.y_coordinate, coordinate.x_coordinate]).addTo(map)
            .bindPopup(coordinate.place)
            .openPopup();
    });
</script>
    @endsection
</x-app-layout>
