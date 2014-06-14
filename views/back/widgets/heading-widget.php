<?php

class VeuseHeadingWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'veuse_heading_widget', // Base ID
			__('Heading','veuse-uikit'), // Name
			array( 'description' => __( 'Add a heading', 'veuse-uikit' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		
		extract( $args );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		

		if ( isset( $instance[ 'heading_size' ] ) ) $heading_size = $instance[ 'heading_size' ];	else $heading_size = '';
		if ( isset( $instance[ 'heading_textalign' ] ) ) $heading_textalign = $instance[ 'heading_textalign' ];	else $heading_textalign = '';
		if ( isset( $instance[ 'heading_texttransform' ] ) ) $heading_texttransform = $instance[ 'heading_texttransform' ];	else $heading_texttransform = '';
		if ( isset( $instance[ 'heading_decore' ] ) ) $heading_decore = $instance[ 'heading_decore' ];	else $heading_decore = '';
		
		
		echo $before_widget;
		
		echo '<'.$heading_size.' class="veuse-heading '.$heading_textalign.' '.$heading_texttransform.' '.$heading_decore.'">'.$title.'</'.$heading_size.'>';
		//echo do_shortcode('[veuse_heading icon="'.$heading_icon .'" color="'.$heading_color.'" ]'.$title.'[/veuse_heading]');
		echo $after_widget;
	}


	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
				
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['heading_size'] = strip_tags( $new_instance['heading_size'] );
		$instance['heading_textalign'] = strip_tags( $new_instance['heading_textalign'] );
		$instance['heading_texttransform'] = strip_tags( $new_instance['heading_texttransform'] );
		$instance['heading_decore'] = strip_tags( $new_instance['heading_decore'] );

		return $instance;
	}

	 
	public function form( $instance ) {
	
		global $widget, $wp_widget_factory, $wp_query;
		
		if ( isset( $instance[ 'title' ] ) ) $title = $instance[ 'title' ];	else $title = __( '', 'veuse-uikit' );
		if ( isset( $instance[ 'heading_size' ] ) ) $heading_size = $instance[ 'heading_size' ];	else $heading_size = '';
		if ( isset( $instance[ 'heading_textalign' ] ) ) $heading_textalign = $instance[ 'heading_textalign' ];	else $heading_textalign = '';
		if ( isset( $instance[ 'heading_texttransform' ] ) ) $heading_texttransform = $instance[ 'heading_texttransform' ];	else $heading_texttransform = '';
		if ( isset( $instance[ 'heading_decore' ] ) ) $heading_decore = $instance[ 'heading_decore' ];	else $heading_decore = '';
		?>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Text:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
					
		
		<p>
		<label style="min-width:120px; display:inline-block" for="<?php echo $this->get_field_id( 'heading_size' ); ?>"><?php _e( 'Heading size:' ); ?></label>
		
		<select id="<?php echo $this->get_field_id( 'heading_size' ); ?>" name="<?php echo $this->get_field_name( 'heading_size' ); ?>">
		
			<option value="h1"  <?php selected( $heading_size, 'h1' , true); ?>><?php _e('Heading 1','veuse-uikit');?></option>
			<option value="h2"  <?php selected( $heading_size, 'h2' , true); ?>><?php _e('Heading 2','veuse-uikit');?></option>
			<option value="h3"  <?php selected( $heading_size, 'h3' , true); ?>><?php _e('Heading 3','veuse-uikit');?></option>
			<option value="h4"  <?php selected( $heading_size, 'h4' , true); ?>><?php _e('Heading 4','veuse-uikit');?></option>
			<option value="h5"  <?php selected( $heading_size, 'h5' , true); ?>><?php _e('Heading 5','veuse-uikit');?></option>
			<option value="h6"  <?php selected( $heading_size, 'h6' , true); ?>><?php _e('Heading 6','veuse-uikit');?></option>
		
		</select>
		</p>
		
		<p>
		<label style="min-width:120px; display:inline-block" for="<?php echo $this->get_field_id( 'heading_textalign' ); ?>"><?php _e( 'Text alignmen:' ); ?></label>
		
		<select id="<?php echo $this->get_field_id( 'heading_textalign' ); ?>" name="<?php echo $this->get_field_name( 'heading_textalign' ); ?>">
		
			<option value="left"  <?php selected( $heading_textalign, 'left' , true); ?>><?php _e('Left','veuse-uikit');?></option>
			<option value="center"  <?php selected( $heading_textalign, 'center' , true); ?>><?php _e('Center','veuse-uikit');?></option>
			<option value="right"  <?php selected( $heading_textalign, 'right' , true); ?>><?php _e('Right','veuse-uikit');?></option>
		
		</select>
		</p>
		
		<p>
		<label style="min-width:120px; display:inline-block" for="<?php echo $this->get_field_id( 'heading_texttransform' ); ?>"><?php _e( 'Text transform:' ); ?></label>
		
		<select id="<?php echo $this->get_field_id( 'heading_texttransform' ); ?>" name="<?php echo $this->get_field_name( 'heading_texttransform' ); ?>">
		
			<option value=""><?php _e('Normal','veuse-uikit');?></option>
			<option value="uppercase-text"  <?php selected( $heading_texttransform, 'uppercase-text' , true); ?>><?php _e('Uppercase','veuse-uikit');?></option>
		
		</select>
		</p>
		
		<p>
		<label style="min-width:120px; display:inline-block" for="<?php echo $this->get_field_id( 'heading_size' ); ?>"><?php _e( 'Heading size:' ); ?></label>
		
		<select id="<?php echo $this->get_field_id( 'heading_decore' ); ?>" name="<?php echo $this->get_field_name( 'heading_decore' ); ?>">
		
			<option value="sidelines"  <?php selected( $heading_decore, 'sidelines' , true); ?>><?php _e('Lines on sides','veuse-uikit');?></option>
			<option value="underline"  <?php selected( $heading_decore, 'underline' , true); ?>><?php _e('Underline','veuse-uikit');?></option>
			
			
		
		</select>
		</p>
		<?php
	}
} 

add_action('init',create_function('','return register_widget("VeuseHeadingWidget");'));