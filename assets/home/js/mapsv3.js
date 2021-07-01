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

            function initialize() {
                var mapOptionsS = {
                    center: latlng,
                    zoom: 9,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var el = document.getElementById("map_right_listing");
                mapCurrent = new google.maps.Map(el, mapOptionsS);

                var markerr = new google.maps.Marker({
                    map: mapCurrent,
                    position: latlng
                });

                var sunCircle = {
                    strokeColor: "#3f51b5",
                    strokeOpacity: 0.8,
                    strokeWeight: 5,
                    fillColor: "#819e9d",
                    fillOpacity: 0.15,
                    map: mapCurrent,
                    center: latlng,
                    radius: 5000 // in meters
                };
                cityCircle = new google.maps.Circle(sunCircle);
                cityCircle.bindTo('center', markerr, 'position');

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