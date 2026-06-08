(function( $ ){
	$( document ).ready(function() {
		$('.upload-btn-2').click(function(e) {
            e.preventDefault();
            var _this = $(this);
            var image = wp.media({ 
                title: 'Upload Image',
                // mutiple: true if you want to upload multiple files at once
                multiple: false
            }).open()
            .on('select', function(e){
                // This will return the selected image from the Media Uploader, the result is an object
                var uploaded_image = image.state().get('selection').first();
                // We convert uploaded_image to a JSON object to make accessing it easier
                // Output to the console uploaded_image
                var image_url = uploaded_image.toJSON();
                //var thumb = image_url.sizes.thumbnail.url;

                // Let's assign the url value to the input field
                _this.parent('.field-custom_menu_image').find('#menu_image_url').val(image_url.url);
                _this.parent('.field-custom_menu_image').find('#image_url2').remove();
                _this.parent('.field-custom_menu_image').append('<img src="'+image_url.url+'"" width="100" height="100" />');

            });
        });

		$('.remove-btn-2').click(function(e) {
			var _this = $(this);
			_this.parent('.field-custom_menu_image').find('#menu_image_url').val('');
			_this.parent('.field-custom_menu_image').find('#image_url2').remove();
		});
	});
})( jQuery );