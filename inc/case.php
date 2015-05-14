<?php
add_action('init', 'nii_case');   
function nii_case()    
{   
  $labels = array(   
    'name' => '案例',   
    'singular_name' => '案例',   
    'add_new' => '添加案例',   
    'add_new_item' => '添加案例',   
    'edit_item' => '编辑案例',   
    'new_item' => 'new_item',   
    'view_item' => '查看案例',   
    'search_items' => 'search_items',   
    'not_found' =>  'not_found',   
    'not_found_in_trash' => 'not_found_in_trash',    
    'parent_item_colon' => '',   
    'menu_name' => '案例展示'   
  
  );   
  $args = array(   
    'labels' => $labels,   
    'description'=> '嘿，这是一个自定义的文章类型',   
    'public' => true,
    'publicly_queryable' => true,   
    'show_ui' => true,    
    'show_in_menu' => true,    
    'query_var' => true,   
    'rewrite' => array( 'slug' => 'case' ),    
    'capability_type' => 'post',   
    'has_archive' => true,    
    'hierarchical' => false,   
    'menu_position' => null,   
    //'taxonomies'=> array('category','post_tag'),   
    'supports' => array('title')   
  );    
  register_post_type('case',$args);   
     
  $labels = array(   
        'name' => '案例风格',    
        'singular_name' => 'case_style',   
        'search_items' =>  '搜索' ,   
        'popular_items' => '热门' ,   
        'all_items' => '所有' ,   
        'parent_item' => null,   
        'parent_item_colon' => null,   
        'edit_item' => '编辑' ,    
        'update_item' => '更新' ,   
        'add_new_item' => '添加' ,   
        'new_item_name' => '国籍名称',   
        'separate_items_with_commas' => '按逗号分开' ,   
        'add_or_remove_items' => '添加或删除',   
        'choose_from_most_used' => '从经常使用的类型中选择',   
        'menu_name' => '风格设置',   
    );    
  
    register_taxonomy(   
        'case_style',   
        array('case'),   
        array(   
            'hierarchical' => true,   
            'labels' => $labels,   
            'show_ui' => true,   
            'query_var' => true,   
            'rewrite' => array( 'slug' => 'case_style' ),   
        )   
    );   
}   



// 	add_action( 'init', 'team_member' );
// 	function team_member() {
// 	    register_post_type( 'team_member',
// 	        array(
// 	            'labels' => array(
// 	               'name' => '团队成员',
// 	                'singular_name' => '团队成员',
// 	                'add_new' => '添加成员',
// 	                'add_new_item' => '添加新成员',
// 	                'edit' => 'Edit',
// 	                'edit_item' => 'Edit Movie Review',
// 	                'new_item' => 'New Movie Review',
// 	                'view' => 'View',
// 	                'view_item' => 'View Movie Review',
// 	                'search_items' => 'Search Movie Reviews',
// 	                'not_found' => 'No Movie Reviews found',
// 	                'not_found_in_trash' => 'No Movie Reviews found in Trash',
// 	                'parent' => 'Parent Movie Review'
// 	            ),
	 
// 	            'public' => true,
// 	            'menu_position' => 15,
// 	            'supports' => array( 'title' ),
// 	            'taxonomies' => array( '' ),
// 	            //'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
// 	            'has_archive' => true
// 	        )
// 	    );
// 	} 
// 	//自定义分类法
// add_action( 'init', 'team_dept' );
// function team_dept() {
//  $labels = array(
//     'name' => _x( '部门', 'taxonomy general name' ),
//     'singular_name' => _x( 'team_dept', 'taxonomy singular name' ),
//     'search_items' =>  __( '搜索部门' ),
//     'all_items' => __( '所有部门' ),
//     'parent_item' => __( 'Parent color' ),
//     'parent_item_colon' => __( 'Parent color:' ),
//     'edit_item' => __( 'Edit color' ),
//     'update_item' => __( 'Update color' ),
//     'add_new_item' => __( '添加新部门' ),
//     'new_item_name' => __( 'New color Name' ),
//   );
 
//   register_taxonomy('team_dept','team_member',array(
//     'hierarchical' => true,
//     'labels' => $labels
//   ));
// }
// add_action( 'init', 'team_job' );
// function team_job() {
//  $labels = array(
//     'name' => _x( '职位', 'taxonomy general name' ),
//     'singular_name' => _x( 'team_job', 'taxonomy singular name' ),
//     'search_items' =>  __( '搜索职位' ),
//     'all_items' => __( '所有职位' ),
//     'parent_item' => __( 'Parent color' ),
//     'parent_item_colon' => __( 'Parent color:' ),
//     'edit_item' => __( 'Edit color' ),
//     'update_item' => __( 'Update color' ),
//     'add_new_item' => __( '添加新职位' ),
//     'new_item_name' => __( 'New color Name' ),
//   );
 
//   register_taxonomy('team_job','team_member',array(
//     'hierarchical' => true,
//     'labels' => $labels
//   ));
// }


