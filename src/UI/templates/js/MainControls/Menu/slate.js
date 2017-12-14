il = il || {};
il.UI = il.UI || {};
il.UI.maincontrols = il.UI.maincontrols || {};
il.UI.maincontrols.menu = il.UI.maincontrols.menu || {};

(function($, menu) {
	menu.slate = (function($) {
		var _cls_engaged = 'engaged';
		var _cls_disengaged = 'disengaged';

		var onClickTigger = function(event, signalData, id) {
			slate = $('#' + id + ' .slate');
			toggle(slate);
		};

		var toggle = function(slate) {
			if(_isEngaged(slate)) {
				slate.toggle();
				_disengage(slate);
			} else {
				//slate.slideToggle(400, function(){
				slate.toggle('slide', function() {
					_engage(slate);
				});
			}
		};
		var _isEngaged = function(slate) {
			return slate.hasClass(_cls_engaged);
		}

		var _engage = function(slate) {
			slate.removeClass(_cls_disengaged);
			slate.addClass(_cls_engaged);

		};
		var _disengage = function(slate) {
			slate.removeClass(_cls_engaged);
			slate.addClass(_cls_disengaged);
		};

		return {
			onClickTigger: onClickTigger,
			toggle : toggle
		}

	})($);
})($, il.UI.maincontrols.menu);
