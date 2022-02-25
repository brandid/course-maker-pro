// any global scripts needed for theme goes here
;
(function ($) {

	$.fn.courseMakerImageCrop = function (options) {

		var __ = wp.i18n.__;

		var settings = $.extend({
			id: '',
			attachmentId: 0,
			aspectRatio: '1:1',
			suggestedWidth: '1000',
			suggestedHeight: '1000',
			nonce: '',
			postId: 0,
			title: __('Image', 'course-maker'),
			buttonLabel: __('Add Image', 'course-maker'),
			main: this,
		}, options);

		var cropOptions = function (attachment, controller) {
			var control = controller.get('control');
			var realWidth = attachment.get('width');
			var realHeight = attachment.get('height');

			var xInit = parseInt(control.params.width, 10);
			var yInit = parseInt(control.params.height, 10);

			var ratio = xInit / yInit;
			var ratioReal = realWidth / realHeight;

			// Determine if user can skip crop.
			var canSkipCrop = false;

			// If ratios match, can skip crop.
			if (ratio === ratioReal) {
				canSkipCrop = true;
			}

			controller.set('canSkipCrop', canSkipCrop);

			var xImg = xInit;
			var yImg = yInit;

			if (realWidth / realHeight > ratio) {
				if (yImg > realHeight) {
					yImg = realHeight;
				}
				yInit = yImg;
				xInit = yInit * ratio;
			} else {
				if (xImg > realWidth) {
					xImg = realWidth;
				}
				xInit = xImg;
				yInit = xInit / ratio;
			}

			var x1 = (realWidth - xInit) / 2;
			var y1 = (realHeight - yInit) / 2;

			if ( x1 === 0 ) {
				if ( ratio > 0 ) {
					x1 = y1 * ratio;
				} else {
					x1 = y1 / ratio;
				}
			}
			if ( y1 === 0 ) {
				if ( ratio > 0 ) {
					y1 = x1 * ratio;
				} else {
					y1 = x1 / ratio;
				}
			}

			var cropWidthX2 = 0;
			var cropHeightY2 = 0;
			if ( ( xInit + x1 ) > realWidth ) {
				cropWidthX2 = xInit -1;
			} else {
				cropWidthX2 = xInit + x1;
			}
			if ( ( yInit + y1 ) > realHeight ) {
				cropHeightY2 = yInit -1;
			} else {
				cropHeightY2 = yInit + y1;
			}


			var imgSelectOptions = {
				handles: true,
				keys: true,
				instance: true,
				persistent: true,
				imageWidth: realWidth,
				imageHeight: realHeight,
				x1: x1,
				y1: y1,
				x2: cropWidthX2,
				y2: cropHeightY2,
				aspectRatio: settings.aspectRatio,
			};
			return imgSelectOptions;
		};

		var cropControl = {
			id: 'control-id',
			params: {
				flex_width: true, // set to true if the width of the cropped image can be different to the width defined here
				flex_height: true, // set to true if the height of the cropped image can be different to the height defined here
				width: settings.suggestedWidth, // set the desired width of the destination image here
				height: settings.suggestedHeight, // set the desired height of the destination image here
			},
		};

		/**
		 * Set the attachment image.
		 * @param {object} image Image object after cropping.
		 */
		function setAttachmentImage(image) {
			var html = '<img src="' + image.url + '" />';

			$( settings.main ).find('.course-maker-img-container a').html(html);
		}

		// Ajax to save cropped image.
		function saveCropped(attachment_id, attachment_url) {

			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: settings.id,
					nonce: settings.nonce,
					attachment_id: attachment_id,
					url: attachment_url,
					post_id: settings.postId,
				},
			}).done(function (response) {
				if (response.success) {
					setAttachmentImage({
						id: response.data.attachment_id,
						url: response.data.img_url,
					});
					settings.attachmentId = response.data.attachment_id;
				}
			}).fail(function (response) {
			}).always(function (response) {
			});
		};

		function handleUpload(e) {
			e.preventDefault();
			var mediaUploader = wp.media({
				button: {
					text: settings.buttonLabel,
					close: false,
				},
				states: [
					new wp.media.controller.Library({
						title: settings.title,
						library: wp.media.query({ type: 'image' }),
						multiple: false,
						date: false,
						priority: 20,
						suggestedWidth: settings.suggestedWidth,
						suggestedHeight: settings.suggestedHeight,
					}),
					new wp.media.controller.CustomizeImageCropper({
						imgSelectOptions: cropOptions,
						control: cropControl,
					}),
				],
			});

			var mediaUploader = wp.media({
				button: {
					text: settings.buttonLabel,
					close: false,
				},
				states: [
					new wp.media.controller.Library({
						title: settings.title,
						library: wp.media.query({ type: 'image' }),
						multiple: false,
						date: false,
						priority: 20,
						suggestedWidth: settings.suggestedWidth,
						suggestedHeight: settings.suggestedHeight,
					}),
					new wp.media.controller.CustomizeImageCropper({
						imgSelectOptions: cropOptions,
						control: cropControl,
					}),
				],
			});

			// When image is cropped.
			mediaUploader.on('cropped', function (croppedImage) {
				saveCropped(croppedImage.id, croppedImage.url);
			});

			// When image cropping is skipped.
			mediaUploader.on('skippedcrop', function (selection) {
				saveCropped(selection.id, selection.get('url'));
			});

			mediaUploader.on('select', function () {
				var attachment = mediaUploader.state().get('selection').first().toJSON();

				var ratio = attachment.width / attachment.height;
				var desiredRatio = cropControl.params.width / cropControl.params.height;
				if (
					ratio === desiredRatio
				) {
					var selection = mediaUploader.state().get('selection').single();
					saveCropped(selection.attributes.id, selection.attributes.url);
					mediaUploader.close();
				} else {
					mediaUploader.setState('cropper');
				}
			});

			mediaUploader.on('open', function () {
				// Set attached image upon media library opened.
				var attachment = wp.media.attachment(settings.attachmentId);
				var selection = mediaUploader.state('library').get('selection');
				selection.add(attachment);
			});

			mediaUploader.open();
		}



		return this.each(function () {
			$(this).find('a, button').on('click', handleUpload);
		});
	}

})(jQuery);
