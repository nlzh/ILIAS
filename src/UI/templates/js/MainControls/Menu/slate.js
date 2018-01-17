il = il || {};
il.UI = il.UI || {};
il.UI.maincontrols = il.UI.maincontrols || {};
il.UI.maincontrols.menu = il.UI.maincontrols.menu || {};

(function($, menu) {
	menu.slate = (function($) {
		var _cls_engaged = 'engaged';
		var _cls_disengaged = 'disengaged';

		var onClickTrigger = function(event, signalData, id) {
			var slate = $('#' + id);
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

			var pagediv = $('.il-layout-page');
			pagediv.addClass('with-engaged-slates');
		};

		var _disengage = function(slate) {
			slate.removeClass(_cls_engaged);
			slate.addClass(_cls_disengaged);

			var pagediv = $('.il-layout-page');
			pagediv.removeClass('with-engaged-slates');
			$('.il-sidebar-triggers .btn').each( function(index, obj) {
				$(obj).removeClass(_cls_engaged);
            });
		};

		var replaceContentFromSignal = function (event, signalData, id) {
            console.group('REPLACE CONTENT');
            console.log(event);
            console.log(signalData);
            console.log(id);
            console.groupEnd();
			var slate_contents = $('#' + id + ' .il-maincontrol-menu-slate-content');
			slate_contents.html('replaced!');

        }
		return {
			onClickTrigger: onClickTrigger,
			toggle : toggle,
			replaceContentFromSignal: replaceContentFromSignal
		}

	})($);
})($, il.UI.maincontrols.menu);
