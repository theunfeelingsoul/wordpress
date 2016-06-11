<?php 
	
	function womenfitness_resources(){
		wp_enqueue_style('style',get_stylesheet_uri());

		wp_enqueue_style( 'font-awesome.min.css',  get_template_directory_uri() .'/css/font-awesome.min.css', array(), null, 'all' );
		wp_enqueue_style( 'tooltipster.css',  get_template_directory_uri() .'/css/tooltipster.css', array(), null, 'all' );
	}

	add_action('wp_enqueue_scripts','womenfitness_resources');

	

	
	function womenfitness_setup(){
		// Navigation Menus
		register_nav_menus(array(
			'primary' => __('Primary Menu'),
			'Footer' => __('Footer Menu'),
		));

		//add featured image support
		add_theme_support('post-thumbnails');
		add_image_size('small-thumbnail',180,120,true);
		add_image_size('banner-image',920,210,array('left','top'));
	}

	add_action('after_setup_theme','womenfitness_setup');

	// add our widget Locations
	function ourWidgetsInit(){
		register_sidebar(array(
			'name' => 'Sidebar',
			'id' => 'sidebar1',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>'
		));

		register_sidebar(array(
			'name' => 'Footer Area 1',
			'id' => 'footer1',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>'
		));

		register_sidebar(array(
			'name' => 'Footer Area 2',
			'id' => 'footer2',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>'
		));

		register_sidebar(array(
			'name' => 'Footer Area 3',
			'id' => 'footer3',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>'
		));

		register_sidebar(array(
			'name' => 'Footer Area 4',
			'id' => 'footer4',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>'
		));
	}

	add_action('widgets_init','ourWidgetsInit');
 ?>