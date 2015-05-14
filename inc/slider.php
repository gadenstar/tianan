<?php
add_action('init', 'nii_slider');   
function nii_slider()    
{   
  $labels = array(   
    'name' => '幻灯片',   
    'singular_name' => 'slider',   
    'add_new' => '添加幻灯片',   
    'add_new_item' => '添加幻灯片',   
    'edit_item' => '编辑幻灯片',   
    'new_item' => 'new_item',   
    'view_item' => '查看幻灯片',   
    'search_items' => 'search_items',   
    'not_found' =>  'not_found',   
    'not_found_in_trash' => 'not_found_in_trash',    
    'parent_item_colon' => '',   
    'menu_name' => '幻灯片'   
  
  );   
  $args = array(   
    'labels' => $labels,   
    'description'=> '嘿，这是一个自定义的文章类型',   
    'public' => true,
    'publicly_queryable' => true,   
    'show_ui' => true,    
    'show_in_menu' => true,    
    'query_var' => true,   
    'rewrite' => array( 'slug' => '幻灯片' ),    
    'capability_type' => 'post',   
    'has_archive' => true,    
    'hierarchical' => false,   
    'menu_position' => null,   
    //'taxonomies'=> array('category','post_tag'),   
    'supports' => array('title')   
  );    
  register_post_type('slider',$args);   
     
}   

add_filter('manage_slider_posts_columns', 'add_new_slider_columns');   
  
function add_new_slider_columns($slider_columns) {   
       
    $new_columns['cb'] = '<input type="checkbox" />';//这个是前面那个选框，不要丢了   
  
    $new_columns['id'] = __('ID');   
    $new_columns['title'] = '幻灯片编号';     
    $new_columns['author'] = __('Author');   
    $new_columns['img'] = __('图像');   
  
    
    $new_columns['date'] = _x('Date', 'column name');   
  
    //直接返回一个新的数组   
    return $new_columns;   
}  

add_action('manage_slider_posts_custom_column', 'manage_slider_columns', 10, 2);   
    
function manage_slider_columns($column_name, $id) {   
    global $wpdb;   
    switch ($column_name) {   
    case 'id':   
        echo $id;   
        break;   
    case 'img':
    if (vp_metabox("slider_set.img")==''){
        echo '文字幻灯片';
    }else {
        echo '<img src="'.vp_metabox("slider_set.img").'"width="50%">';
    }
    break; 
    default:   
        break;   
    }   
}  


function cccomm_option_page() {
    ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>CC Comments Options </h2>
        <p>Welcome to CC Comments plugin, here you can edit the email(s) to CC your comments to. </p>
    </div>
    <?php
}
function cccomm_plugin_menu() {
    add_options_page('CC Comments Settings', 'CC Comments', 'manage_options', 'cc-comments-plugin','cccomm_option_page' );
}
add_action( 'admin_menu', 'cccomm_plugin_menu' );