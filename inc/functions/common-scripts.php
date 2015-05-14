<?php

function nii_framework_scripts() {
	wp_enqueue_style( 'uikit', get_template_directory_uri() . '/uikit/css/uikit.min.css', array(),'2.18.0' );
	wp_enqueue_style( 'uikit-slider', get_template_directory_uri() . '/uikit/css/components/slideshow.min.css', array(),'2.18.0' );
	wp_enqueue_style( 'slidenav', get_template_directory_uri() . '/uikit/css/components/slidenav.min.css', array(),'2.18.0' );
	wp_enqueue_style( 'dotnav', get_template_directory_uri() . '/uikit/css/components/dotnav.min.css', array(),'2.18.0' );
	wp_enqueue_style( 'sticky', get_template_directory_uri() . '/uikit/css/components/sticky.min.css', array(),'2.18.0' );
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/inc/css/owl.carousel.css', array(),'2.18.0' );
	wp_enqueue_style( 'theme', get_template_directory_uri() . '/inc/css/owl.theme.css', array(),'2.18.0' );

	wp_enqueue_style( 'nii_framework-style', get_stylesheet_uri() );

	wp_enqueue_script( 'uikit-js', get_template_directory_uri() . '/uikit/js/uikit.min.js', array( 'jquery' ),'2.18.0' );
	wp_enqueue_script( 'uikit-core', get_template_directory_uri() . '/uikit/js/core/core.min.js', array( 'jquery' ),'2.18.0' );

	wp_enqueue_script( 'uikit-slider', get_template_directory_uri() . '/uikit/js/components/slideshow.min.js', array( 'jquery' ),'2.18.0' );
	wp_enqueue_script( 'uikit-slider-fx', get_template_directory_uri() . '/uikit/js/components/slideshow-fx.min.js', array( 'jquery' ),'2.18.0' );
	
	wp_enqueue_script( 'uikit-grid', get_template_directory_uri() . '/uikit/js/components/grid.min.js', array( 'jquery' ),'2.18.0' );
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/uikit/js/components/sticky.min.js', array(), '20120206',true);
	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20120206',true);
	wp_enqueue_script( 'uikit-scrollspy', get_template_directory_uri() . '/uikit/js/core/scrollspy.min.js', array( 'jquery' ),'2.18.0' );
	wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/uikit/js/core/smooth-scroll.min.js', array( 'jquery' ),'2.18.0' );

	wp_enqueue_script( 'nii_framework-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'nii_framework-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nii_framework_scripts' );

?>
<style type="text/css" media="screen"> 

</style>
<?php 