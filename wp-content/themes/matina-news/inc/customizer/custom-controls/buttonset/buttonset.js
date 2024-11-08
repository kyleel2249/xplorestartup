/**
 * Custom scripts for Toggle Control
 *
 * @package Matina News
 */

wp.customize.controlConstructor['mt-buttonset'] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control = this;

		// Change the value
		this.container.on( 'click', 'input', function() {
			control.setting.set( jQuery( this ).val() );
		});
	}

});
