/* global L */
require('mapbox.js');

L.mapbox.accessToken = 'pk.eyJ1Ijoic2FtZGJlY2toYW0iLCJhIjoiSVk5cS1UTSJ9.0lCowgljkS2VZ_8ToBkPUA';
var map = L.mapbox.map('map', 'samdbeckham.l9hmpn0e',{
    zoomControl: false
});

if (map.tap) {
    map.dragging.disable();
    map.tap.disable();
}
