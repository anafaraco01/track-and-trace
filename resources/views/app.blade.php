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
        <div style="float: left; margin-left: 60px; position: absolute;">
            <div id="blueCarErrorForbidden" style="position: absolute; background-color: red; opacity: 70%; padding: 30px; text-align: center; margin-top: -450px; display: none"><p style="color: black; font-size: 20px; width: 400px"><strong>FORBIDDEN</strong> The blue car is not allowed to be here</p></div>
            <div id="blueCarErrorConditional" style="position: absolute; background-color: yellow; opacity: 70%; padding: 20px; text-align: center; margin-top: -450px; display: none; margin-left: 50px; width: 400px"><p style="color: black; font-size: 20px"><strong>TIME</strong> The blue car has exceeded<br>the allowed duration time</p></div>
            <div id="redCarError" style="position: absolute; background-color: red; opacity: 70%; padding: 30px; text-align: center; margin-top: -200px; display: none"><p style="color: black; font-size: 20px; width: 400px"><strong>FORBIDDEN</strong> The red car is not allowed to be here</p></div>
        </div>
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
                iconAnchor:   [25, 45], // point of the icon which will correspond to marker's location
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            let blue = L.marker([51.496294, 3.6074], {icon: blueCar}).bindPopup("I am allowed to be in allowed places and on conditional<br>places for 10 seconds.");

            let redCar = L.icon({
                iconUrl: './img/red-car.png',

                iconSize:     [70, 70], // size of the icon
                iconAnchor:   [33, 50], // point of the icon which will correspond to marker's location
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            let red = L.marker([51.497, 3.6074], {icon: redCar}).bindPopup("I am only allowed to be<br>in allowed places.");

            let yellowCar = L.icon({
                iconUrl: './img/yellow-car.png',

                iconSize:     [65, 50], // size of the icon
                iconAnchor:   [25, 45], // point of the icon which will correspond to marker's location
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            let yellow = L.marker([51.496294, 3.6074], {icon: yellowCar}).bindPopup("I am allowed to be everywhere.");

            function getCoordinates(id) {
                return [coordinates[id].y_coordinate, coordinates[id].x_coordinate];
            }

            console.log(blue);
            let blueID = 0;
            let redID = 0;
            let yellowID = 0;

            let blueAlarm = undefined;
            let redAlarm;
            let blueForbidden;

            document.addEventListener('keydown', function(event) {
                let count = coordinates.length;
                document.getElementById('blueCarErrorConditional').style.display = 'none';
                if (event.key === 'ArrowLeft') {
                    if (blueAlarm !== undefined) {
                        clearTimeout(blueAlarm);
                        blueAlarm = undefined;
                    }
                    if (coordinates[blueID].permission === 'Forbidden') {
                        document.getElementById('blueCarErrorForbidden').style.display = 'block';
                    } else {
                        document.getElementById('blueCarErrorForbidden').style.display = 'none';
                    }
                    map.removeLayer(blue);
                    blue = L.marker(getCoordinates(blueID), {icon: blueCar}).addTo(map).bindPopup("I am allowed to be in allowed places and on conditional<br>places for 10 seconds.");
                    if (coordinates[blueID].permission === 'Conditional') {
                        blueAlarm = setTimeout(function () {
                            document.getElementById('blueCarErrorConditional').style.display = 'block';
                        }, 10000);
                    }
                    blueID++;
                }
                if (event.key === 'ArrowUp') {

                    map.removeLayer(red);
                    red = L.marker(getCoordinates(redID), {icon: redCar}).addTo(map).bindPopup("I am only allowed to be<br>in allowed places.");
                    if (coordinates[redID].permission !== 'Allowed') {
                        document.getElementById('redCarError').style.display = 'block';
                    } else {
                        document.getElementById('redCarError').style.display = 'none';
                    }
                    redID++;
                }
                if (event.key === 'ArrowRight') {
                    map.removeLayer(yellow);
                    yellow = L.marker(getCoordinates(yellowID), {icon: yellowCar}).addTo(map).bindPopup("I am allowed to be everywhere.");
                    yellowID++;
                }
                if (count === blueID) {
                    blueID = 0;
                }
                if (count === redID) {
                    redID = 0;
                }
                if (count === yellowID) {
                    yellowID = 0;
                }

                console.log(coordinates)
                //if ()
                console.log(blueID);
                console.log('Key pressed:', event.key);
            });
        </script>
    @endsection
</x-app-layout>
