function initMap() {
    // khai bao mang cluster de bo 1 location vao 1 cluster
    var cluster = [];
    // tao 1 maps voi center, zoom va styles
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
    // chuyen data tu html sang JavaScript
    var garbages = document.getElementById("map").getAttribute("garbages");
    // console.log(typeof(garbages));
    // Chuyen string data ve JSON Object
    var markers = JSON.parse(garbages);
    // console.log(markers);

    // lap lai array, them tat ca cac location vao trong map mark maps
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

    // them tat ca cac loction trong map vao MakerClusterer Object
    var markerCluster = new MarkerClusterer(map, cluster,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});


    // SEARCH
    // get data tu input search
    var input = document.getElementById('search');
    // them data input vao trong Object searchBox de co data do xuong
    var searchBox = new google.maps.places.SearchBox(input);
    // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    markerLocations = [];

    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();
        console.log(places);
        if (places.length == 0) {
            return;
        }

        markerLocations.forEach(function(marker) {
            marker.setMap(null);
          });
        markerLocations = [];

        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }

            var icon = {
                url: "images/places.png",
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };
            markerLocations.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
          }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
          } else {
            bounds.extend(place.geometry.location);
        }
    });
        map.fitBounds(bounds);

    });
}

