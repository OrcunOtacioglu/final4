/**
 * FRONT-END SEAT MAP JS FUNCTIONS
 **/

/**
 * Canvas initializer.
 */
var canvas = new fabric.Canvas('venue', {
    backgroundColor: '#f8f8fa',
    containerClass: 'venue-wrapper',
    enableRetinaScaling: true,
    height: responsiveHeight(),
    width: responsiveWidth(),
    selection: false
});

// @TODO CHANGE THIS PART TO IMPLEMENT DRAWING
axios({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    method: 'get',
    url: '/get-venue'
})
    .then(function (response) {
        canvas.loadFromJSON(response.data, canvas.renderAll.bind(canvas));
    });

/**
 * Sets height and width of canvas for responsive changes.
 * @returns {jQuery}
 */
function responsiveHeight() {
    return $(window).height();
}

function responsiveWidth() {
    return $('#wrapper').width() - $('.col-3').width();
}

function watchResponsive() {
    var venue = $('#venue');
    $(window).resize(function () {
        $('#sidebar').height(responsiveHeight());
        venue.height(responsiveHeight());
        venue.width(responsiveWidth());
    });
}

/**
 * Sets sidebar and category wrapper heights
 * @returns {jQuery}
 */
function setSidebarHeight()
{
    return $('#sidebar').height(responsiveHeight());
}

function setCategoriesHeight()
{
    return $('#categories').height(responsiveHeight());
}

var cart = new Vue({
    el: '#sidebar',
    data: {
        items: [],
        displayCart: false
    },
    computed: {
        total: function () {
            var total = 0;
            for (var i = 0; i < this.items.length; i++) {
            }

            return total;
        }
    },
    methods: {
        add: function (item) {
            this.items.push(item);
            this.cartVisibility();
        },
        remove: function (item) {
            this.items.splice(this.items.indexOf(item), 1);
            this.cartVisibility();
        },
        removeFromCart: function (item) {
            item.set('stroke', '#46BE8A');
            item.set('fill', '#46BE8A');
            item.set('status', '1');
            canvas.renderAll();

            this.items.splice(this.items.indexOf(item), 1);
        },
        getItemCount: function () {
            return this.items.length;
        },
        cartVisibility: function () {
            this.displayCart = this.items.length > 0;
        },
        sendCardData: function () {
            axios({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
                url: '/order',
                data: {
                    items: this.items
                }
            })
                .then(function (response) {
                    if (response.data.status === 0) {
                        swal(response.data.message, 'Please try again!', 'warning');
                    } else {
                        if (response.data.reference === undefined) {
                            swal('Problem occured!', 'Please try again!', 'error');
                        } else {
                            window.location.replace('/order/' + response.data.reference);
                        }
                    }
                })
                .catch(function (response) {
                    swal(response.status, response.statusText, 'error');
                });
        }
    }
});

/**
 * Draws Zones and Seats
 */
function getSeatsOf(zone) {
    axios.get('/zone/data/' + zone)
        .then(function (response) {
            drawSeats(response.data.objects);
        })
        .catch(function (error) {
            console.log(error);
        });
}

function drawSeats(objects) {

    var width = $('.container-fluid').width();
    var containerWidth = width / 2;
    var leftPadding = containerWidth - (containerWidth / 1.2);

    var seats = JSON.parse(objects);

    for (var i = 0; i < seats.objects.length; i++) {
        seats.objects[i]['left'] = seats.objects[i]['left'] + leftPadding;
    }

    canvas.clear();
    canvas.off('mouse:down');
    canvas.loadFromJSON(seats, canvas.renderAll.bind(canvas));

    canvas.setZoom(0.66);
    canvas.setZoom(canvas.getZoom() * 1.3);

    canvas.on('mouse:down', function (el) {
        var seat = el.target;
        console.log('Evented!');

        // @TODO MAKE THIS COUNT DYNAMICALLY SETABLE FROM DASHBOARD.
        if (seat === null) {
            return false;
        } else {
            if (seat.status === '1') {
                if (cart.getItemCount() >= 8) {
                    swal('Oops!', 'You can not purchase more than 8 tickets per purchase!', 'warning');
                } else {
                    seat.set('status', '5');
                    seat.set('stroke', '#89BCEB');
                    seat.set('fill', '#89BCEB');
                    cart.add(seat);
                    canvas.renderAll();
                }
            } else if (seat.status === '5') {
                seat.setStatus('1');
                seat.set('stroke', '#46BE8A');
                seat.set('fill', '#46BE8A');
                cart.remove(seat);
                canvas.renderAll();
            }
        }
    })
}

/**
 * Initialize application.
 */
$(document).ready(function () {
    setSidebarHeight();
    watchResponsive();
    setCategoriesHeight();
    canvas.setZoom(canvas.getZoom() / 1.5);
});