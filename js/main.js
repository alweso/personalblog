jQuery(document).ready(function(){
	var colorCodes = [];
	jQuery('.acf-category-color').each(function(){
		colorCodes.push(jQuery(this).text());
		console.log(colorCodes);
	});
	var categoryClasses = [];
	jQuery('.acf-category-id').each(function(){
		categoryClasses.push(jQuery(this).text());
		console.log(categoryClasses);
	});

	var i;
	for (i = 0; i < categoryClasses.length; i++) {
	// jQuery('span').hasClass(categoryClasses).css("background:red;display:block;")
	// console.log(typeof(categoryClasses));
	jQuery('.'+categoryClasses[i]).addClass(colorCodes[i]).attr('style', 'background:' + colorCodes[i] + ';display:inline-block;color:white;font-size:11px;padding:0px 5px;');
	// console.log(jQuery(categoryClasses[i]).text())
	console.log(categoryClasses[i]);
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