jQuery(function($){
 
	/*
	 * Load More
	 */

		var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
	    bottomOffset = 1000; // the distance (in px) from the page bottom when you want to load more posts
	    // $('#misha_loadmore').hide();
	function loadMorePosts(data) {
		console.log("load more function called");
		$.ajax({
				url : misha_loadmore_params.ajaxurl,
				data:data,
				type:'POST',
				dataType : 'json',
				beforeSend: function( xhr ){
					// you can also add your own preloader here
					// you see, the AJAX call is in process, we shouldn't run it again until complete
					canBeLoaded = false; 
					$('#misha_loadmore').show();
					console.log('beforesend in progress');
				},
				success:function(data){
					if( data ) {
					// $('#misha_loadmore').text( 'More posts' );
					$('#misha_posts_wrap').append( data ); // insert new posts
					misha_loadmore_params.current_page++;
 					// canBeLoaded = true;
 					console.log(misha_loadmore_params.current_page);
 					console.log(misha_loadmore_params.max_page );
					if ( misha_loadmore_params.current_page < misha_loadmore_params.max_page ) 
					// 	$('#misha_loadmore').hide(); // if last page, HIDE the button
						console.log("more posts to be loaded");
						canBeLoaded = true; // the ajax is completed, now we can run it again
						// misha_loadmore_params.current_page++;
					} 	else {
						console.log("all loaded");
						$('#misha_loadmore').hide();
						canBeLoaded = false;
					}
				}
			});
	}

	$(window).load(function(){
		var data = {
			'action': 'loadmore',
			'query': misha_loadmore_params.posts,
			'page' : misha_loadmore_params.current_page
		};
		console.log(data);
		loadMorePosts(data);
	});


 
	$(window).scroll(function(){
		var data = {
			'action': 'loadmore',
			'query': misha_loadmore_params.posts,
			'page' : misha_loadmore_params.current_page,
		};
		if( $(document).scrollTop() > ( $(document).height() - bottomOffset ) && canBeLoaded == true ){
			$('#misha_loadmore').show();
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
				canBeLoaded = false;
			},
			success : function( data ){
				console.log(data);
				// when filter applied:
				// set the current page to 1
				misha_loadmore_params.current_page = 1;
 
				// set the new query parameters
				misha_loadmore_params.posts = data.posts;
 
				// set the new max page parameter
				misha_loadmore_params.max_page = data.max_page;

				console.log("max page is " + data.max_page);
 
				// insert the posts to the container
				$('#misha_posts_wrap').html(data.content);
 // canBeLoaded = true;
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
