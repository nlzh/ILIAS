il = il || {};
il.UI = il.UI || {};
il.UI.maincontrols = il.UI.maincontrols || {};
il.UI.maincontrols.menu = il.UI.maincontrols.menu || {};

(function($, menu) {
	menu.slate = (function($) {
		var _cls_engaged = 'engaged';
		var _cls_disengaged = 'disengaged';

		var onClickTrigger = function(event, signalData, id) {
			slate = $('#' + id);
			slate.siblings().each(function(c,s){
				_disengage($(s));
			});
			toggle(slate);
		};

		var toggle = function(slate) {
			if(_isEngaged(slate)) {
				_disengage(slate);
			} else {
				_engage(slate);
			}
		};

		var _isEngaged = function(slate) {
			return slate.hasClass(_cls_engaged);
		};

		var _engage = function(slate) {
			slate.removeClass(_cls_disengaged);
			slate.addClass(_cls_engaged);
/*			var w = slate.width();
			slate.width(1);
			slate.animate({width: w}, 800);
*/
		};

		var _disengage = function(slate) {
			slate.removeClass(_cls_engaged);
			slate.addClass(_cls_disengaged);
		};

		return {
			onClickTrigger: onClickTrigger,
			toggle : toggle
		}

	})($);
})($, il.UI.maincontrols.menu);
