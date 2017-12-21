il = il || {};
il.UI = il.UI || {};
il.UI.maincontrols = il.UI.maincontrols || {};
il.UI.maincontrols.menu = il.UI.maincontrols.menu || {};

(function($, menu) {
	menu.plank = (function($) {

		var toggle = function(id) {
			var p = $('#' + id + ' >.plank-header');
			if(p.hasClass('expanded')) {
				p.switchClass('expanded', 'collapsed', 0);
			} else {
				p.switchClass('collapsed', 'expanded', 0);
			}
		};


		return {
			toggle: toggle
		}

	})($);
})($, il.UI.maincontrols.menu);
