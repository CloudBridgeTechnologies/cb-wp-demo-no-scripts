<?php
//about theme info
add_action( 'admin_menu', 'expert_electrician_gettingstarted' );
function expert_electrician_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'expert-electrician'), esc_html__('About Theme', 'expert-electrician'), 'edit_theme_options', 'expert_electrician_guide', 'expert_electrician_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function expert_electrician_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'expert_electrician_admin_theme_style');

//guidline for about theme
function expert_electrician_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'expert-electrician' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Expert Electrician WordPress Theme', 'expert-electrician' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'expert-electrician' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'expert-electrician' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'expert-electrician' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'expert-electrician' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'expert-electrician' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'expert-electrician' ); ?> <a href="<?php echo esc_url( EXPERT_ELECTRICIAN_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'expert-electrician' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'Expert Electrician is tailored to cater to the needs of electricians, electric fittings services, AC repair work, electrical company, electronics, technician and engineering, and electricity businesses. Any electric fitter or handyman can also use this theme’s layout for laying out a website that shows his/her work and portfolio. The design is minimal giving just the desired amount of content space and elements that convey the info about your services in a clean and elegant way. A sophisticated look is going to steal the limelight for you since the images and content published on such a layout will look more attractive. Making your images pop is what retina-ready design does and this is really good for putting up stunning images of your products. The personalization options will let you have some control over the design and there is no need to write the codes. To deliver faster page load time for your webpage, it contains highly optimized codes that also make the entire website work in a professional manner. It does not miss any interactive part and makes use of the Call To Action Button (CTA). It is SEO friendly as well as mobile-friendly and has a translation-ready design which is ideal for obtaining modern websites.', 'expert-electrician')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Expert Electrician Theme', 'expert-electrician' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'expert-electrician'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( EXPERT_ELECTRICIAN_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'expert-electrician'); ?></a>
			<a href="<?php echo esc_url( EXPERT_ELECTRICIAN_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'expert-electrician'); ?></a>
			<a href="<?php echo esc_url( EXPERT_ELECTRICIAN_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'expert-electrician'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/expert-electrician.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'expert-electrician'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'expert-electrician'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'expert-electrician'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'expert-electrician'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'expert-electrician'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'expert-electrician'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'expert-electrician'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'expert-electrician'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'expert-electrician'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'expert-electrician'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'expert-electrician'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'expert-electrician'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'expert-electrician'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>