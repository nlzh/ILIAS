il = il || {};
il.UI = il.UI || {};
il.UI.maincontrols = il.UI.maincontrols || {};
il.UI.maincontrols.menu = il.UI.maincontrols.menu || {};

(function($, menu) {
	menu.slate = (function($) {
		var _cls_engaged = 'engaged';
		var _cls_disengaged = 'disengaged';
		var _history = [];

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
		};

		var replaceContentFromSignal = function (event, signalData, id) {
			var slate_contents = $('#' + id + ' .il-maincontrol-menu-slate-content'),
				slate_backbtn = $('#' + id + ' .il-maincontrol-menu-slate-back');

			_appendToHistory(id, slate_contents);
			slate_contents.html('replaced!');

			slate_backbtn.removeClass('inactive');
			slate_backbtn.addClass('active');
        };

        var _appendToHistory = function (id, slate_contents) {
        	if(! _history[id]) {
        		_history[id] = [];
        	}
        	_history[id].push(slate_contents.clone(true, true)); //clone with events, in depth
        };

        var navigateBack = function (id) {
        	var slate_contents = $('#' + id + ' .il-maincontrol-menu-slate-content'),
        		slate_backbtn = $('#' + id + ' .il-maincontrol-menu-slate-back');

        	content = _history[id].pop();
        	slate_contents.replaceWith(content);

        	if(_history[id].length === 0) {
        		slate_backbtn.removeClass('active');
				slate_backbtn.addClass('inactive');
        	}
        };

		return {
			onClickTrigger: onClickTrigger,
			toggle : toggle,
			replaceContentFromSignal: replaceContentFromSignal,
			navigateBack: navigateBack
		}

	})($);
})($, il.UI.maincontrols.menu);
