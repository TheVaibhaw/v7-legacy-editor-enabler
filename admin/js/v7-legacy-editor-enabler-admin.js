(function ($) {
	'use strict';

	$(document).ready(function () {

		$('.v7-stat-number').each(function () {
			var $this = $(this),
				target = parseInt($this.data('count'), 10);

			if (isNaN(target)) {
				return;
			}

			$({ count: 0 }).animate(
				{ count: target },
				{
					duration: 1200,
					easing: 'swing',
					step: function () {
						$this.text(Math.floor(this.count));
					},
					complete: function () {
						$this.text(target);
					}
				}
			);
		});

		var urlParams = new URLSearchParams(window.location.search);
		if (urlParams.get('settings-updated') === 'true') {
			var $toast = $('.v7-toast');
			if ($toast.length) {
				setTimeout(function () {
					$toast.addClass('show');
					setTimeout(function () {
						$toast.removeClass('show');
					}, 3000);
				}, 300);
			}

			if (window.history.replaceState) {
				urlParams.delete('settings-updated');
				var cleanUrl = window.location.pathname + '?' + urlParams.toString();
				window.history.replaceState({}, '', cleanUrl);
			}
		}
	});

})(jQuery);
