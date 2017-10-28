/**
 * DASHBOARD ACTIONS OF SEAT MAP
 **/
$(document).ready(function () {
    var width = detectWidth();
    var height = detectHeight();
    var zoneID = $('meta[name=zone]').attr("content");
    var canvas = createCanvas(width, height, zoneID);
    drawSeats(canvas, zoneID);
});

function detectWidth() {
    return $('#canvasZone').width();
}

function detectHeight() {
    return window.innerHeight;
}

function createCanvas(canvasWidth, canvasHeight, zoneID) {
     return new fabric.Canvas(zoneID, {
         selection: false,
         width: canvasWidth,
         height: canvasHeight,
         renderOnAddRemove: true
    });
}

function drawSeats(canvas, zoneID) {
    // Get data from the database and draw it on canvas.
    axios.get('/zone/data/' + zoneID)
        .then(function (response) {
            canvas.loadFromJSON(response.data.objects);
        })
        .catch(function (error) {
            console.log(error);
        });
}