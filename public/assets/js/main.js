/*
	Multiverse by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	var	$window = $(window),
		$body = $('body'),
		$wrapper = $('#wrapper');

	// Breakpoints.
		breakpoints({
			xlarge:  [ '1281px',  '1680px' ],
			large:   [ '981px',   '1280px' ],
			medium:  [ '737px',   '980px'  ],
			small:   [ '481px',   '736px'  ],
			xsmall:  [ null,      '480px'  ]
		});

	// Hack: Enable IE workarounds.
		if (browser.name === 'ie')
			$body.addClass('ie');

	// Touch?
		if (browser.mobile)
			$body.addClass('touch');

	// Transitions supported?
		if (browser.canUse('transition')) {

			// Play initial animations on page load.
				$window.on('load', function() {
					window.setTimeout(function() {
						$body.removeClass('is-preload');
					}, 100);
				});

			// Prevent transitions/animations on resize.
            let resizeTimeout;

            $window.on('resize', function() {

					window.clearTimeout(resizeTimeout);

					$body.addClass('is-resizing');

					resizeTimeout = window.setTimeout(function() {
						$body.removeClass('is-resizing');
					}, 100);

				});

		}

	// Scroll back to top.
		$window.scrollTop(0);


		// Global events.
			$body
				.on('click', function(event) {

					if ($body.hasClass('content-active')) {

						event.preventDefault();
						event.stopPropagation();

						$panels.trigger('---hide');

					}

				});
			$window
				.on('keyup', function(event) {

					if (event.keyCode === 27
					&&	$body.hasClass('content-active')) {

						event.preventDefault();
						event.stopPropagation();

					}

				});

	// Header.
		var $header = $('#header');

		// Links.
			$header.find('a').each(function() {

				var $this = $(this),
					href = $this.attr('href');

				// Internal link? Skip.
					if (!href
					||	href.charAt(0) === '#')
						return;

				// Redirect on click.
					$this
						.removeAttr('href')
						.css('cursor', 'pointer')
						.on('click', function(event) {

							event.preventDefault();
							event.stopPropagation();

						});

			});
	// Main.
		let $main = $('#main');

        function f() {
            // Thumbs.
            $main.children('.thumb').each(function() {

                var	$this = $(this),
                    $image = $this.find('.image'), $image_img = $image.children('img'),
                    x;

                // No image? Bail.
                if ($image.length === 0)
                    return;

                // Image.
                // This sets the background of the "image" <span> to the image pointed to by its child
                // <img> (which is then hidden). Gives us way more flexibility.

                // Set background.
                $image.css('background-image', 'url(' + $image_img.attr('src') + ')');

                // Set background position.
                if (x === $image_img.data('position'))
                    $image.css('background-position', x);

                // Hide original img.
                $image_img.hide();
            });
        }

    $window.scroll(function (){
        f()
    })

    f()
})(jQuery);
