// any global scripts needed for theme goes here
;
(function($) {

    'use strict';
	var __ = wp.i18n.__;
	var attachment_id = 0;

	var cropOptions = ( attachment, controller ) => {
		var control = controller.get( 'control' );
		var realWidth = attachment.get( 'width' );
		var realHeight = attachment.get( 'height' );

		let xInit = parseInt( control.params.width, 10 );
		let yInit = parseInt( control.params.height, 10 );

		var ratio = xInit / yInit;
		var ratioReal = realWidth / realHeight;

		// Determine if user can skip crop.
		var canSkipCrop = false;

		// If ratios match, can skip crop.
		if ( ratio === ratioReal ) {
			canSkipCrop = true;
		}

		// If image is smaller than cropped.
		if ( realWidth < control.params.width && realHeight < control.params.height ) {
			canSkipCrop = true;
		}
		
		controller.set( 'canSkipCrop', canSkipCrop );

		var xImg = xInit;
		var yImg = yInit;

		if ( realWidth / realHeight > ratio ) {
			if ( yImg > realHeight ) {
				yImg = realHeight;
			}
			yInit = yImg;
			xInit = yInit * ratio;
		} else {
			if ( xImg > realWidth ) {
				xImg = realWidth;
			}
			xInit = xImg;
			yInit = xInit / ratio;
		}

		var x1 = ( realWidth - xInit ) / 2;
		var y1 = ( realHeight - yInit ) / 2;

		var imgSelectOptions = {
			handles: true,
			keys: true,
			instance: true,
			persistent: true,
			imageWidth: realWidth,
			imageHeight: realHeight,
			x1,
			y1,
			x2: xInit + x1,
			y2: yInit + y1,
			aspectRatio: course_maker_meta_attachments.aspect_ratio,
		};
		return imgSelectOptions;
	};

	/**
	 * Set the attachment image.
	 * @param {object} image Image object after cropping.
	 */
	function setAttachmentImage( image ) {
		var html = '<img src="' + image.url + '" />';

		$( '.course-maker-img-container a' ).html( html );
	}

	var cropControl = {
		id: 'control-id',
		params: {
			flex_width: true, // set to true if the width of the cropped image can be different to the width defined here
			flex_height: true, // set to true if the height of the cropped image can be different to the height defined here
			width: course_maker_meta_attachments.suggested_width, // set the desired width of the destination image here
			height: course_maker_meta_attachments.suggested_height, // set the desired height of the destination image here
		},
	};

	// Ajax to save cropped image.
	function saveCropped( attachment_id, attachment_url ) {
		$.ajax( {
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'course_maker_add_cropped_attachment_image',
				nonce: course_maker_meta_attachments.nonce,
				attachment_id: attachment_id,
				url: attachment_url,
				post_id: course_maker_meta_attachments.post_id,
			},
		} ).done( function( response ) {
			if ( response.success ) {
				setAttachmentImage( {
					id: response.data.attachment_id,
					url: response.data.img_url,
				} );
			}
		}).fail( function( response ) {
			console.log( 'failed' );
		}).always( function( response ) {
			console.log( 'finished' );
		});
	};

	function handleUpload( e ) {
		e.preventDefault();
		var mediaUploader = wp.media( {
			button: {
				text: course_maker_meta_attachments.media_modal_crop_text,
				close: false,
			},
			states: [
				new wp.media.controller.Library( {
					title: course_maker_meta_attachments.media_modal_title,
					library: wp.media.query( { type: 'image' } ),
					multiple: false,
					date: false,
					priority: 20,
					suggestedWidth: course_maker_meta_attachments.suggested_width,
					suggestedHeight: course_maker_meta_attachments.suggested_height,
				} ),
				new wp.media.controller.CustomizeImageCropper( {
					imgSelectOptions: cropOptions,
					control: cropControl,
				} ),
			],
		} );

		// When image is cropped.
		mediaUploader.on( 'cropped', function( croppedImage ) {
			saveCropped( croppedImage.attachment_id, croppedImage.url );
		} );

		// When image cropping is skipped.
		mediaUploader.on( 'skippedcrop', function( selection ) {
			saveCropped( selection.id, selection.get( 'url' ) );
		} );

		mediaUploader.on( 'select', function() {
			var attachment = mediaUploader.state().get( 'selection' ).first().toJSON();

			var ratio = attachment.width / attachment.height;
			var desiredRatio = cropControl.params.width / cropControl.params.height;
			if (
				ratio === desiredRatio
			) {
				var selection = mediaUploader.state().get('selection').single();
				saveCropped( selection.attributes.id, selection.attributes.url );
				mediaUploader.close();
			} else {
				mediaUploader.setState( 'cropper' );
			}
		} );

		mediaUploader.on( 'open', function() {
			// Set attached image upon media library opened.
			var attachment = wp.media.attachment( 1052 );
			var selection = mediaUploader.state('library').get('selection');
			selection.add( attachment );
		} );

		mediaUploader.open();
	};

	jQuery( '#course-maker-featured-article-image, .course-maker-img-container a' ).on( 'click', handleUpload );

})(jQuery);
