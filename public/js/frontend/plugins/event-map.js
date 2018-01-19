function initEventMap(latitude, longitude, reference) {
    var lat = parseFloat(latitude);
    var lng = parseFloat(longitude);
    var ref = reference;

    var uluru = new google.maps.LatLng(lat, lng);
    var map = new google.maps.Map(document.getElementById(ref), {
        zoom: 15,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
