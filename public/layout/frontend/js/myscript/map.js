var map;
function initMap() {
    var position = {lat: parseFloat($("#latitude").val()), lng: parseFloat($("#longitude").val())};

    map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: position});

   createMarker(position);
}

function getGeolocation() {
    initMap();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successCallback,errorCallback,{maximumAge:600, timeout:5000, enableHighAccuracy:true});
    } else {
        alert("'Error: Your browser doesn\'t support geolocation.'");
    }
}

function successCallback(position) {
    var latitude          = position.coords.latitude;                     //users current
    var longitude         = position.coords.longitude;                    //location
    var coords            = new google.maps.LatLng(latitude, longitude);  //Creates variable for map coordinates
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer();
    var mapOptions        =  {
        zoom: 15,  //Sets zoom level (0-21)
        center: coords, //zoom in on users location
        mapTypeControl: true, //allows you to select map type eg. map or satellite
        navigationControlOptions:
        {
            style: google.maps.NavigationControlStyle.SMALL //sets map controls size eg. zoom
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP //sets type of map Options:ROADMAP, SATELLITE, HYBRID, TERRIAN
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('panel'));
    var request = {
        origin: coords,
        destination: $("#latitude").val() + ", " + $("#longitude").val(),
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };

    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });
}

function errorCallback() {
    alert('The Geolocation service failed.');
}

function createMarker(pos){
    marker = new google.maps.Marker({
        position: pos,
        animation: google.maps.Animation.BOUNCE,
        clickable: true,
    });
    marker.setMap(map);
}
