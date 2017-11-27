function initMap() {
    var cluster = [];
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 16.0326902, lng: 108.2104015},
        zoom: 5,
        styles: [
        {
            "featureType": "poi.business",
            "stylers": [
            {
                "visibility": "off"
            }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text",
            "stylers": [
            {
                "visibility": "off"
            }
            ]
        }]
    });
    var garbages = document.getElementById("map").getAttribute("garbages");
    console.log(typeof(garbages));
    var markers = JSON.parse(garbages);
    console.log(markers);

    Array.prototype.forEach.call(markers, function(markerElem) {
        var id = markerElem.id;
        var name = markerElem.name;
        var street = markerElem.street;
        var district = markerElem.district;
        var city = markerElem.city;
        var country = markerElem.country;
        var type = markerElem.type;
        var lat = markerElem.lat;
        var lng = markerElem.lng;

        var location = new google.maps.LatLng(
            parseFloat(markerElem.lat),
            parseFloat(markerElem.lng));

        var infoWindow = new google.maps.InfoWindow;

        var icon = {
            url: "images/garbage.png", // url
            scaledSize: new google.maps.Size(25, 25), // scaled size
            origin: new google.maps.Point(0, 0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
        }

        var marker = new google.maps.Marker({
            map: map,
            position: location,
            icon: icon,
            animation: google.maps.Animation.BOUNCE
        });

        var contentString = '<h4><b>' + name + '</b></h4> <br>'
        + '<p>' + street + '</p>'
        + '<p>' + district + '</p>'
        + '<p>' + city + ", " + country + '</p>'

        marker.setMap(map);
        // console.log(markers);
        cluster.push(marker);
        // console.log(cluster);
        marker.addListener('click', function() {
            infoWindow.setContent(contentString);
            infoWindow.open(map, marker);
        });
    });

    var markerCluster = new MarkerClusterer(map, cluster,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

    var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(-33.8902, 151.1759),
        new google.maps.LatLng(-33.8474, 151.2631));

    var input = document.getElementById('search');
    var options = {
        bounds: defaultBounds,
        types: ['establishment']
    };

    autocomplete = new google.maps.places.Autocomplete(input, options);
}

