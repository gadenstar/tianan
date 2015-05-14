<?php

function nii_framework_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'nii_framework' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="uk-panel uk-panel-header widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-header"><h1 class="uk-panel-title widget-title">',
		'after_title'   => '</h1></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer-Sidebar-1', 'nii_framework' ),
		'id'            => 'footer-sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="uk-panel uk-panel-header widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-header"><h1 class="uk-panel-title widget-title">',
		'after_title'   => '</h1></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer-Sidebar-2', 'nii_framework' ),
		'id'            => 'footer-sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="uk-panel uk-panel-header widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-header"><h1 class="uk-panel-title widget-title">',
		'after_title'   => '</h1></div>',
	) );
}
add_action( 'widgets_init', 'nii_framework_widgets_init' );
