function initMap (callback) {

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

    if (callback) {
        callback(map);
    }

    // chuyen data tu html sang JavaScript
    var garbages = document.getElementById("map").getAttribute("garbages");

    var markers = JSON.parse(garbages);

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
            url: "/images/garbage.png", // url
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
        cluster.push(marker);

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

    //set khu vuc tim kiem getBounds() : tra ve lat/lng trong khung hinh hien tai neu co nhieu hon 1 copy map thi set tu -180 -> 180 do
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    // khai bao 1 mang rong de bo cac vi tri danh dau
    markerLocations = [];

    //Nghe sự kiện này được kích hoạt khi người dùng chọn một dự đoán và truy xuất thêm chi tiết cho nơi đó.
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Xoa nhung danh dau cu
        markerLocations.forEach(function(marker) {
            marker.setMap(null);
        });
        markerLocations = [];

        var bounds = new google.maps.LatLngBounds();
        // Voi moi Object lay icon, name va location
        places.forEach(function(place) {
            // neu khong ton tai lat va lng thi return
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }

            // cai dat icon
            var icon = {
                url: "/images/places.png",
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Tao mot danh dau cho moi dia diem
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

    var infoWindow = new google.maps.InfoWindow({map: map});


    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: 16.0326902, lng: 108.2104015}
            });
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude};


                var place = {
                    url: "/images/places.png",
                    size: new google.maps.Size(100, 100),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                var userMarker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    icon: place
                });

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                map.setCenter(pos);

                var addressGarbage = document.getElementById('end').value;

                console.log(addressGarbage);

                var directionsService = new google.maps.DirectionsService;
                var directionsDisplay = new google.maps.DirectionsRenderer;

                directionsDisplay.setMap(map);

                var onChangeHandler = function() {
                    calculateAndDisplayRoute(directionsService, directionsDisplay);
                };
                document.getElementById('end').addEventListener('change', onChangeHandler);

                function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                    directionsService.route({
                        origin: pos,
                        destination: document.getElementById('end').value,
                        travelMode: 'DRIVING'
                    }, function(response, status) {
                        if (status === 'OK') {
                            directionsDisplay.setDirections(response);
                        } else {
                            window.alert('Directions request failed due to ' + status);
                        }
                    });
                }


            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });

    } else {
        handleLocationError(false, infoWindow, map.getCenter());
    }

}


// Khai bao form long_name and short_name ma map reture
var componentForm = {
    street_number: 'short_name', //
    route: 'long_name',
    locality: 'short_name',
    region: 'long_name',
    country: 'long_name',
    administrative_area_level_1: 'short_name',
};



//----------------------------------------------------------------------------------------------------




//auto register form
function initAutocomplete()
{
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

    markerLocations = [];

    var icon = {
        url: "/images/garbage.png",
        size: new google.maps.Size(100, 100),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
    };

    google.maps.event.addListener(map, 'click', function(event) {

        // xoa tat ca cac danh dau tren maps
        if(markerLocations.length != 0) {
            markerLocations.forEach(function(marker) {
                marker.setMap(null);
            });
        }
        // them danh dau vao maps
        marker = new google.maps.Marker({
            position: event.latLng,
            map: map,
            icon: icon
        });
        // push map
        markerLocations.push(marker);

        // them vao lat lng vao textbox khi click chon into maps
        document.getElementById("latGarbage").value = event.latLng.lat();
        document.getElementById("lngGarbage").value = event.latLng.lng();
        document.getElementById("atGarbage").value = event.latLng.lat();
        document.getElementById("ngGarbage").value = event.latLng.lng();
    });

    // auto add information into form as lat lng name street .....
    var input = document.getElementById('nameGarbage');

    autocomplete = new google.maps.places.Autocomplete(input);

    map.addListener('bounds_changed', function() {
        autocomplete.setBounds(map.getBounds());
    });

    autocomplete.addListener('place_changed', function(){
        var place = autocomplete.getPlace();

        document.getElementById("latGarbage").value = place.geometry.location.lat();
        document.getElementById("lngGarbage").value = place.geometry.location.lng();

        document.getElementById("atGarbage").value = place.geometry.location.lat();
        document.getElementById("ngGarbage").value = place.geometry.location.lng();

        // kiem tra va xoa value cua form khi search lai address
        for (var component in componentForm) {
            if (!!document.getElementById(component)) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }
        }

        //lay cac thanh phan tu place cua address va dien vao form
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }

        marker = new google.maps.Marker({
            map: map,
            icon: icon
        });

        // search address with maps follow
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

        // xoa danh dau
        if(markerLocations.length != 0) {
            markerLocations.forEach(function(marker) {
                marker.setMap(null);
            });
        }

        // kiem tra co dia chi geometry hay khong va show no len maps
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
        }
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
        markerLocations.push(marker);
    });

    // get current address
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var place = {
                url: "/images/places.png",
                size: new google.maps.Size(100, 100),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            var userMarker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: place
            });
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}


