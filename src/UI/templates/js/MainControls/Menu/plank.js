il = il || {};
il.UI = il.UI || {};
il.UI.maincontrols = il.UI.maincontrols || {};
il.UI.maincontrols.menu = il.UI.maincontrols.menu || {};

(function($, menu) {
	menu.plank = (function($) {

		var toggle = function(id) {
			var plank = $('#' + id + ' >.plank-header');
			console.log(plank);
			window.top.aaa  = plank;
			if(plank.hasClass('expanded')) {
				plank.removeClass('expanded');
				plank.addClass('collapsed');
			} else {
				plank.removeClass('collapsed');
				plank.addClass('expanded');
			}
		};

		return {
			toggle: toggle
		}

	})($);
})($, il.UI.maincontrols.menu);
