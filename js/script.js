/**
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

/**
 * initialize with the user Location
 */
getGoogleLocation();

// A $( document ).ready() block.
$(document).ready(function () {
    getLocation();
});
