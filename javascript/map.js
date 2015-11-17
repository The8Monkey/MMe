/**
 * Created by Christoph on 17.11.2015.
 */

function initialize() {
    var mapProp = {
        center:new google.maps.LatLng(52.499268,13.4065647),
        zoom:11,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
