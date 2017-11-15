;/**
 * Get Browser/Mobile Location
 * @returns {undefined}
 */
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

/**
 * receives the position from getLocation and center the map on the user location
 * @param {object} position
 * @returns {undefined}
 */
function showPosition(position) {
    center(position.coords.latitude, position.coords.longitude);
}

/**
 * get the user location to use on google maps
 * @returns {undefined}
 */
function getGoogleLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(googlePosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

/**
 * set a global variable "currentPosition" with the user location
 * @param {object} position
 * @returns {undefined}
 */
function googlePosition(position) {
    currentPosition = getLatLng(position.coords.latitude, position.coords.longitude);
    //currentPosition = getLatLng(41.6032, -73.0877);
}

/**
 * set google object Latitude and Longitude
 * @param {int} lat
 * @param {int} lng
 * @returns {google.maps.LatLng}
 */
function getLatLng(lat, lng) {
    return new google.maps.LatLng(lat, lng);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
    setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
}

var map;
var infoWindow;
var service;
var geocoder;
var directionsDisplay;
var directionsService;
var currentPosition;
var markers = [];

function initMap() {
    geocoder = new google.maps.Geocoder();
    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();
    center(41.6032, -73.0877);
}

function center(lat, lng) {
    var myLatLng = {lat: lat, lng: lng};
    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 10,
        styles: mapStyle
    });

    infoWindow = new google.maps.InfoWindow();
    service = new google.maps.places.PlacesService(map);

    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('directionsPanel'));
    // The idle event is a debounced event, so we can query & listen without
    // throwing too many requests at the server.
    //map.addListener('idle', performSearch);

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map
    });
}

function codeAddress(label, address, city, state, icon) {
    var fullAddress = address + " " + city + " " + state;
    console.log(fullAddress);
    geocoder.geocode({'address': fullAddress}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            console.log(results);
            map.setCenter(results[0].geometry.location);

            var marker = new MarkerWithLabel({
                map: map,
                animation: google.maps.Animation.DROP,
                position: results[0].geometry.location,
                icon: {
                    path: icon,
                    scale: 0.5,
                    strokeWeight: 0.2,
                    strokeColor: '#000077',
                    strokeOpacity: 1,
                    fillColor: '#0000FF',
                    fillOpacity: 0.8,
                },
                labelContent: label,
                labelAnchor: new google.maps.Point(0, 0),
                labelClass: "mapsLabel", // your desired CSS class
                labelInBackground: true
            });

            markers.push(marker);
            calcRoute(fullAddress);
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

function calcRoute(end) {
    getGoogleLocation();
    var request = {
        origin: currentPosition,
        destination: end,
        travelMode: 'DRIVING'
    };
    directionsService.route(request, function (response, status) {
        if (status == 'OK') {
            directionsDisplay.setDirections(response);
        }
    });
}

/**
 * initialize with the user Location
 */
getGoogleLocation();

// A $( document ).ready() block.
$(document).ready(function () {
    getLocation();
});
