<?php $testimonials = explode(',',$testimonials); ?>

<ul class="veuse-testimonialslider">
	<?php
	
	foreach ($testimonials as $testimonial){
		
		$post = get_post($testimonial);
		
		
		$name 			= get_post_meta($post->ID, 'veuse_testimonial_name', true);
		$designation 	= get_post_meta($post->ID, 'veuse_testimonial_designation', true);
		$company 		= get_post_meta($post->ID, 'veuse_testimonial_company', true);
		
				
		echo '<li>';
		echo '<blockquote>'.$post->post_excerpt.'</blockquote>';
		
		/* Meta */
		echo '<ul class="testimonial-meta">';
		
		
		if(!empty($name))
		echo '<li>'.$name.',</li>';
		
		if(!empty($designation))
		echo '<li>'.$designation.',</li>';
		
		if(!empty($company))
		echo '<li>'.$company.'</li>';
			
		echo '</ul>';
		
		
		if(!empty($post->post_content)){
			
			echo '<a href="'.get_permalink($post->iD).'" class="veuse-button centered">'.__('Read more','veuse').'</a>';
		}
		echo '</li>';
		
	}
?>	
</ul>

<script>
	
jQuery(document).ready(function(){
	
	jQuery(".veuse-testimonialslider").owlCarousel({
	 		
	      navigation : false,
	      slideSpeed : 300,
	      paginationSpeed : 400,
	      singleItem:true,
	      autoHeight : false,
		  transitionStyle:"fade"
	});
});
	
</script>


