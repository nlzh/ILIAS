il = il || {};
il.UI = il.UI || {};
il.UI.maincontrols = il.UI.maincontrols || {};
il.UI.maincontrols.menu = il.UI.maincontrols.menu || {};

(function($, menu) {
	menu.plank = (function($) {

		var toggle = function(id) {
			console.log('toggle:'  + id);
			var p = $('#' + id + ' >.plank-header');
			console.log(p);
			window.top.aaa=p;
			if(p.hasClass('expanded')) {
				p.switchClass('expanded', 'collapsed', 200);
			} else {
				p.switchClass('collapsed', 'expanded', 200);
			}
		};


		return {
			toggle: toggle
		}

	})($);
})($, il.UI.maincontrols.menu);
