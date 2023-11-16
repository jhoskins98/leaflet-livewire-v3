<x-map-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Map Example 1') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div id="map_id" style="width: 600px; height: 400px;"></div>
            </div>
        </div>
    </div>
    <script>

        var my_map = L.map('map_id').setView([ 38.882243,-77.171103], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(my_map);

        var geoJSON_EB = {
            "type": "FeatureCollection",
            "features": [{
                "type": "Feature",
                "properties": {
                    "shape": "Polygon",
                    "name": "East B",
                    "category": "default"
                },
                "geometry": {
                    "type": "Polygon",
                    "coordinates": [
                        [
                            [-77.1523, 38.87353],
                            [-77.14276, 38.87303],
                            [-77.13351, 38.87503],
                            [-77.139, 38.88008],
                            [-77.15651, 38.88592],
                            [-77.15465, 38.88172],
                            [-77.1523, 38.87353]
                        ]
                    ]
                },
                "id": "fd0170ae-4e1d-4f9b-98ea-0192c3e7772a"
            }]
        }

        var myStyle_blue = {
            "color": "#0000FF",
            "weight": 5,
            "opacity": 0.65
        };

        L.geoJSON(geoJSON_EB, {
            style: myStyle_blue
        }).bindTooltip('this is area EB').addTo(my_map);

        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(my_map);
        }

        my_map.on('click', onMapClick);

    </script>
    
</x-map-layout>
