var map;
function initMap() {
    var position = {lat: parseFloat($("#latitude").val()), lng: parseFloat($("#longitude").val())};

    map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: position});

   createMarker(position);
}

function createMarker(pos){
    marker = new google.maps.Marker({
        position: pos,
        animation: google.maps.Animation.BOUNCE,
        clickable: true,
    });
    marker.setMap(map);
}
