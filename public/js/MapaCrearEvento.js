// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var markers = [];
var marcador=0;

function initialize() {
  var haightAshbury = new google.maps.LatLng(-41.1416606, -71.3053098);
  var mapOptions = {
    zoom: 14,
    center: haightAshbury,
    //mapTypeId: google.maps.MapTypeId.TERRAIN
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // This event listener will call addMarker() when the map is clicked.
  google.maps.event.addListener(map, 'click', function(event) { addMarker(event.latLng); });

  // Adds a marker at the center of the map.
  //addMarker(haightAshbury);
}

// Add a marker to the map and push to the array.
function addMarker(location) 
{
  if (marcador==0) 
  {
  var marker = new google.maps.Marker
  ({
    position: location,
    map: map
  });
  marcador=marcador+1;

  markers.push(marker);
};//del if
}

// Sets the map on all markers in the array.
function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setAllMap(null);
  marcador=0
}

// Shows any markers currently in the array.
function showMarkers() {
  setAllMap(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}
