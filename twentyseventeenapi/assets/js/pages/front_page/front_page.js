(function($) {
	"use strict";
		
	// on document ready
    document.addEventListener("DOMContentLoaded", function() {
		$('body').on('click', '.more_posts', {}, function(evt) {
			evt.preventDefault();
			
			is_loading(true);
			
			postCollection.more().then(function() {
				is_loading(false);
				
				render_posts(postCollection.models);
			});
		});
    });
	
	function render_posts(models) {
		for(let i in models) {
			const current_model = postCollection.models[i];
			
			const posts_html = simplr.template.build({
			  component : 'single_post_item',
			  tokens : {
				  id : current_model.attributes.id,
				  permalink : current_model.attributes.link,
				  post_title : current_model.attributes.title.rendered,
				  post_excerpt : current_model.attributes.excerpt.rendered
			  }
			});
			
			$('#main').append(posts_html);
		}
	}
	
	function is_loading(state) {
		if(state) {
			$('#main').append('<article class="loading"><img src="' + ambr_global.theme_root_uri + '/assets/images/ajax-loader.gif" /></article>');
		} else {
			$('.loading').remove();
		}
	}
	
	// let's do things now
	const postCollection = new wp.api.collections.Posts();
	
	// let's load the initial posts
	postCollection.fetch({ data: {
		per_page : 1
	} }).then(function() {
		is_loading(false);
		
		render_posts(postCollection.models);
	});

})(jQuery);