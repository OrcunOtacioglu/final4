/**
 * BOX-OFFICE SEAT MAP JS FUNCTIONS
 **/

/**
 * Canvas Initializer.
 */
var canvas = new fabric.Canvas('box-office', {
    backgroundColor: '#fff',
    containerClass: 'box-office-wrapper',
    enableRetinaScaling: true,
    FX_DURATION: 1000,
    height: 780,
    width: setWidth(),
    selection: false
});

function getSeatsOf(zone) {
    axios.get('/zone/data/' + zone)
        .then(function (response) {
            drawSeats(response.data.objects);
        })
        .catch(function (error) {
            console.log(error);
        })
}

var cart = new Vue({
    el: '#package',
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
            this.packageVisibility();
        },
        remove: function (item) {
            this.items.splice(this.items.indexOf(item), 1);
            this.packageVisibility();
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
        packageVisibility: function () {
            this.displayCart = this.items.length > 0;
        },
        sendCardData: function () {
            axios({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
                url: '/dashboard/booking',
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
                            window.location.replace('/dashboard/booking/' + response.data.reference + '/edit');
                        }
                    }
                })
                .catch(function (response) {
                    swal(response.status, response.statusText, 'error');
                });
        }
    }
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
    canvas.off('mouse:down');
    canvas.loadFromJSON(seats, canvas.renderAll.bind(canvas));

    canvas.setZoom(0.66);
    canvas.setZoom(canvas.getZoom() * 1.3);

    canvas.on('mouse:down', function (el) {
        var seat = el.target;

        if (seat === null) {
            return false;
        } else {
            if (seat.status !== '0') {
                if (seat.stroke === '#89BCEB') {
                    seat.set('stroke', seat.get('fill'));
                    seat.set('strokeWidth', 1);
                    cart.remove(seat);
                    canvas.renderAll();
                } else {
                    seat.set('stroke', '#89BCEB');
                    seat.set('strokeWidth', 5);
                    cart.add(seat);
                    canvas.renderAll();
                }
            }
        }
    })
}

function setWidth() {
    return $('#box-office-wrapper').width();
}