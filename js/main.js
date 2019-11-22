

jQuery(".scrollto").on("click", function(){
	jQuery('html, body').animate({
	    scrollTop: jQuery(".post-container").offset().top
	}, 1000);
});



jQuery(function($){
	jQuery('#filter').submit(function(){
		var filter = jQuery('#filter');
		jQuery.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Processing...'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Apply filter'); // changing the button label back
				jQuery('#response').html(data); // insert data
				jQuery(".allposts").hide();
			}
		});
		return false;
	});
});