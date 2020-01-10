jQuery(function($){
 
	/*
	 * Load More
	 */

	// $('#misha_loadmore').click(function(){
 
	// 	$.ajax({
	// 		url : misha_loadmore_params.ajaxurl, // AJAX handler
	// 		data : {
	// 			'action': 'loadmorebutton', // the parameter for admin-ajax.php
	// 			'query': misha_loadmore_params.posts, // loop parameters passed by wp_localize_script()
	// 			'page' : misha_loadmore_params.current_page // current page
	// 		},
	// 		type : 'POST',
	// 		beforeSend : function ( xhr ) {
	// 			$('#misha_loadmore').text('Loading...'); // some type of preloader
	// 		},
	// 		success : function( posts ){
	// 			if( posts ) {
	// 				$("#initial-posts").remove();
	// 				$('#misha_loadmore').text( 'More posts' );
	// 				$('#misha_posts_wrap').append( posts ); // insert new posts
	// 				misha_loadmore_params.current_page++;
 
	// 				if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) 
	// 					$('#misha_loadmore').hide(); // if last page, HIDE the button
 
	// 			} else {
	// 				$('#misha_loadmore').hide(); // if no data, HIDE the button as well
	// 			}
	// 		}
	// 	});
	// 	return false;
	// });

		var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
	    bottomOffset = 2000; // the distance (in px) from the page bottom when you want to load more posts

	function loadMorePosts(data) {
		$.ajax({
				url : misha_loadmore_params.ajaxurl,
				data:data,
				type:'POST',
				beforeSend: function( xhr ){
					// you can also add your own preloader here
					// you see, the AJAX call is in process, we shouldn't run it again until complete
					canBeLoaded = false; 
					$('#misha_loadmore').text( 'Loading' );
				},
				success:function(data){
					if( data ) {
					// $('#misha_loadmore').text( 'More posts' );
					$('#misha_posts_wrap').append( data ); // insert new posts
					misha_loadmore_params.current_page++;
 					// canBeLoaded = true;
					if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) 
					// 	$('#misha_loadmore').hide(); // if last page, HIDE the button
				 		$('#misha_loadmore').text( '' );
						canBeLoaded = true; // the ajax is completed, now we can run it again
						// misha_loadmore_params.current_page++;
					}
					else {
						canBeLoaded = false;
					}
				}
			});
	}

 
	$(window).scroll(function(){
		var data = {
			'action': 'loadmore',
			'query': misha_loadmore_params.posts,
			'page' : misha_loadmore_params.current_page
		};
		if( $(document).scrollTop() > ( $(document).height() - bottomOffset ) && canBeLoaded == true ){
			loadMorePosts(data);
		};
	});
 
	/*
	 * Filter
	 */
	 var filteredData;
	$('#misha_filters').change(function(){
 			filteredData = $('#misha_filters').serialize();
 			// loadMorePosts(filteredData);
		$.ajax({
			url : misha_loadmore_params.ajaxurl,
			data : $('#misha_filters').serialize(), // form data
			dataType : 'json', // this data type allows us to receive objects from the server
			type : 'POST',
			beforeSend : function(xhr){
				$('#misha_filters').find('button').text('Filtering...');
				// canBeLoaded = false;
			},
			success : function( data ){
				console.log(data);
 				$("#initial-posts").remove();
				// when filter applied:
				// set the current page to 1
				misha_loadmore_params.current_page = 1;
 
				// set the new query parameters
				misha_loadmore_params.posts = data.posts;
 
				// set the new max page parameter
				misha_loadmore_params.max_page = data.max_page;

				// set the new max page parameter
				misha_loadmore_params.max_page = data.max_page;
 
				// change the button label back
				$('#misha_filters').find('button').text('Apply filter');
 
				// insert the posts to the container
				$('#misha_posts_wrap').html(data.content);
 canBeLoaded = true;
				// hide load more button, if there are not enough posts for the second page
				if ( data.max_page < 2 ) {
					$('#misha_loadmore').hide();
				} else {
					$('#misha_loadmore').show();
					canBeLoaded = true;
					misha_loadmore_params.current_page++;
				}

			}
		});
 
		// do not submit the form
		return false;
 
	});
 
});