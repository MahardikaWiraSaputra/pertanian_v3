(function(A) {

    if (!Array.prototype.forEach)
        A.forEach = A.forEach || function(action, that) {
            for (var i = 0, l = this.length; i < l; i++)
                if (i in this)
                    action.call(that, this[i], i, this);
        };

})(Array.prototype);
var base_url = 'http://localhost/umkm/welcome';
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
    var mapOptions = {
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
        scrollwheel: true,
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
    mapObject = new google.maps.Map(document.getElementById('map_right_listing'), mapOptions);
    for (var key in markersData)
        markersData[key].forEach(function(item) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
                map: mapObject,
                icon: 'http://localhost/umkm/assets/themes/images/others/marker.png',
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

    new MarkerClusterer(mapObject, markers[key]);

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
                '<span class="btn_infobox_reviews">' + item.review + '</span>' +
                '</span>' +
                '</div>',
            disableAutoPan: false,
            maxWidth: 0,
            pixelOffset: new google.maps.Size(10, 92),
            closeBoxMargin: '',
            closeBoxURL: "http://localhost/umkm/assets/themes/images/others/close_infobox.png",
            isHidden: false,
            alignBottom: true,
            pane: 'floatPane',
            enableEventPropagation: true
        });
    };

    function onHtmlClick(location_type, key) {
        google.maps.event.trigger(markers[location_type][key], "click");
    }
});



// console.log('ay' + markersData);