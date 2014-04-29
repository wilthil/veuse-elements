<?php

class VeuseBlockquoteWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'veuse_blockquote_widget', // Base ID
			__('Blockquote','veuse-uikit'), // Name
			array( 'description' => __( 'Add an blockquote', 'veuse-uikit' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		
		extract( $args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		

		if ( isset( $instance[ 'blockquote_text' ] ) ) $blockquote_text = $instance[ 'blockquote_text' ];	else $blockquote_text = '';
		if ( isset( $instance[ 'blockquote_style' ] ) ) $blockquote_style = $instance[ 'blockquote_style' ];	else $blockquote_style = '';
		
		echo $before_widget;
		echo do_shortcode('[veuse_blockquote style="'.$blockquote_style.'" ]'.$blockquote_text .'[/veuse_blockquote]');
		echo $after_widget;
	}


	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
				
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['blockquote_text'] = strip_tags( $new_instance['blockquote_text'] );
		$instance['blockquote_style'] = strip_tags( $new_instance['blockquote_style'] );

		return $instance;
	}

	 
	public function form( $instance ) {
	
		global $widget, $wp_widget_factory, $wp_query;
		
		if ( isset( $instance[ 'title' ] ) ) $title = $instance[ 'title' ];	else $title = __( '', 'veuse-uikit' );
		if ( isset( $instance[ 'blockquote_text' ] ) ) $blockquote_text = $instance[ 'blockquote_text' ];	else $blockquote_text = '';
		if ( isset( $instance[ 'blockquote_style' ] ) ) $blockquote_style = $instance[ 'blockquote_style' ];	else $blockquote_style = '';	
		?>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Alert text:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
					
	
			
		<p>
		<label for="<?php echo $this->get_field_id( 'blockquote_text' ); ?>"><?php _e( 'Icon:' ); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'blockquote_text' ); ?>" name="<?php echo $this->get_field_name( 'blockquote_text' ); ?>"><?php echo esc_attr($blockquote_text);?></textarea></p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'blockquote_style' ); ?>"><?php _e( 'Icon:' ); ?></label>
		
		<select id="<?php echo $this->get_field_id( 'blockquote_style' ); ?>" name="<?php echo $this->get_field_name( 'blockquote_style' ); ?>">
		
			<option value="push"  <?php selected( $blockquote_style, 'push' , true); ?>><?php _e('Pushquote','veuse-uikit');?></option>
			<option value="pull"  <?php selected( $blockquote_style, 'pull' , true); ?>><?php _e('Pullquote','veuse-uikit');?></option>

		</select>
		</p>
		<?php
	}
} 

add_action('init',create_function('','return register_widget("VeuseBlockquoteWidget");'));