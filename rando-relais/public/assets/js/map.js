let mymap = L.map('mapid').setView([51.505, -0.09], 13);

L.tileLayer('//{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    maxZoom: 18,
    id: 'mapbox/streets-v11',

}).addTo(mymap);

let circle = L.circle([51.508, -0.11], {
   color: 'red',
   fillColor: '#f03',
   fillOpacity: 0.5,
   radius: 500
}).addTo(mymap);