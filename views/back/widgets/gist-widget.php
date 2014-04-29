<?php

class VeuseGistWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'veuse_gist_widget', // Base ID
			__('Gist','veuse-uikit'), // Name
			array( 'description' => __( 'Insert a gist on your website', 'veuse-uikit' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		
		extract( $args );

		if ( isset( $instance[ 'gist_id' ] ) ) $gist_id = $instance[ 'gist_id' ];	else $gist_id = '';
		if ( isset( $instance[ 'gist_file' ] ) ) $gist_file = $instance[ 'gist_file' ];	else $gist_file = '';
		
		echo $before_widget;
		echo do_shortcode('[veuse_gist id="'.$gist_id .'" file="'.$gist_file.'" ]');
		echo $after_widget;
	}


	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
				
		$instance['gist_file'] = strip_tags( $new_instance['gist_file'] );
		$instance['gist_id'] = strip_tags( $new_instance['gist_id'] );

		return $instance;
	}

	 
	public function form( $instance ) {
	
		global $widget, $wp_widget_factory, $wp_query;
		
		if ( isset( $instance[ 'gist_file' ] ) ) $gist_file = $instance[ 'gist_file' ];	else $gist_file = __( '', 'veuse-uikit' );
		if ( isset( $instance[ 'gist_id' ] ) ) $gist_id = $instance[ 'gist_id' ];	else $gist_id = '';
		
		?>

		<p>
		<label for="<?php echo $this->get_field_id( 'gist_file' ); ?>"><?php _e( 'File:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'gist_file' ); ?>" name="<?php echo $this->get_field_name( 'gist_file' ); ?>" type="text" value="<?php echo esc_attr( $gist_file ); ?>" />
		</p>
					
	
			
		<p>
		<label for="<?php echo $this->get_field_id( 'gist_id' ); ?>"><?php _e( 'Id:' ); ?></label>
		<input type="text" id="<?php echo $this->get_field_id( 'gist_id' ); ?>" name="<?php echo $this->get_field_name( 'gist_id' ); ?>" value="<?php echo esc_attr($gist_id);?>"/></p>
		
		
		<?php
	}
} 

add_action('init',create_function('','return register_widget("VeuseGistWidget");'));