<?php

class VeuseTestimonialSliderWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'veuse_testimonialslider_widget', // Base ID
			'Testimonials slider (Veuse)', // Name
			array( 'description' => __( 'Display a slider with testimonials.', 'veuse-uikit' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$testimonials = $instance['testimonials'];
		
		$testimonials = rtrim($testimonials, ',');
		
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;	
			 // Do Your Widgety Stuff Here…
			echo do_shortcode('[veuse_testimonialslider testimonials="'. $testimonials .'"]');
		
		echo $after_widget;
	}


	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
				
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['testimonials'] = strip_tags( $new_instance['testimonials'] );
		
		return $instance;
	}

	 
	public function form( $instance ) {
	
		global $widget, $wp_widget_factory, $wp_query;
		
		if ( isset( $instance[ 'title' ] ) ) $title = $instance[ 'title' ]; else $title = __( '', 'text_domain' );	
		if ( isset( $instance[ 'testimonials' ] ) ) $testimonials = $instance[ 'testimonials' ]; else $testimonials = '';
		
		?>
		
		<p>
		<label style="width:80px;" for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<style>
			.testimonialselector-wrapper {
				
				padding:10px; background: #fff; border:1px solid #eee; overflow: scroll; max-height:180px;
				
			}
			
			.testimonialselector-wrapper a { 
				padding:3px 10px 3px 0px;  display: block; margin: 0; cursor: pointer; text-decoration: none;
				border-bottom:1px dotted #d4d4d4;
			}
			
			.testimonialselector-wrapper a:hover { color:#2a95c5;}
						
			.testimonialselector-wrapper a:after {
					content:'';
					color:#999;
					float:right;
					font-weight: bold;
				} 
			.testimonialselector-wrapper a.active { font-weight: bold; color:#de4b29;}
			.testimonialselector-wrapper a.active:after {
					content:'x';
					color:#de4b29;
				
			}  
		</style>
		
		<label style="min-width:90px;" for="<?php echo $this->get_field_id( 'selector' ); ?>"><?php _e( "Select testimonials:",'veuse-uikit' ); ?></label> 
		
		<div class="testimonialselector-wrapper">
		<?php
		
		$testimonials_array = explode(',', $testimonials);
		
		$posts = get_posts( array(
			'post_type' => 'veuse_testimonial',
			'orderby' => 'title', 
            'order' => 'DESC', 
            'posts_per_page' => -1, 
            'post_status' => 'publish' 
			 )
		);
        
        if( $posts ){
                              
            foreach( $posts as $testimonial ){
            	?>

            	
            	<a href="#" data-testimonial-id="<?php echo $testimonial->ID;?>" <?php if(!empty($testimonial) && in_array($testimonial->ID, $testimonials_array) ) echo 'class="active"';?>> <?php echo $testimonial->post_title;?></a>
            	<?php
     
            }
            
        }

		?>
		</div>

		
		<input id="<?php echo $this->get_field_id( 'testimonials' ); ?>" name="<?php echo $this->get_field_name( 'testimonials' ); ?>" type="hidden" value="<?php echo esc_attr( $testimonials );?>" />
		
		
				
		<?php

	}

} 

add_action('widgets_init',create_function('','return register_widget("VeuseTestimonialSliderWidget");'));

 
?>