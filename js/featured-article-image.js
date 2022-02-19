// any global scripts needed for theme goes here
;
(function($) {

    'use strict';
	var __ = wp.i18n.__;
	var cropOptions = ( attachment, controller ) => {
		var control = controller.get( 'control' );

		console.log( attachment );
		console.log( control );

		var flexWidth = !! parseInt( control.params.flex_width, 10 );
		var flexHeight = !! parseInt( control.params.flex_height, 10 );

		var realWidth = attachment.get( 'width' );
		var realHeight = attachment.get( 'height' );

		let xInit = parseInt( control.params.width, 10 );
		let yInit = parseInt( control.params.height, 10 );

		var ratio = xInit / yInit;

		controller.set( 'canSkipCrop', course_maker_meta_attachments.can_skip_crop );

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
		console.log( image );
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
	cropControl.mustBeCropped = ( flexW, flexH, dstW, dstH, imgW, imgH ) => {
		// If the width and height are both flexible
		// then the user does not need to crop the image.

		if ( true === flexW && true === flexH ) {
			return false;
		}

		// If the width is flexible and the cropped image height matches the current image height,
		// then the user does not need to crop the image.
		if ( true === flexW && dstH === imgH ) {
			return false;
		}

		// If the height is flexible and the cropped image width matches the current image width,
		// then the user does not need to crop the image.
		if ( true === flexH && dstW === imgW ) {
			return false;
		}

		// If the cropped image width matches the current image width,
		// and the cropped image height matches the current image height
		// then the user does not need to crop the image.
		if ( dstW === imgW && dstH === imgH ) {
			return false;
		}

		// If the destination width is equal to or greater than the cropped image width
		// then the user does not need to crop the image...
		if ( imgW <= dstW ) {
			return false;
		}

		return true;
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

		mediaUploader.on( 'cropped', function( croppedImage ) {
			setAttachmentImage( {
				id: croppedImage.attachment_id,
				url: croppedImage.url,
			} );

			$.ajax( {
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'course_maker_add_cropped_attachment_image',
					nonce: course_maker_meta_attachments.nonce,
					attachment_id: croppedImage.attachment_id,
					url: croppedImage.url,
					post_id: course_maker_meta_attachments.post_id,
				},
			} ).done( function( response ) {
				console.log( response );
				console.log( 'ajax done' );
			}).fail( function( response ) {
				console.log( 'failed' );
			}).always( function( response ) {
				console.log( 'finished' );
			});
		} );

		mediaUploader.on( 'insert', function() {
			var json = mediaUploader.state().get( 'selection' ).first().toJSON();
			var url = json.sizes.hasOwnProperty( 'thumbnail' )
				? json.sizes.thumbnail.url
				: json.sizes.full.url;
				setAttachmentImage( {
				id: json.id,
				url,
			} );
		} );
		mediaUploader.on( 'select', function() {
			var attachment = mediaUploader.state().get( 'selection' ).first().toJSON();

			if (
				cropControl.params.width === attachment.width &&
				cropControl.params.height === attachment.height &&
				! cropControl.params.flex_width &&
				! cropControl.params.flex_height
			) {
				var url = attachment.sizes.hasOwnProperty( 'thumbnail' )
					? attachment.sizes.full.url
					: attachment.sizes.full.url;
					setAttachmentImage( {
					id: json.id,
					url,
				} );
				mediaUploader.close();
			} else {
				mediaUploader.setState( 'cropper' );
			}
		} );
		mediaUploader.open();
	};

	jQuery( '#course-maker-featured-article-image' ).on( 'click', handleUpload );

})(jQuery);
