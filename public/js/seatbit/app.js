var canvas = new fabric.Canvas('venue', {
    backgroundColor: '#f8f8fa',
    containerClass: 'venue-wrapper',
    enableRetinaScaling: true,
    height: responsiveHeight() -71,
    width: responsiveWidth(),
    selection: false
});

fabric.loadSVGFromURL('/img/kombank.svg', function (objects, options) {
    var obj = fabric.util.groupSVGElements(objects, options);
    canvas.add(obj).renderAll();
    canvas.setZoom(canvas.getZoom() / 1.5);
});

function responsiveHeight() {
    return $(window).height();
}

function responsiveWidth() {
    return $(window).width();
}

function setSidebarHeight()
{
    return $('#sidebar').height(responsiveHeight() - 71);
}

function setCategoriesHeight()
{
    return $('#categories').height(responsiveHeight() - 71);
}

function watchResponsive() {
    var venue = $('#venue');
    $(window).resize(function () {
        $('#sidebar').height(responsiveHeight() - 71);
        venue.height(responsiveHeight());
        venue.width(responsiveWidth());
    });
}

$(document).ready(function () {
    setSidebarHeight();
    watchResponsive();
    setCategoriesHeight();
});