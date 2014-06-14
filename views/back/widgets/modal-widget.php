<?php

class VeuseModalWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'veuse_modal_widget', // Base ID
			__('Modal','veuse-uikit'), // Name
			array( 'description' => __( 'Add a modalbed panel', 'veuse-uikit' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		
		extract( $args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		//$modal_icon =  $instance['modal_icon'];
		$modal_content =  $instance['modal_content'];

		
		if ( isset( $instance[ 'modal_icon' ] ) ) $modal_icon = $instance[ 'modal_icon' ];	else $modal_icon = '';
		
		echo $before_widget;
		//if ( ! empty( $title ) )
			//echo $before_title . $title . $after_title;

			echo do_shortcode('[veuse_modal title="'.$title.'" icon="'.$modal_icon .'"]'. $modal_content.'[/veuse_modal]');
			
		
		echo $after_widget;
	}


	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
				
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['modal_icon'] = strip_tags( $new_instance['modal_icon'] );
		//$instance['modal_content'] = strip_tags( $new_instance['modal_content'] );
		$instance['modal_content'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['modal_content']) ) ); // wp_filter_post_kses() expects slashed

		return $instance;
	}

	 
	public function form( $instance ) {
	
		global $widget, $wp_widget_factory, $wp_query;
		
		if ( isset( $instance[ 'title' ] ) ) $title = $instance[ 'title' ];	else $title = __( '', 'text_domain' );
		if ( isset( $instance[ 'modal_icon' ] ) ) $modal_icon = $instance[ 'modal_icon' ];	else $modal_icon = '';
		if ( isset( $instance[ 'modal_content' ] ) ) $modal_content = $instance[ 'modal_content' ];	else $modal_content = '';
			
		
		?>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
					
		<p>
		<label for="<?php echo $this->get_field_id( 'modal_content' ); ?>"><?php _e( 'Modal content:' ); ?></label> 
		<textarea class="widefat" rows="10" name="<?php echo $this->get_field_name( 'modal_content' ); ?>"><?php echo esc_attr($modal_content);?></textarea></p>
			
		<p>
		<label for="<?php echo $this->get_field_id( 'modal_icon' ); ?>"><?php _e( 'Icon:' ); ?></label>
		<input type="text" id="<?php echo $this->get_field_id( 'modal_icon' ); ?>" name="<?php echo $this->get_field_name( 'modal_icon' ); ?>" value="<?php echo esc_attr($modal_icon);?>"/></p>

		<?php

	}

} 

add_action('widgets_init',create_function('','return register_widget("VeuseModalWidget");'));
 
?>