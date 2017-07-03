var map;
gmarkers = [];
function initMap () {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: -34.397,
            lng: 150.644
        },
        mapTypeId: 'satellite',
        zoom: 8
    });

    map.addListener('click', function (e) {
        addMarker(this, e.latLng);
    });

    map.addListener('idle', function (e) {
        loadSearchBox(this);
    });

    $('#pac-input').hide();
}

function addMarker (map, latLng) {
    var marker = new google.maps.Marker({
        map: map,
        position: latLng,
        draggable: true,
        icon: 'icons/radar.png'
    });

    gmarkers.push(marker);

    marker.id = gmarkers.length;

    marker.addListener('click', function (e) {
        map.setZoom(20);
        map.setCenter(this.getPosition());
    });
}

function loadSearchBox (map) {
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    $('#pac-input').show();
}