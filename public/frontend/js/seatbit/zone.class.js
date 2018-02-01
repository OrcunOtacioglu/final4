/**
 * Zone Class
 *
 * @type {fabric}
 */
fabric.Zone = new fabric.util.createClass(fabric.Polygon, {

    type: 'zone',

    /**
     * Initializer
     *
     * @param  {[array]} points  Polygon points
     * @param  {[array]} options Options for Polygon
     * @return {[object]}
     */
    initialize: function (points, options) {
        options || (options = { });

        this.callSuper('initialize', points, options);

        // Custom attributes
        this.set('name', options.name || 'Name not set!');
        this.set('number', options.number || 'Number not set!');

        // Set Defaults
        this.set('angle', options.angle || 0);
        this.set('evented', options.evented || true);
        this.set('hasControls', options.hasControls || false);
        this.set('hasRotatingPoint', options.hasRotatingPoint || false);
        this.set('hoverCursor', options.hoverCursor || 'pointer');
        this.set('lockMovementX', options.lockMovementX || true);
        this.set('lockMovementY', options.lockMovementY || true);
        this.set('lockRotation', options.lockRotation || true);
        this.set('hasBorders', options.hasBorders || false);

        // May change in the future
        this.set('selectable', options.selectable || true);
    },

    /**
     * Convert to object
     * @return {[object]}
     */
    toObject: function() {
        return fabric.util.object.extend(this.callSuper('toObject'), {
            name: this.get('name'),
            number: this.get('number')
        });
    },

    toJSON: function() {
        return fabric.util.object.extend(this.callSuper('toJSON'), {
            name: this.get('name'),
            number: this.get('number')
        });
    },

    /**
     * Canvas renderer
     */
    _render: function (ctx) {
        this.callSuper('_render', ctx);

        ctx.font = '18px Helvetica';
        ctx.fillStyle = '#fff';
        ctx.fillText(this.name, -5, 5, [20]);
        ctx.textAlign = 'center';
    }
});

fabric.Zone.fromObject = function (object, callback, forceAsync) {
    return fabric.Object._fromObject('Zone', object, callback, forceAsync, ['points', 'number', 'name'])
};
