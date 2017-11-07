/**
 * Seat Class extended from Fabric
 * @type {fabric.util.createClass}
 */
fabric.Seat = new fabric.util.createClass(fabric.Circle, {
    type: 'seat',

    initialize: function (options) {
        options || (options = { });

        this.callSuper('initialize', options);
        this.set('number', options.number || 'Number not set!');
        this.set('row', options.row || 'Row is not set!');
        this.set('status', options.status || '0');
        this.set('zone', options.zone || 'Zone number is not set!');
        this.set('reference', options.reference || '');
        this.set('category', options.category || '');
        this.set('categoryID', options.categoryID || 0);
        this.set('categoryColor', options.categoryColor || '#000000');

        // Defaults
        this.set('fill', options.fill || '#fff');
        this.set('hasBorders', options.hasBorders || false);
        this.set('hasControls', options.hasControls || false);
        this.set('hasRotatingPoint', options.hasRotatingPoint || false);
        this.set('hoverCursor', options.hoverCursor || 'pointer');
        this.set('lockMovementX', options.lockMovementX || true);
        this.set('lockMovementY', options.lockMovementY || true);
        this.set('lockRotation', options.lockRotation || true);
        this.set('radius', options.radius || 10);

        /**
         * Frontend Implementation of the widget. Will be different colors on the backend side.
         *
         * Status Codes List:
         *
         * 0    => Not Available        => Black | #76838F
         * 1    => Available            => Green | #5CD29D
         * 2    => Online Available     => Green | #5CD29D
         * 3    => Box Office Available => Orange | #F4B066
         * 4    => Booked               => Purple | #A58ADD
         * 5    => In Process           => Blue | #89BCEB
         * 6    => Sold                 => Red | #FA7A7A
         */
        switch (this.status) {
            case '0':
            case '3':
            case '4':
            case '6':
                this.set('stroke', options.stroke || '#76838F');
                this.set('fill', options.fill || '#76838F');
                this.set('selectable', options.selectable || false);
                break;
            case '1':
            case '2':
                this.set('stroke', options.stroke || '#46BE8A');
                this.set('fill', options.fill || '#46BE8A');
                this.set('selectable', options.selectable || true);
                break;
            case '5':
                this.set('stroke', options.stroke || '#89BCEB');
                this.set('fill', options.fill || '#89BCEB');
                this.set('selectable', options.selectable || true);
                break;
            default:
        }

        this.set('strokeWidth', options.strokeWidth || 3);
    },

    toObject: function () {
        return fabric.util.object.extend(this.callSuper('toObject'), {
            number: this.get('number'),
            row: this.get('row'),
            status: this.get('status'),
            zone: this.get('zone'),
            categoryID: this.get('categoryID'),
            categoryColor: this.get('categoryColor'),
            category: this.get('category'),
            reference: this.get('reference')
        });
    },

    _render: function (ctx) {
        this.callSuper('_render', ctx);

        ctx.font = '15px Helvetica';
        ctx.fillStyle = '#fff';
        ctx.fillText(this.number, -this.radius/2 + 1, -this.radius/2 +10, [7]);
    },

    setStatus: function (status) {
        this.set('status', status || '1');
    }
});

fabric.Seat.fromObject = function (object, callback, forceAsync) {
    return fabric.Object._fromObject('Seat', object, callback, forceAsync)
};