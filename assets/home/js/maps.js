(function(A) {

    if (!Array.prototype.forEach)
        A.forEach = A.forEach || function(action, that) {
            for (var i = 0, l = this.length; i < l; i++)
                if (i in this)
                    action.call(that, this[i], i, this);
        };

})(Array.prototype);
var base_url = 'http://localhost/umkm/home/get_maps';
var json;
$.post(base_url).done(function(data) {
    json = $.parseJSON(data);
    // console.log(json);
    var hasil = [];
    for (var i = 0; i < json.length; i++) {
        // hasil = json[i];
        hasil.push(json[i]);
    }
    console.log(hasil);
    var
        mapObject,
        markers = [],
        markersData = {
            'Marker': hasil

        };
    // console.log(markersData);
    var map, infoWindow, pos, mapOptions;

    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var mapCurrent;
            var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            // console.log(latlng);

            function initialize() {
                var mapOptionsS = {
                    center: latlng,
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,

                    mapTypeControl: false,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                        position: google.maps.ControlPosition.LEFT_CENTER
                    },
                    // panControl: false,
                    // panControlOptions: {
                    //     position: google.maps.ControlPosition.TOP_RIGHT
                    // },
                    zoomControl: true,
                    zoomControlOptions: {
                        position: google.maps.ControlPosition.TOP_RIGHT
                    },
                    scrollwheel: false,
                    scaleControl: true,
                    scaleControlOptions: {
                        position: google.maps.ControlPosition.TOP_LEFT
                    },
                    streetViewControl: true,
                    streetViewControlOptions: {
                        position: google.maps.ControlPosition.LEFT_TOP
                    },
                    styles: [{
                            "featureType": "administrative",
                            "elementType": "geometry",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "administrative.land_parcel",
                            "elementType": "labels",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "poi",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.icon",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "labels",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "transit",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        }
                    ]
                };

                // var el = document.getElementById("map_right_listing");
                // mapCurrent = new google.maps.Map(el, mapOptionsS);

                mapObject = new google.maps.Map(document.getElementById('map_right_listing'), mapOptionsS);

                var markerr = new google.maps.Marker({
                    map: mapObject,
                    position: latlng,
                });

                var infowindow = new google.maps.InfoWindow({
                    content: 'Lokasi Anda <br> <p style="font-style:italic">radius 5km<p>'
                });

                infowindow.open(mapOptionsS, markerr);

                var sunCircle = {
                    strokeColor: "#67b906",
                    strokeOpacity: 0.8,
                    strokeWeight: 5,
                    fillColor: "#67b906",
                    fillOpacity: 0.15,
                    map: mapObject,
                    center: latlng,
                    radius: 5000 // in meters
                };
                cityCircle = new google.maps.Circle(sunCircle);
                cityCircle.bindTo('center', markerr, 'position');
                mapOptions = {
                    zoom: 8,
                    center: new google.maps.LatLng(-8.22248, 114.2262831),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,

                    mapTypeControl: false,
                    mapTypeControlOptions: {
                        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                        position: google.maps.ControlPosition.LEFT_CENTER
                    },
                    panControl: false,
                    panControlOptions: {
                        position: google.maps.ControlPosition.TOP_RIGHT
                    },
                    zoomControl: true,
                    zoomControlOptions: {
                        position: google.maps.ControlPosition.RIGHT_BOTTOM
                    },
                    scrollwheel: false,
                    scaleControl: true,
                    scaleControlOptions: {
                        position: google.maps.ControlPosition.TOP_LEFT
                    },
                    streetViewControl: true,
                    streetViewControlOptions: {
                        position: google.maps.ControlPosition.LEFT_TOP
                    },
                    styles: [{
                            "featureType": "administrative",
                            "elementType": "geometry",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "administrative.land_parcel",
                            "elementType": "labels",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "poi",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.icon",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "labels",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "transit",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        }
                    ]
                };
                var marker;

                for (var key in markersData)
                    markersData[key].forEach(function(item) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
                            map: mapObject,
                            icon: 'http://localhost/umkm/assets/home/images/others/marker.png',
                        });

                        if ('undefined' === typeof markers[key])
                            markers[key] = [];
                        markers[key].push(marker);
                        google.maps.event.addListener(marker, 'click', (function() {
                            closeInfoBox();
                            getInfoBox(item).open(mapObject, this);
                            mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
                        }));

                    });

                // new MarkerClusterer(mapObject, markers[key]);

                function hideAllMarkers() {
                    for (var key in markers)
                        markers[key].forEach(function(marker) {
                            marker.setMap(null);
                        });
                };

                function closeInfoBox() {
                    $('div.infoBox').remove();
                };

                function getInfoBox(item) {
                    return new InfoBox({
                        content: '<div class="marker_info" id="marker_info">' +
                            '<img src="' + item.map_image_url + '" alt=""/>' +
                            '<span>' +
                            '<em>' + item.type_point + '</em>' +
                            '<h3><a href="' + item.url_point + '">' + item.name_point + '</a></h3>' +
                            '<span class="btn_infobox_reviews">' + item.view + '</span>' +
                            '</span>' +
                            '</div>',
                        disableAutoPan: false,
                        maxWidth: 0,
                        pixelOffset: new google.maps.Size(10, 92),
                        closeBoxMargin: '',
                        closeBoxURL: "http://localhost/umkm/assets/home/images/others/close_infobox.png",
                        isHidden: false,
                        alignBottom: true,
                        pane: 'floatPane',
                        enableEventPropagation: true
                    });
                };

                function onHtmlClick(location_type, key) {
                    google.maps.event.trigger(markers[location_type][key], "click");
                }
            }
            initialize();


        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }


});




// console.log('ay' + markersData);