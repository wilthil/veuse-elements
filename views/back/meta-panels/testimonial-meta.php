<?php

/* Post meta
=========================================================== */

add_action( 'add_meta_boxes', 'veuse_testimonial_meta_box_add' );

function veuse_testimonial_meta_box_add()
{
	add_meta_box( 'veuse_testimonial_meta', 'Testimonial meta', 'veuse_testimonial_meta_box_cb', 'veuse_testimonial', 'normal', 'high' );
}

function veuse_testimonial_meta_box_cb( $post )
{
	$prefix = 'veuse_testimonial';

	$values = get_post_custom( $post->ID );
	$name = isset( $values[$prefix.'_name'] ) ? esc_attr( $values[$prefix.'_name'][0] ) : '';
	$designation = isset( $values[$prefix.'_designation'] ) ? esc_attr( $values[$prefix.'_designation'][0] ) : '';
	$company = isset( $values[$prefix.'_company'] ) ? esc_attr( $values[$prefix.'_company'][0] ) : '';
	wp_nonce_field( 'veuse_testimonial_nonce', 'meta_box_nonce' );?>
	
	<p>
		<label style="min-width:90px;  display:inline-block;" for="<?php echo $prefix;?>_name"><?php _e('Name','veuse-testimonial');?></label>
		<input type="text" name="<?php echo $prefix;?>_name" id="<?php echo $prefix;?>_name" value="<?php echo $name; ?>" />
		
	</p>


	<p>
		<label style="min-width:90px; display:inline-block;" for="<?php echo $prefix;?>_designation"><?php _e('Designation','veuse-testimonial');?></label>
		<input type="text" name="<?php echo $prefix;?>_designation" id="<?php echo $prefix;?>_designation" value="<?php echo $designation; ?>" />
		<span class="description"><?php _e('Enter name of designation','veuse-testimonial');?></span>
	</p>
	
	<p>
		<label style="min-width:90px; display:inline-block;" for="<?php echo $prefix;?>_company"><?php _e('Company','veuse-testimonial');?></label>
		<input type="text" name="<?php echo $prefix;?>_company" id="<?php echo $prefix;?>_company" value="<?php echo $company; ?>" />
		<span class="description"><?php _e('Time of company','veuse-testimonial');?></span>
	</p>

<?php }


add_action( 'save_post', 'veuse_testimonial_meta_box_save' );


function veuse_testimonial_meta_box_save( $post_id ){

	$prefix = 'veuse_testimonial';

	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'veuse_testimonial_nonce' ) ) return;

	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_posts' ) ) return;

	// now we can actually save the data
	$allowed = array(
		'a' => array( // on allow a tags
			'href' => array() // and those anchors can only have href attribute
		)
	);

		
	// Probably a good idea to make sure your data is set
	if( isset( $_POST[$prefix.'_name'] ) )
		update_post_meta( $post_id, $prefix.'_name', wp_kses( $_POST[$prefix.'_name'], $allowed ) );
	else
		delete_post_meta($post_id, $prefix.'_name');
	
	// Probably a good idea to make sure your data is set
	if( isset( $_POST[$prefix.'_designation'] ) )
		update_post_meta( $post_id, $prefix.'_designation', wp_kses( $_POST[$prefix.'_designation'], $allowed ) );
	else
		delete_post_meta($post_id, $prefix.'_designation');
		
	// Probably a good idea to make sure your data is set
	if( isset( $_POST[$prefix.'_company'] ) )
		update_post_meta( $post_id, $prefix.'_company', wp_kses( $_POST[$prefix.'_company'], $allowed ) );
	else
		delete_post_meta($post_id, $prefix.'_company');

}
?>