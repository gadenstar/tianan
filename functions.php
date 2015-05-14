<?php
/**
 * nii_framework functions and definitions
 *
 * @package nii_framework
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'nii_framework_setup' ) ) :
	function nii_framework_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on nii_framework, use a find and replace
	 * to change 'nii_framework' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nii_framework', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/**
	 * Include Vafpress Framework
	 */

	/**
	 * Load options, metaboxes, and shortcode generator array templates.
	 */
	// options
	//require_once ( get_template_directory() . '/inc/functions/admin.php');
	// function my_option( $name )
	// {
	//     return vp_option( "my_option." . $name );
	// }
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */


	require get_template_directory() . '/options/bootstrap.php';
	require get_template_directory() . '/admin/data_sources.php';
	define('NII_ADMIN', get_template_directory() . '/admin');
	define('NII_ADMIN_URI', get_template_directory_uri() . '/admin');

	$tmpl_opt  = get_template_directory() . '/admin/option/option.php';

	// metaboxes
	$tmpl_mb1  = get_template_directory() . '/admin/metabox/sample_1.php';
	$tmpl_mb2  = get_template_directory() . '/admin/metabox/sample_2.php';
	$tmpl_mb3  = get_template_directory() . '/admin/metabox/sample_3.php';
	$tmpl_mb4  = get_template_directory() . '/admin/metabox/sample_4.php';
	$tmpl_mb5  = get_template_directory() . '/admin/metabox/sample_5.php';
	$tmpl_mb6  = get_template_directory() . '/admin/metabox/sample_6.php';
	$tmpl_mb6  = get_template_directory() . '/admin/metabox/sample_6.php';
	$tmpl_mb7  = get_template_directory() . '/admin/metabox/sample_7.php';
	$tmpl_mb8  = get_template_directory() . '/admin/metabox/sample_8.php';
	$tmpl_teams  = get_template_directory() . '/admin/metabox/teams.php';
	$tmpl_page  = get_template_directory() . '/admin/metabox/page.php';
	$tmpl_case  = get_template_directory() . '/admin/metabox/case.php';
	$tmpl_slider  = get_template_directory() . '/admin/metabox/slider.php';

	$theme_options = new VP_Option(array(
	'is_dev_mode'           => false,                                  // dev mode, default to false
	'option_key'            => 'vpt_option',                           // options key in db, required
	'page_slug'             => 'vpt_option',                           // options page slug, required
	'template'              => $tmpl_opt,                              // template file path or array, required
	'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
	'use_auto_group_naming' => true,                                   // default to true
	'use_util_menu'         => true,                                   // default to true, shows utility menu
	'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
	'layout'                => 'fixed',                                // fluid or fixed, default to fixed
	'page_title'            => __( '主题设置', 'vp_textdomain' ), // page title
	'menu_label'            => __( '主题设置', 'vp_textdomain' ), // menu label
	));

	/**
	 * Create instances of Metaboxes
	 */
	$mb1 = new VP_Metabox($tmpl_mb1);
	$mb2 = new VP_Metabox($tmpl_mb2);
	$mb3 = new VP_Metabox($tmpl_mb3);
	$mb4 = new VP_Metabox($tmpl_mb4);
	$mb5 = new VP_Metabox($tmpl_mb5);
	$mb6 = new VP_Metabox($tmpl_mb6);
	$mb7 = new VP_Metabox($tmpl_mb7);
	$mb8 = new VP_Metabox($tmpl_mb8);
	$teams = new VP_Metabox($tmpl_teams);
	$page = new VP_Metabox($tmpl_page);
	$case = new VP_Metabox($tmpl_case);
	$slider = new VP_Metabox($tmpl_slider);


	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'nii_framework' ),
	) );
	add_theme_support( 'post-thumbnails' );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside', 'image', 'video', 'quote', 'link',
	// ) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'nii_framework_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif; // nii_framework_setup
