<?php 

	$expert_electrician_custom_style = '';

	// Logo Size
	$expert_electrician_logo_top_margin = get_theme_mod('expert_electrician_logo_top_margin');
	$expert_electrician_logo_bottom_margin = get_theme_mod('expert_electrician_logo_bottom_margin');
	$expert_electrician_logo_left_margin = get_theme_mod('expert_electrician_logo_left_margin');
	$expert_electrician_logo_right_margin = get_theme_mod('expert_electrician_logo_right_margin');

	if( $expert_electrician_logo_top_margin != '' || $expert_electrician_logo_bottom_margin != '' || $expert_electrician_logo_left_margin != '' || $expert_electrician_logo_right_margin != ''){
		$expert_electrician_custom_style .=' .inner-logo {';
			$expert_electrician_custom_style .=' margin-top: '.esc_attr($expert_electrician_logo_top_margin).'px;
			margin-bottom: '.esc_attr($expert_electrician_logo_bottom_margin).'px;
			margin-left: '.esc_attr($expert_electrician_logo_left_margin).'px;
			margin-right: '.esc_attr($expert_electrician_logo_right_margin).'px;';
		$expert_electrician_custom_style .=' }';
	}

	// Service Section padding
	$expert_electrician_service_section_padding = get_theme_mod('expert_electrician_service_section_padding');

	if( $expert_electrician_service_section_padding != ''){
		$expert_electrician_custom_style .=' #services-section {';
			$expert_electrician_custom_style .=' padding-top: '.esc_attr($expert_electrician_service_section_padding).'px;
			padding-bottom: '.esc_attr($expert_electrician_service_section_padding).'px;';
		$expert_electrician_custom_style .=' }';
	}

	// Site Title Font Size
	$expert_electrician_site_title_font_size = get_theme_mod('expert_electrician_site_title_font_size');
	if( $expert_electrician_site_title_font_size != ''){
		$expert_electrician_custom_style .=' .logo h1.site-title, .logo p.site-title {';
			$expert_electrician_custom_style .=' font-size: '.esc_attr($expert_electrician_site_title_font_size).'px;';
		$expert_electrician_custom_style .=' }';
	}

	// Site Tagline Font Size
	$expert_electrician_site_tagline_font_size = get_theme_mod('expert_electrician_site_tagline_font_size');
	if( $expert_electrician_site_tagline_font_size != ''){
		$expert_electrician_custom_style .=' .logo p.site-description {';
			$expert_electrician_custom_style .=' font-size: '.esc_attr($expert_electrician_site_tagline_font_size).'px;';
		$expert_electrician_custom_style .=' }';
	}

	// Copyright padding
	$expert_electrician_copyright_padding = get_theme_mod('expert_electrician_copyright_padding');

	if( $expert_electrician_copyright_padding != ''){
		$expert_electrician_custom_style .=' .site-info {';
			$expert_electrician_custom_style .=' padding-top: '.esc_attr($expert_electrician_copyright_padding).'px; padding-bottom: '.esc_attr($expert_electrician_copyright_padding).'px;';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_copyright_color = get_theme_mod('expert_electrician_copyright_color');
	if ( $expert_electrician_copyright_color != '') {
		$expert_electrician_custom_style .=' .site-info p, .site-info a {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_copyright_color).';';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_copyrightbg_color = get_theme_mod('expert_electrician_copyrightbg_color');
	if ( $expert_electrician_copyrightbg_color != '') {
		$expert_electrician_custom_style .=' .site-footer {';
			$expert_electrician_custom_style .=' background-color:'.esc_attr($expert_electrician_copyrightbg_color).';';
		$expert_electrician_custom_style .=' }';
	}

	// Header Image
	$header_image_url = expert_electrician_banner_image( $image_url = '' );
	if( $header_image_url != ''){
		$expert_electrician_custom_style .=' #inner-pages-header {';
			$expert_electrician_custom_style .=' background-image: url('. esc_url( $header_image_url ).'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;';
		$expert_electrician_custom_style .=' }';
		$expert_electrician_custom_style .=' .header-overlay {';
			$expert_electrician_custom_style .=' position: absolute; 	width: 100%; height: 100%; 	top: 0; left: 0; background: #000; opacity: 0.3;';
		$expert_electrician_custom_style .=' }';
	} else {
		$expert_electrician_custom_style .=' #inner-pages-header {';
			$expert_electrician_custom_style .=' background: linear-gradient(0deg,#eceffc,#fff 80%) no-repeat; ';
		$expert_electrician_custom_style .=' }';
		$expert_electrician_custom_style .=' #inner-pages-header h1 {';
			$expert_electrician_custom_style .=' color: #000; ';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_slider_hide_show = get_theme_mod('expert_electrician_slider_hide_show',false);
	if( $expert_electrician_slider_hide_show == true){
		$expert_electrician_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$expert_electrician_custom_style .=' display:none;';
		$expert_electrician_custom_style .=' }';
	}

	//Topbar color
	$expert_electrician_topbtn_color = get_theme_mod('expert_electrician_topbtn_color');
	$expert_electrician_topbtnbg_color = get_theme_mod('expert_electrician_topbtnbg_color');

	if ( $expert_electrician_topbtn_color != '') {
		$expert_electrician_custom_style .=' .top-header .call p.callno {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_topbtn_color).'; background-color:'.esc_attr($expert_electrician_topbtnbg_color).'';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_menu_color = get_theme_mod('expert_electrician_menu_color');
	if ( $expert_electrician_menu_color != '') {
		$expert_electrician_custom_style .=' .nav-menu ul li a {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_menu_color).';';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_submenu_color = get_theme_mod('expert_electrician_submenu_color');
	if ( $expert_electrician_submenu_color != '') {
		$expert_electrician_custom_style .=' .nav-menu ul ul a {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_submenu_color).';';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_menubg_color = get_theme_mod('expert_electrician_menubg_color');
	if ( $expert_electrician_menubg_color != '') {
		$expert_electrician_custom_style .=' .menu-section {';
			$expert_electrician_custom_style .=' background: linear-gradient(107deg, '.esc_attr($expert_electrician_menubg_color).' 98%, transparent 10%);';
		$expert_electrician_custom_style .=' }';
	}

	//Slider color
	$expert_electrician_slider_title_color = get_theme_mod('expert_electrician_slider_title_color');
	if ( $expert_electrician_slider_title_color != '') {
		$expert_electrician_custom_style .=' #slider h2 a {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_slider_title_color).';';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_slider_text_color = get_theme_mod('expert_electrician_slider_text_color');
	if ( $expert_electrician_slider_text_color != '') {
		$expert_electrician_custom_style .=' #slider p {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_slider_text_color).';';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_slider_bg_color = get_theme_mod('expert_electrician_slider_bg_color');
	if ( $expert_electrician_slider_bg_color != '') {
		$expert_electrician_custom_style .=' #slider .slider-bg {';
			$expert_electrician_custom_style .=' background-color:'.esc_attr($expert_electrician_slider_bg_color).';';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_slider_nparrow_color = get_theme_mod('expert_electrician_slider_nparrow_color');
	if ( $expert_electrician_slider_nparrow_color != '') {
		$expert_electrician_custom_style .=' #slider .carousel-control-prev-icon i, #slider .carousel-control-next-icon i {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_slider_nparrow_color).'; border-color:'.esc_attr($expert_electrician_slider_nparrow_color).';';
		$expert_electrician_custom_style .=' }';
	}

	//Feature color
	$expert_electrician_feature_title_color = get_theme_mod('expert_electrician_feature_title_color');
	if ( $expert_electrician_feature_title_color != '') {
		$expert_electrician_custom_style .=' #feature-section .feature-box h2 a {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_feature_title_color).';';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_feature_titlebg_color = get_theme_mod('expert_electrician_feature_titlebg_color');
	if ( $expert_electrician_feature_titlebg_color != '') {
		$expert_electrician_custom_style .=' #feature-section .feature-box h2 {';
			$expert_electrician_custom_style .=' background-color:'.esc_attr($expert_electrician_feature_titlebg_color).';';
		$expert_electrician_custom_style .=' }';
	}

	//Service color
	$expert_electrician_service_text_color = get_theme_mod('expert_electrician_service_text_color');
	if ( $expert_electrician_service_text_color != '') {
		$expert_electrician_custom_style .=' #services-section p.small-title {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_service_text_color).';';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_service_title_color = get_theme_mod('expert_electrician_service_title_color');
	if ( $expert_electrician_service_title_color != '') {
		$expert_electrician_custom_style .=' #services-section h3 {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_service_title_color).';';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_service_icon_color = get_theme_mod('expert_electrician_service_icon_color');
	$expert_electrician_service_iconbg_color = get_theme_mod('expert_electrician_service_iconbg_color');
	$expert_electrician_service_iconbdr_color = get_theme_mod('expert_electrician_service_iconbdr_color');

	if ( $expert_electrician_service_icon_color != '') {
		$expert_electrician_custom_style .=' #services-section .services-box .service-icon {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_service_icon_color).'; background-color:'.esc_attr($expert_electrician_service_iconbg_color).'; border-color:'.esc_attr($expert_electrician_service_iconbdr_color).';';
		$expert_electrician_custom_style .=' }';
	}
	

	$expert_electrician_service_boxtitle_color = get_theme_mod('expert_electrician_service_boxtitle_color');
	if ( $expert_electrician_service_boxtitle_color != '') {
		$expert_electrician_custom_style .=' #services-section .services-box h4 a {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_service_boxtitle_color).';';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_service_boxtext_color = get_theme_mod('expert_electrician_service_boxtext_color');
	if ( $expert_electrician_service_boxtext_color != '') {
		$expert_electrician_custom_style .=' #services-section .services-box p {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_service_boxtext_color).';';
		$expert_electrician_custom_style .=' }';
	}

	$expert_electrician_service_boxlink_color = get_theme_mod('expert_electrician_service_boxlink_color');
	if ( $expert_electrician_service_boxlink_color != '') {
		$expert_electrician_custom_style .=' #services-section a.seemore-btn {';
			$expert_electrician_custom_style .=' color:'.esc_attr($expert_electrician_service_boxlink_color).';';
		$expert_electrician_custom_style .=' }';
	}