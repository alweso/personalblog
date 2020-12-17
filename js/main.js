jQuery(document).ready(function(){
	var colorCodes = [];
	jQuery('.acf-category-color').each(function(){
		colorCodes.push(jQuery(this).text());
	});
	var categoryClasses = [];
	jQuery('.acf-category-id').each(function(){
		categoryClasses.push(jQuery(this).text());
	});

	var i;
	for (i = 0; i < categoryClasses.length; i++) {
	// jQuery('span').hasClass(categoryClasses).css("background:red;display:block;")
	// console.log(typeof(categoryClasses));
	jQuery('.'+categoryClasses[i]).addClass(colorCodes[i]).attr('style', 'background:' + colorCodes[i] + ';display:inline-block;color:white;font-size:11px;padding:0px 5px;');
	// console.log(jQuery(categoryClasses[i]).text())
}


	// sticky menu

	jQuery(window).scroll(function (event) {
		var scroll = jQuery(window).scrollTop();
		if (scroll > 100) {
			jQuery('.ekit-template-content-header').addClass('sticky');
		} else {
			jQuery('.ekit-template-content-header').removeClass('sticky');
		}
	});


});

jQuery(window).load(function() {
	/* ------------------------ this will go to video plugin later on -------------------- */

	/*JS FOR SCROLLING THE ROW OF THUMBNAILS*/
  // jQuery('.vid-item').each(function(index){
  //   jQuery(this).on('click', function(){
  //     var current_index = index+1;
  //     jQuery('.vid-item .thumb').removeClass('active');
  //     jQuery('.vid-item:nth-child('+current_index+') .thumb').addClass('active');
  //   });
  // });

  jQuery('.video_link').each(function(){
  	var link = jQuery(this).text();
  	var updatedString = link.substring(17);
  	jQuery('#vid_frame').attr('src', 'https://www.youtube.com/embed/' + updatedString + '?rel=0&showinfo=0&autohide=1');
  });

  jQuery('.video_on_click').on('click', function(){
  	var link2 = jQuery(this).siblings( ".video_link" ).text();
  	var updatedString2 = link2.substring(17);
	jQuery('#vid_frame').attr('src', 'https://youtube.com/embed/' + updatedString2 + '?autoplay=1&rel=0&showinfo=0&autohide=1');
  });

	jQuery(document).ready(function(){
//   jQuery('.owl-carousel').owlCarousel({
//     loop:true,
//     margin:10,
//     nav:true,
//     responsive:{
//         0:{
//             items:1
//         },
//         600:{
//             items:3
//         },
//         1000:{
//             items:4
//         }
//     }
// });

// jQuery( window ).on( 'elementor/frontend/init', function() {
//     elementorFrontend.hooks.addAction( 'frontend/element_ready/awesomesauce.default', WidgetAwesomesauceHandler, function(){
//         $(".owl-carousel").owlCarousel();
//     } );
//   } );
});
});
