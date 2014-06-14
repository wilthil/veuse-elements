<?php

class VeuseTestimonial{

	private $pluginURI  = '';
	private $pluginPATH = '';
	
	function __construct(){
		
		$this->pluginURI  = plugin_dir_url(__FILE__) ;
		$this->pluginPATH = plugin_dir_path(__FILE__) ;
		
				
		add_action('init', array(&$this,'register_posttype'));
		
		add_shortcode('veuse_testimonial', array(&$this,'veuse_testimonial'));
		
		//add_filter("manage_edit-veuse_testimonial_columns", array(&$this,"veuse_testimonial_columns"));

		
	}
		
	function register_posttype() {

		$labels = array(
	        'name' => __( 'Testimonials', 'veuse-flextestimonial' ), // Tip: _x('') is used for localization
	        'singular_name' => __( 'Testimonial', 'veuse-flextestimonial' ),
	        'add_new' => __( 'Add New Testimonial', 'veuse-flextestimonial' ),
	        'add_new_item' => __( 'Add New Testimonial','veuse-flextestimonial' ),
	        'edit_item' => __( 'Edit Testimonial', 'veuse-flextestimonial' ),
	        'all_items' => __( 'All Testimonials','veuse-flextestimonial' ),
	        'new_item' => __( 'New Testimonial','veuse-flextestimonial' ),
	        'view_item' => __( 'View Testimonials','veuse-flextestimonial' ),
	        'search_items' => __( 'Search Testimonials','veuse-flextestimonial' ),
	        'not_found' =>  __( 'No Testimonials','veuse-flextestimonial' ),
	        'not_found_in_trash' => __( 'No Testimonials found in Trash','veuse-flextestimonial' ),
	        'parent_item_colon' => ''
	    );

		register_post_type('veuse_testimonial',
			array(
				'labels' => $labels,
				'public' => true,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "testimonial"), // Permalinks
				'query_var' => "testimonial", // This goes to the WP_Query schema
				'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
				'menu_position' => 30,
				'menu_icon' => 'dashicons-editor-quote',
				'publicly_queryable' => false,
				'exclude_from_search' => true,
				'show_in_nav_menus' => false,
				'show_in_menu'  => false
				)
			);
	}
		
	
		function veuse_testimonial_columns( $columns ){

			$columns = array(
				"cb" => "<input type=\"checkbox\" />",
				"title" => "Slideshow Title",
				"thumbnail" => "Featured image",
				//"exc" => "Excerpt",
				//"showcase" => "Showcase",
				"slides" => "Slides"
			);
		
			return $columns;
		
		}
			
				
		function veuse_testimonial_locate_part($file) {

		     if ( file_exists( get_stylesheet_directory().'/'.$file.'.php'))
		     	$filepath = get_stylesheet_directory().'/'.$file.'.php';
			 else
		        $filepath = $this->pluginPATH .$file.'.php';
	
			return $filepath;
		}
		

}

$veuse_testimonial = new VeuseTestimonial;

?>