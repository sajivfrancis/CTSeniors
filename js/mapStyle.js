// got this style from https://snazzymaps.com/
var mapStyle = [
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#46bcec"
            },
            {
                "visibility": "on"
            }
        ]
    }
]

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
