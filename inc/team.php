<?php
add_action('init', 'my_custom_init');   
function my_custom_init()    
{   
  $labels = array(   
    'name' => '团队成员',   
    'singular_name' => '团队成员',   
    'add_new' => '添加成员',   
    'add_new_item' => '添加新成员',   
    'edit_item' => '编辑成员',   
    'new_item' => 'new_item',   
    'view_item' => '查看成员',   
    'search_items' => 'search_items',   
    'not_found' =>  'not_found',   
    'not_found_in_trash' => 'not_found_in_trash',    
    'parent_item_colon' => '',   
    'menu_name' => '团队成员'   
  
  );   
  $args = array(   
    'labels' => $labels,   
    'description'=> '嘿，这是一个自定义的文章类型',   
    'public' => true,
    'publicly_queryable' => true,   
    'show_ui' => true,    
    'show_in_menu' => true,    
    'query_var' => true,   
    'rewrite' => array( 'slug' => 'teams' ),    
    'capability_type' => 'post',   
    'has_archive' => true,    
    'hierarchical' => false,   
    'menu_position' => null,   
    'taxonomies'=> array('teams_job','teams_dept'),   
    'supports' => array('title')   
  );    
  register_post_type('teams',$args);   
     
  $labels = array(   
        'name' => '部门',    
        'singular_name' => 'teams_dept',   
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
        'menu_name' => '部门设置',   
    );    
  
    register_taxonomy(   
        'teams_dept',   
        array('teams'),   
        array(   
            'hierarchical' => true,   
            'labels' => $labels,   
            'show_ui' => true,   
            'query_var' => true,   
            'rewrite' => array( 'slug' => 'teams_dept' ),   
        )   
    );   
    $labels = array(   
        'name' => '职位',    
        'singular_name' => 'teams_job',   
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
        'menu_name' => '职位设置',   
    );    
  
    register_taxonomy(   
        'teams_job',   
        array('teams'),   
        array(   
            'hierarchical' => true,   
            'labels' => $labels,   
            'show_ui' => true,   
            'query_var' => true,   
            'rewrite' => array( 'slug' => 'teams_job' ),   
        )   
    ); 
}   

add_filter('manage_teams_posts_columns', 'add_new_teams_columns');   
  
function add_new_teams_columns($teams_columns) {   
       
    $new_columns['cb'] = '<input type="checkbox" />';//这个是前面那个选框，不要丢了   
  
    $new_columns['id'] = __('ID');   
    $new_columns['title'] = '姓名';     
    $new_columns['author'] = __('Author');   
    $new_columns['img'] = __('图像');   
    $new_columns['teams_dept'] = __('所属部门');   
    $new_columns['teams_job'] = __('所处职位');   
    
    $new_columns['date'] = _x('Date', 'column name');   
  
    //直接返回一个新的数组   
    return $new_columns;   
}  

add_action('manage_teams_posts_custom_column', 'manage_teams_columns', 10, 2);   
    
function manage_teams_columns($column_name, $id) {   
    global $wpdb;   
    switch ($column_name) {   
    case 'id':   
        echo $id;   
        break;   
    case 'teams_dept':
    echo get_the_term_list($post->ID,'teams_dept','',', ','');
    break;  
    case 'teams_job':
    echo get_the_term_list($post->ID,'teams_job','',', ','');
    break; 
    case 'img':
    echo '<img src="'.vp_metabox("teams_set.teams_img").'"width="50%">';
    break; 



    default:   
        break;   
    }   
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

function show_category(){
    global $wpdb;
    $request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
    $request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
    $request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'team_dept' ";
    $request .= " ORDER BY term_id asc";
    $categorys = $wpdb->get_results($request);
    foreach ($categorys as $category) { //调用菜单
        $output = '<span>'.$category->name."(<em>".$category->term_id.'</em>)</span>';
        echo $output;
    }
}

// get taxonomies terms links
function custom_taxonomies_terms_links(){
  // get post by post id
  $post = get_post( $post->ID );

  // get post type by post
  $post_type = $post->post_type;

  // get post type taxonomies
  $taxonomies = get_object_taxonomies( $post_type, 'teams_dept' );

  $out = array();
  foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

    // get the terms related to post
    $terms = get_the_terms( $post->ID, $taxonomy_slug );

    if ( !empty( $terms ) ) {
    	if(is_single()){
    		$out[] = "<div class=". $taxonomy_slug ."><span>" . $taxonomy->label . "</span>";
    	}else {
    		$out[] = "<span class=". $taxonomy_slug .">";
    	}
      
      foreach ( $terms as $term ) {
        $out[] =
        $term->name;
      }
      if(is_single()){
    		$out[] = "</div>\n";
    	}else {
    		$out[] = "</span>\n";
    	}
      
    }
  }

  return implode('', $out );
}

