il = il || {};
il.UI = il.UI || {};
il.UI.maincontrols = il.UI.maincontrols || {};
il.UI.maincontrols.menu = il.UI.maincontrols.menu || {};

(function($, menu) {
	menu.plank = (function($) {

		var show = function(id) {
console.log('show:'  + id)
		};

		var hide = function(id) {
console.log('hide:'  + id)

		};

		return {
			hide: hide,
			show : show
		}

	})($);
})($, il.UI.maincontrols.menu);