add_action( 'after_setup_theme', 'nii_framework_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
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
	wp_enqueue_script( 'modal', get_template_directory_uri() . '/uikit/js/core/modal.min.js', array( 'jquery' ),'2.18.0' );
	
	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/uikit/js/components/lightbox.min.js', array( 'jquery' ),'2.18.0' );

	wp_enqueue_script( 'nii_framework-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'nii_framework-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nii_framework_scripts' );


function hickory_custom_css() {
    return get_template_part('inc/customization');
}
add_action( 'wp_head', 'hickory_custom_css' );
/**uikit
 * Enqueue scripts and styles.
 */



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

/** 
 * 导航菜单生成类
 *
 * @author		微笑的鱼
 * @package		SmileFish
 * @since		0.0.1 - 2013.10.30
 */

class JWalker_Nav_Menu extends Walker_Nav_Menu {

	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 */
	function start_lvl( &$output, $depth ) {
		$output .= "\n<ul class=\"dropdown-menu\">\n";
	}

	/**
	 * @see Walker_Nav_Menu::start_el()
	 */
	function start_el( &$output, $item, $depth, $args ) {
		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$li_attributes = $class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		//$classes[] = 'menu-item-' . $item->ID;

		if ( $args->has_children ) {
			$classes[] = ( 1 > $depth) ? 'dropdown': 'dropdown-submenu';
			$li_attributes .= ' data-dropdown="dropdown"';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

		//替换当前菜单样式
		$class_names = str_replace("current-menu-item", "active", $class_names);		
		$class_names = str_replace("current-menu-ancestor", "active", $class_names);
		//删除一些不需要的样式
		$class_names = str_replace("menu-item-type-custom ", "", $class_names);
		$class_names = str_replace("menu-item-object-custom ", "", $class_names);
		$class_names = str_replace("menu-item-has-children ", "", $class_names);
		$class_names = str_replace("current-menu-parent ", "", $class_names);
		$class_names = str_replace("menu-item-has-children ", "", $class_names);
		$class_names = str_replace("menu-item-type-taxonomy ", "", $class_names);
		$class_names = str_replace("menu-item-object-category ", "", $class_names);//带空格的
		$class_names = str_replace("menu-item-object-category", "", $class_names);//不带空格的
        $class_names = str_replace("menu-item ", "", $class_names);

		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		//取消ID生成
		//$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		//$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

		$attributes	=	$item->attr_title	? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes	.=	$item->target		? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes	.=	$item->xfn			? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes	.=	$item->url			? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes	.=	$args->has_children	? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

		$item_output	=	$args->before . '<a' . $attributes . '>';
		$item_output	.=	$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output	.=	( $args->has_children AND 1 > $depth ) ? ' <i class="uk-icon-angle-down"></i>' : '';
		$item_output	.=	'</a>' . $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * @see Walker::display_element()
	 */
	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {

		if ( ! $element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = (bool) ( ! empty( $children_elements[$element->$id_field] ) AND $depth != $max_depth - 1 );
		elseif ( is_object(  $args[0] ) )
			$args[0]->has_children = (bool) ( ! empty( $children_elements[$element->$id_field] ) AND $depth != $max_depth - 1 );

		$cb_args = array_merge( array( &$output, $element, $depth ), $args );
		call_user_func_array( array( &$this, 'start_el' ), $cb_args );

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ( $max_depth == 0 OR $max_depth > $depth+1 ) AND isset( $children_elements[$id] ) ) {

			foreach ( $children_elements[ $id ] as $child ) {

				if ( ! isset( $newlevel ) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array( &$output, $depth ), $args );
					call_user_func_array( array( &$this, 'start_lvl' ), $cb_args );
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset( $newlevel ) AND $newlevel ) {
			//end the child delimiter
			$cb_args = array_merge( array( &$output, $depth ), $args );
			call_user_func_array( array( &$this, 'end_lvl' ), $cb_args );
		}

		//end this element
		$cb_args = array_merge( array( &$output, $element, $depth ), $args );
		call_user_func_array( array( &$this, 'end_el' ), $cb_args );
	}
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/team.php';
require get_template_directory() . '/inc/case.php';
require get_template_directory() . '/inc/slider.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
