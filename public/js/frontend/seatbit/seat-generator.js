/**
 * DASHBOARD ACTIONS OF SEAT MAP
 **/
var zoneName = $('meta[name=zone]').attr("content");
var canvas = new fabric.Canvas(zoneName, {
    selection: false,
    width: $('#canvasZone').width(),
    height: 900,
    renderOnAddRemove: true
});

$(document).ready(function () {
    getZoneData(zoneName);
});

function drawSeats(objects) {
    var width = $('.container-fluid').width();
    var containerWidth = width / 2;
    var leftPadding = containerWidth - (containerWidth / 1.2);

    var seats = JSON.parse(objects);

    for (var i = 0; i < seats.objects.length; i++) {
        seats.objects[i]['left'] = seats.objects[i]['left'] + leftPadding;
    }

    canvas.clear();
    canvas.loadFromJSON(seats, canvas.renderAll.bind(canvas));
}

function getZoneData(zoneName) {
    // Get data from the database and draw it on canvas.
    axios.get('/zone/data/' + zoneName)
        .then(function (response) {
            drawSeats(response.data.objects);
        })
        .catch(function (error) {
            console.log(error);
        });
}