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
            #map { height: 80vh; width: 50vw; left: 5vw; top: 5vh}

        </style>
    @endsection

    @section('content')
        <div style="float: left; margin-left: 90px">
            <img src="./img/blue-car.png" style="height: 25vh; margin-left: 60px; margin-top: 30px">
            <img src="./img/red-car.png" style="height: 45vh; margin-left: 25px; margin-top: -30px">
            <img src="./img/yellow-car.png" style="height: 23vh; margin-top: -30px; margin-left: 20px">
        </div>

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

    let blueCar = L.icon({
        iconUrl: './img/blue-car.png',

        iconSize:     [45, 45], // size of the icon
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    L.marker([51.496294, 3.6074], {icon: blueCar}).addTo(map).bindPopup("I am allowed to be in allowed places and on conditional<br>places for 10 seconds.");

    let redCar = L.icon({
        iconUrl: './img/red-car.png',

        iconSize:     [45, 45], // size of the icon
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    L.marker([51.497, 3.6074], {icon: redCar}).addTo(map).bindPopup("I am only allowed to be<br>in allowed places.");

    let yellowCar = L.icon({
        iconUrl: './img/yellow-car.png',

        iconSize:     [45, 45], // size of the icon
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    L.marker([51.496294, 3.6074], {icon: yellowCar}).addTo(map).bindPopup("I am allowed to be everywhere.");;
</script>
    @endsection
</x-app-layout>
