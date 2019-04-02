il = il || {};
il.UI = il.UI || {};
il.UI.maincontrols = il.UI.maincontrols || {};

(function($, maincontrols) {
	maincontrols.metabar = (function($) {

		var id
			,_breakpoint_max_width = 767 //this corresponds to @grid-float-breakpoint-max, see mainbar.less/metabar.less
			,_cls_btn_engaged = 'engaged'
			,_cls_entry = 'il-metabar-entry'
			,_cls_single_slate = false //class of one single slate, will be set on registerSignals
			,_cls_slate_engaged = false //engaged class of a slate, will be set on registerSignals
		;

		var registerSignals = function (
			component_id,
			entry_signal
		) {
			id = component_id;
			_cls_single_slate = il.UI.maincontrols.slate._cls_single_slate;
			_cls_slate_engaged = il.UI.maincontrols.slate._cls_engaged;

			$(document).on(entry_signal, function(event, signalData) {
				onClickEntry(event, signalData);
				return false;
			});
		};

		var onClickEntry = function(event, signalData) {
			var btn = signalData.triggerer;
			if(_isEngaged(btn)) {
				_disengageButton(btn);
			} else {
				_disengageAllSlates();
				_disengageAllButtons();
				_engageButton(btn);
			}
		};

		var _engageButton = function(btn) {
			btn.addClass(_cls_btn_engaged);
			btn.attr('aria-pressed', true);
		};

		var _disengageButton = function(btn) {
			btn.removeClass(_cls_btn_engaged);
			btn.attr('aria-pressed', false);
		};

		var _isEngaged = function(btn) {
			return btn.hasClass(_cls_btn_engaged);
		};

		var _disengageAllButtons = function() {
			$('#' + id +' .' + _cls_entry)
			.children('.btn.engaged')
			.each(
				function(i, btn) {
					_disengageButton($(btn));
				}
			)
		};

		var _disengageAllSlates = function() {
			var search = '#' + id
				+ ' .' + _cls_single_slate
				+ '.' + _cls_slate_engaged;

			$(search).each(
				function(i, slate) {
					il.UI.maincontrols.slate.disengage($(slate));
				}
			)
		};

		/**
		  * decide and init condensed/wide version
		  */
		var init = function () {
			window.top.console.log('INIT METABAR:' + id);
			window.top.console.log('mobile? ' + _isCondensedMode());
			_tagMoreEntry();
			_isCondensedMode() ? _initCondensed() : _initWide();
		};

		var _tagMoreEntry = function() {
			if(_getMoreEntry().length === 0) {
				console.log('ADDING')
				var entries = $('#' + id +' .' + _cls_entry),
					more = entries[entries.length - 1];
				$(more).addClass('il-metabar-more-entry');
			}
		}

		var _isCondensedMode  = function() {
			var media_query = "only screen"
				+ " and (max-width: " + _breakpoint_max_width + "px)";
			return window.matchMedia(media_query).matches;
		}

		var _getMoreEntry = function() {
			return $('.il-metabar-more-entry');
		}

		var _getMoreButton = function() {
			return $('.il-metabar-more-entry').children('.btn');
		}

		var _getMoreSlateContentArea = function() {
			var slate = _getMoreEntry().find('.' + _cls_single_slate),
				contentarea = slate.children()[0];
			return $(contentarea);
		}

		var _getMetabarEntries = function() {
			return $('#' + id +' .' + _cls_entry).not('.il-metabar-more-entry');
		}

		var _initCondensed = function () {
			_getMoreButton().show();
			_getMetabarEntries().appendTo(_getMoreSlateContentArea());

		};

		var _initWide = function () {
			_getMoreButton().hide();
			_getMetabarEntries().insertBefore(_getMoreEntry());

		};

		return {
			registerSignals: registerSignals,
			init: init
		}

	})($);
})($, il.UI.maincontrols);

