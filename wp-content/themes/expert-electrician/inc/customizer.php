<?php
/**
 * Expert Electrician: Customizer
 *
 * @subpackage Expert Electrician
 * @since 1.0
 */

use WPTRT\Customize\Section\Expert_Electrician_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Expert_Electrician_Button::class );

	$manager->add_section(
		new Expert_Electrician_Button( $manager, 'expert_electrician_pro', [
			'title'      => __( 'Expert Electrician Pro', 'expert-electrician' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'expert-electrician' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/themes/electrician-wordpress-theme/', 'expert-electrician')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'expert-electrician-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'expert-electrician-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function expert_electrician_customize_register( $wp_customize ) {

	$wp_customize->add_setting('expert_electrician_logo_margin',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('expert_electrician_logo_margin',array(
		'label' => __('Logo Margin','expert-electrician'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('expert_electrician_logo_top_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_electrician_sanitize_float'
	));
	$wp_customize->add_control('expert_electrician_logo_top_margin',array(
		'type' => 'number',
		'description' => __('Top','expert-electrician'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('expert_electrician_logo_bottom_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_electrician_sanitize_float'
	));
	$wp_customize->add_control('expert_electrician_logo_bottom_margin',array(
		'type' => 'number',
		'description' => __('Bottom','expert-electrician'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('expert_electrician_logo_left_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_electrician_sanitize_float'
	));
	$wp_customize->add_control('expert_electrician_logo_left_margin',array(
		'type' => 'number',
		'description' => __('Left','expert-electrician'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('expert_electrician_logo_right_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_electrician_sanitize_float'
	));
	$wp_customize->add_control('expert_electrician_logo_right_margin',array(
		'type' => 'number',
		'description' => __('Right','expert-electrician'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('expert_electrician_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'expert_electrician_sanitize_checkbox'
	));
	$wp_customize->add_control('expert_electrician_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','expert-electrician'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('expert_electrician_show_site_title_color',array(
		'default' => '#001b42',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('expert_electrician_show_site_title_color',array(
		'type' => 'color',
		'label' => __('Site Title Color','expert-electrician'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('expert_electrician_site_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_electrician_sanitize_float'
	));
	$wp_customize->add_control('expert_electrician_site_title_font_size',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','expert-electrician'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('expert_electrician_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'expert_electrician_sanitize_checkbox'
	));
	$wp_customize->add_control('expert_electrician_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','expert-electrician'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('expert_electrician_site_tagline_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_electrician_sanitize_float'
	));
	$wp_customize->add_control('expert_electrician_site_tagline_font_size',array(
		'type' => 'number',
		'label' => __('Site Tagline Font Size','expert-electrician'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_panel( 'expert_electrician_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'expert-electrician' ),
		'description' => __( 'Description of what this panel does.', 'expert-electrician' ),
	) );

	$wp_customize->add_section( 'expert_electrician_theme_options_section', array(
    	'title'      => __( 'General Settings', 'expert-electrician' ),
		'priority'   => 30,
		'panel' => 'expert_electrician_panel_id'
	) );

	$wp_customize->add_setting('expert_electrician_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'expert_electrician_sanitize_choices'
	));
	$wp_customize->add_control('expert_electrician_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','expert-electrician'),
		'section' => 'expert_electrician_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','expert-electrician'),
		   'Right Sidebar' => __('Right Sidebar','expert-electrician'),
		   'One Column' => __('One Column','expert-electrician'),
		   'Three Columns' => __('Three Columns','expert-electrician'),
		   'Four Columns' => __('Four Columns','expert-electrician'),
		   'Grid Layout' => __('Grid Layout','expert-electrician')
		),
	));

	$wp_customize->add_setting('expert_electrician_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'expert_electrician_sanitize_choices'
	));
	$wp_customize->add_control('expert_electrician_single_post_sidebar',array(
		'type' => 'select',
		'label' => __('Single Post Sidebar Layout','expert-electrician'),
		'section' => 'expert_electrician_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','expert-electrician'),
		   'Right Sidebar' => __('Right Sidebar','expert-electrician'),
		   'One Column' => __('One Column','expert-electrician')
		),
	));

	$wp_customize->add_setting('expert_electrician_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'expert_electrician_sanitize_choices'
	));
	$wp_customize->add_control('expert_electrician_page_sidebar',array(
		'type' => 'select',
		'label' => __('Page Sidebar Layout','expert-electrician'),
		'section' => 'expert_electrician_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','expert-electrician'),
		   'Right Sidebar' => __('Right Sidebar','expert-electrician'),
		   'One Column' => __('One Column','expert-electrician')
		),
	));

	$wp_customize->add_setting('expert_electrician_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'expert_electrician_sanitize_choices'
	));
	$wp_customize->add_control('expert_electrician_archive_page_sidebar',array(
		'type' => 'select',
		'label' => __('Archive & Search Page Sidebar Layout','expert-electrician'),
		'section' => 'expert_electrician_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','expert-electrician'),
		   'Right Sidebar' => __('Right Sidebar','expert-electrician'),
		   'One Column' => __('One Column','expert-electrician'),
		   'Three Columns' => __('Three Columns','expert-electrician'),
		   'Four Columns' => __('Four Columns','expert-electrician'),
		   'Grid Layout' => __('Grid Layout','expert-electrician')
		),
	));

	//Bottom Header
	$wp_customize->add_section( 'expert_electrician_header_section' , array(
    	'title'    => __( 'Header', 'expert-electrician' ),
		'priority' => null,
		'panel' => 'expert_electrician_panel_id'
	) );

	$wp_customize->add_setting('expert_electrician_hide_show_topbar',array(
    	'default' => false,
    	'sanitize_callback'	=> 'expert_electrician_sanitize_checkbox'
	));
	$wp_customize->add_control('expert_electrician_hide_show_topbar',array(
   	'type' => 'checkbox',
   	'label' => __('Show / Hide Topbar','expert-electrician'),
   	'section' => 'expert_electrician_header_section',
	));

	$wp_customize->add_setting('expert_electrician_topheader_phone_no',array(
    	'default' => '',
    	'sanitize_callback'	=> 'expert_electrician_sanitize_phone_number'
	));
	$wp_customize->add_control('expert_electrician_topheader_phone_no',array(
   	'type' => 'text',
   	'label' => __('Add Phone Number','expert-electrician'),
   	'section' => 'expert_electrician_header_section',
	));

	$wp_customize->add_setting( 'expert_electrician_topbtn_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_topbtn_color', array(
		'label' => 'Button Text Color',
		'section' => 'expert_electrician_header_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_topbtnbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_topbtnbg_color', array(
		'label' => 'Button Bg Color',
		'section' => 'expert_electrician_header_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_menu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_menu_color', array(
		'label' => 'Menu Color',
		'section' => 'expert_electrician_header_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_submenu_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_submenu_color', array(
		'label' => 'Submenu Color',
		'section' => 'expert_electrician_header_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_menubg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_menubg_color', array(
		'label' => 'Menu Bg Color',
		'section' => 'expert_electrician_header_section',
	)));

	//home page slider
	$wp_customize->add_section( 'expert_electrician_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'expert-electrician' ),
		'priority' => null,
		'panel' => 'expert_electrician_panel_id'
	) );

	$wp_customize->add_setting('expert_electrician_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'expert_electrician_sanitize_checkbox'
	));
	$wp_customize->add_control('expert_electrician_slider_hide_show',array(
   	'type' => 'checkbox',
   	'label' => __('Show / Hide Slider','expert-electrician'),
   	'section' => 'expert_electrician_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'expert_electrician_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'expert_electrician_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'expert_electrician_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'expert-electrician' ),
			'description' => __('Image Size (1600px x 600px)', 'expert-electrician' ),
			'section' => 'expert_electrician_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting('expert_electrician_slider_excerpt_length',array(
		'default' => '20',
		'sanitize_callback'	=> 'expert_electrician_sanitize_float'
	));
	$wp_customize->add_control('expert_electrician_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Slider Excerpt Length','expert-electrician'),
		'section' => 'expert_electrician_slider_section',
	));

	$wp_customize->add_setting( 'expert_electrician_slider_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_slider_title_color', array(
		'label' => 'Title Color',
		'section' => 'expert_electrician_slider_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_slider_text_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_slider_text_color', array(
		'label' => 'Text Color',
		'section' => 'expert_electrician_slider_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_slider_bg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_slider_bg_color', array(
		'label' => 'Overlay Color',
		'section' => 'expert_electrician_slider_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_slider_nparrow_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_slider_nparrow_color', array(
		'label' => 'Next/Pre Arrow Color',
		'section' => 'expert_electrician_slider_section',
	)));

	//Features Section
	$wp_customize->add_section('expert_electrician_features_section',array( 
		'title'	=> __('Features Section','expert-electrician'),
		'description'=> __('<b>Note :</b> This section will appear below the slider.','expert-electrician'),
		'panel' => 'expert_electrician_panel_id',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('expert_electrician_features_category',array(
		'default' => 'select',
		'sanitize_callback' => 'expert_electrician_sanitize_choices',
	));
	$wp_customize->add_control('expert_electrician_features_category',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category To Display Post','expert-electrician'),
		'section' => 'expert_electrician_features_section',
	));

	$wp_customize->add_setting('expert_electrician_features_number',array(
		'default'	=> '4',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('expert_electrician_features_number',array(
		'label'	=> __('Number of posts to show in a category','expert-electrician'),
		'section' => 'expert_electrician_features_section',
		'type'	  => 'number'
	));

	$wp_customize->add_setting( 'expert_electrician_feature_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_feature_title_color', array(
		'label' => 'Title Color',
		'section' => 'expert_electrician_features_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_feature_titlebg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_feature_titlebg_color', array(
		'label' => 'Title Bg Color',
		'section' => 'expert_electrician_features_section',
	)));

	//Services Section
	$wp_customize->add_section('expert_electrician_services_section',array(
		'title'	=> __('Services Section','expert-electrician'),
		'description'=> __('<b>Note :</b> This section will appear below the features.','expert-electrician'),
		'panel' => 'expert_electrician_panel_id',
	));

	$wp_customize->add_setting('expert_electrician_services_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('expert_electrician_services_text',array(
   	'type' => 'text',
   	'label' => __('Add Section Small Title','expert-electrician'),
   	'section' => 'expert_electrician_services_section',
	));

	$wp_customize->add_setting( 'expert_electrician_service_text_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_service_text_color', array(
		'label' => 'Color',
		'section' => 'expert_electrician_services_section',
	)));

	$wp_customize->add_setting('expert_electrician_services_section_title',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('expert_electrician_services_section_title',array(
   	'type' => 'text',
   	'label' => __('Add Section Title','expert-electrician'),
   	'section' => 'expert_electrician_services_section',
	));

	$wp_customize->add_setting( 'expert_electrician_service_title_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_service_title_color', array(
		'label' => 'Color',
		'section' => 'expert_electrician_services_section',
	)));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('expert_electrician_services_category',array(
		'default' => 'select',
		'sanitize_callback' => 'expert_electrician_sanitize_choices',
	));
	$wp_customize->add_control('expert_electrician_services_category',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category To Display Post','expert-electrician'),
		'section' => 'expert_electrician_services_section',
	));

	$wp_customize->add_setting('expert_electrician_service_number',array(
		'default'	=> '3',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('expert_electrician_service_number',array(
		'label'	=> __('Number of posts to show in a category','expert-electrician'),
		'section' => 'expert_electrician_services_section',
		'type'	  => 'number'
	));

	$expert_electrician_service_number = get_theme_mod('expert_electrician_service_number', 3);
	for ($i=1; $i <= $expert_electrician_service_number; $i++) { 
	   $wp_customize->add_setting('expert_electrician_service_icon' . $i, array(
	      'default' => 'fas fa-plug',
	      'sanitize_callback' => 'sanitize_text_field'
	   ));
	   $wp_customize->add_control(new Expert_Electrician_Fontawesome_Icon_Chooser($wp_customize, 'expert_electrician_service_icon' . $i, array(
	      'section' => 'expert_electrician_services_section',
	      'type' => 'icon',
	      'label' => esc_html__('Service Icon ', 'expert-electrician') . $i
	  	)));
	}

	$wp_customize->add_setting('expert_electrician_service_section_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_electrician_sanitize_float'
	));
	$wp_customize->add_control('expert_electrician_service_section_padding',array(
		'type' => 'number',
		'label' => __('Section Top Bottom Padding','expert-electrician'),
		'section' => 'expert_electrician_services_section',
	));

	$wp_customize->add_setting( 'expert_electrician_service_icon_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_service_icon_color', array(
		'label' => 'Icon Color',
		'section' => 'expert_electrician_services_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_service_iconbdr_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_service_iconbdr_color', array(
		'label' => 'Icon Border Color',
		'section' => 'expert_electrician_services_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_service_iconbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_service_iconbg_color', array(
		'label' => 'Icon Bg Color',
		'section' => 'expert_electrician_services_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_service_boxtitle_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_service_boxtitle_color', array(
		'label' => 'Box Title Color',
		'section' => 'expert_electrician_services_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_service_boxtext_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_service_boxtext_color', array(
		'label' => 'Box Text Color',
		'section' => 'expert_electrician_services_section',
	)));

	$wp_customize->add_setting( 'expert_electrician_service_boxlink_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_service_boxlink_color', array(
		'label' => 'Button Color',
		'section' => 'expert_electrician_services_section',
	)));

	//Footer
   $wp_customize->add_section( 'expert_electrician_footer', array(
    	'title'  => __( 'Footer Settings', 'expert-electrician' ),
		'priority' => null,
		'panel' => 'expert_electrician_panel_id'
	) );

	$wp_customize->add_setting('expert_electrician_show_back_totop',array(
		'default' => true,
		'sanitize_callback'	=> 'expert_electrician_sanitize_checkbox'
	));
	$wp_customize->add_control('expert_electrician_show_back_totop',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Back to Top','expert-electrician'),
		'section' => 'expert_electrician_footer'
	));

   $wp_customize->add_setting('expert_electrician_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('expert_electrician_footer_copy',array(
		'label'	=> __('Copyright Text','expert-electrician'),
		'section' => 'expert_electrician_footer',
		'setting' => 'expert_electrician_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting('expert_electrician_copyright_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'expert_electrician_sanitize_float'
 	));
 	$wp_customize->add_control('expert_electrician_copyright_padding',array(
		'type' => 'number',
		'label' => __('Copyright Top Bottom Padding','expert-electrician'),
		'section' => 'expert_electrician_footer',
	));

	$wp_customize->add_setting( 'expert_electrician_copyright_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_copyright_color', array(
		'label' => 'Text Color',
		'section' => 'expert_electrician_footer',
	)));

	$wp_customize->add_setting( 'expert_electrician_copyrightbg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'expert_electrician_copyrightbg_color', array(
		'label' => 'Background Color',
		'section' => 'expert_electrician_footer',
	)));

	$wp_customize->register_section_type( Expert_Electrician_Button::class );

	$wp_customize->add_section(
		new Expert_Electrician_Button( $wp_customize, 'expert_electrician_pro_link', [
			'title'      => __( 'Expert Electrician Pro', 'expert-electrician' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'expert-electrician' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/themes/electrician-wordpress-theme/', 'expert-electrician'),
			'panel' => 'expert_electrician_panel_id'
		] )
	);

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'expert_electrician_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'expert_electrician_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'expert_electrician_customize_register' );

function expert_electrician_customize_partial_blogname() {
	bloginfo( 'name' );
}

function expert_electrician_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function expert_electrician_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function expert_electrician_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

if (class_exists('WP_Customize_Control')) {

    class Expert_Electrician_Fontawesome_Icon_Chooser extends WP_Customize_Control {

        public $type = 'icon';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html($this->label); ?>
                </span>

                <?php if ($this->description) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>

                <div class="expert-electrician-selected-icon">
                    <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
                    <span><i class="fa fa-angle-down"></i></span>
                </div>

                <ul class="expert-electrician-icon-list clearfix">
                    <?php
                    $expert_electrician_font_awesome_icon_array = expert_electrician_font_awesome_icon_array();
                    foreach ($expert_electrician_font_awesome_icon_array as $expert_electrician_font_awesome_icon) {
                        $icon_class = $this->value() == $expert_electrician_font_awesome_icon ? 'icon-active' : '';
                        echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($expert_electrician_font_awesome_icon) . '"></i></li>';
                    }
                    ?>
                </ul>
                <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
            </label>
            <?php
        }

    }

}
function expert_electrician_customizer_script() {
     
    wp_enqueue_style( 'font-awesome-1', esc_url(get_template_directory_uri()).'/assets/css/fontawesome-all.css');
}
add_action( 'customize_controls_enqueue_scripts', 'expert_electrician_customizer_script' );