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

    createRemoveMarkerBin(map);

    $('#pac-input').hide();

    $('#loading').remove();
    $('#map').show();
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

    marker.addListener('click', function () {
        map.setZoom(20);
        map.setCenter(this.getPosition());

        if (!this.infoWindow) {
            this.infoWindow = generateInfoWindow();

            loadInfoWindowContentForMarker(this);
        }

        if (this.infoWindow.isOpen) {
            this.infoWindow.close();
            this.infoWindow.isOpen = false;

            return true;
        }

        this.infoWindow.open(map, this);
        this.infoWindow.isOpen = true;
    });
}

function generateInfoWindow () {
    return new google.maps.InfoWindow();
}

function loadInfoWindowContentForMarker (marker) {
    $.ajax({
        url: "index.php",
        method: "POST",
        data: { action: 1 }
    }).done(function(data) {
        marker.infoWindow.setContent(data);
    });
}

function loadSearchBox (map) {
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    $('#pac-input').show();
}

function createRemoveMarkerBin (map) {
    var div = document.getElementById('bin');
    div.addEventListener('dragend', function() {
        alert("muh");
    });

    map.controls[google.maps.ControlPosition.LEFT_CENTER].push(div);
}

function openFileDialog () {
    $('#file').click();
}