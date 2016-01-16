var map;
var geocoder;
function initialize() {
    var mapProp = {
        scrollwheel: false,
        center: new google.maps.LatLng(52.499268, 13.4065647),
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP

    };
    map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

     new google.maps.Marker({
     map: map,
     position: {lat: 52.5502158, lng: 13.3501616},
     title: 'Karate Wedding'
     });

     new google.maps.Marker({
     map: map,
     position: {lat: 52.5167455, lng: 13.3228049},
     title: 'Judoclub Berlin'
     });

}

function codeAddress() {
    var address = document.getElementById("address" + "zip").value;
    initialize();
    geocoder.geocode({'address': address}, function (results) {
        new google.maps.Marker({
            map: map,
            position: results[0].geometry.location,
            title: address
        });
    });
}

function codeAddress(event) {
    event.preventDefault();
    var address = document.getElementById("address").value;
    initialize();
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}
