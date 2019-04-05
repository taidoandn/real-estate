var map, infoWindow, pos, marker,geocoder;

function initMap() {
    geocoder = new google.maps.Geocoder();
    if ($("#latitude").val() && $("#longitude").val()) {
        pos = {lat: parseFloat($("#latitude").val()), lng: parseFloat($("#longitude").val())};
        showMap(pos,16);
        createMarker(pos);
    }else{
        showMap();
    }
    initSeachBox();
}

function initSeachBox () {
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();
        if (places.length == 0) {
          return;
        }
        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}

function showMap(pos = {lat: 16.047079, lng: 108.206230},zoom = 12) {
    map = new google.maps.Map(document.getElementById('map'), {
        center: pos,
        zoom: zoom,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    });
    google.maps.event.addListener(map, 'click', function(event) {
        if (marker) {
            removeMarker();
        }
        $("#latitude").val(event.latLng.lat());
        $("#longitude").val(event.latLng.lng());
        pos = {lat: event.latLng.lat(), lng: event.latLng.lng()};
        createMarker(pos);
        geocoder.geocode({'latLng': event.latLng}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var address = [];
                    $.each(results[0].address_components, function (key, value) {
                        if (value.types != 'postal_code') {
                            address.push(value.long_name);
                        }
                    });
                    $("#address").val(address.join(", "));
                    // $("#address").val(results[0].formatted_address);
                }
            }
        });
    });
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
    var latlng = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
    };
    var GEOCODING = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + position.coords.latitude + '%2C' + position.coords.longitude + '&language=en&key=AIzaSyCQuDQmtiHkS7CcriyEiYXWja3ODrG4vFI';
    $.getJSON(GEOCODING).done(function(location) {
        showMap(latlng,16);
        createMarker(latlng);
        $("#latitude").val(latlng.lat);
        $("#longitude").val(latlng.lng);
        $("#address").val(location.results[0].formatted_address);
        console.log(location.results[0]);
    })
}

function errorCallback() {
    console.log('The Geolocation service failed.');
}

function createMarker(pos){
    marker = new google.maps.Marker({
        position: pos,
        animation: google.maps.Animation.BOUNCE,
        clickable: true,
    });
    marker.setMap(map);
}

function removeMarker() {
    marker.setMap(null);
}
