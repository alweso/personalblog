

jQuery(".scrollto").on("click", function(){
	jQuery('html, body').animate({
	    scrollTop: jQuery(".post-container").offset().top
	}, 1000);
});