
function initialize() {
    var mapProp = {
        scrollwheel: false,
        center: new google.maps.LatLng(52.499268, 13.4065647),
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP

    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

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