<?php
VP_Security::instance()->whitelist_function('vp_copy_content');
function vp_copy_content($value, $value2)
{
	$args = func_get_args();
	return implode('', $args);
}
VP_Security::instance()->whitelist_function('vp_simple_shortcode');
function vp_simple_shortcode($name = "", $url = "", $image = "")
{
	if(is_null($name))  $name = '';
	if(is_null($url))   $url = '';
	if(is_null($image)) $image = '';
	$result = '[shortcode name="'. $name . '" url="' . $url . '" image="' . $image . '"]';
	return $result;
}
VP_Security::instance()->whitelist_function('vp_bind_bigcontinents');
function vp_bind_bigcontinents()
{
	$bigcontinents = array(
		'Eurafrasia',
		'America',
		'Oceania',
	);
	$result = array();
	foreach ($bigcontinents as $data)
	{
		$result[] = array('value' => $data, 'label' => $data, 'img' => 'http://placehold.it/100x100');
	}
	return $result;
}
VP_Security::instance()->whitelist_function('nii_get_team_dept');
function nii_get_team_dept()
{
	$wp_cat = get_categories(array('taxonomy' => 'teams_dept','hide_empty' => 0 ));

	$result = array();
	foreach ($wp_cat as $cat)
	{
		$result[] = array('value' => $cat->cat_ID, 'label' => $cat->name);
	}
	return $result;
}
VP_Security::instance()->whitelist_function('nii_get_team_job');
function nii_get_team_job()
{
	$wp_cat = get_categories(array('taxonomy' => 'team_job','hide_empty' => 0 ));

	$result = array();
	foreach ($wp_cat as $cat)
	{
		$result[] = array('value' => $cat->cat_ID, 'label' => $cat->name);
	}
	return $result;
}

VP_Security::instance()->whitelist_function('nii_get_team_design');
function nii_get_team_design()
{	
	// //$teams_id = vp_option('vpt_option.se_design');
	// //global $post;
	// $args = array(
	// 	//'post__not_in' => array( $post->ID ),
	// 	//'orderby'=> 'post_date',
	// 	'post_type' => 'post', //自定义分类法→ 文章类别
	// 	'posts_per_page' => -1,
	// 	'showposts' => 6  
	// 	// 'tax_query' => array(
	// 	// 	array(
	// 	// 		'taxonomy' => 'teams_dept',//自定义分类法→ 分类标记
	// 	// 		'terms' => 26 //自定义分类法→ 显示某ID分类
	// 	// 		),
	// 	// 	)
	// 	);
	
	// $my_query = new WP_Query($args);
	$args = array(
    'numberposts'     => 20,
    'offset'          => 0,
    // 'category'        => ,
    'orderby'         => 'post_date',
    'order'           => 'DESC',
    // 'include'         => ,
    // 'exclude'         => ,
    // 'meta_key'        => ,
    // 'meta_value'      => ,
    'post_type'       => 'teams',
    // 'post_mime_type'  => ,
    // 'post_parent'     => ,
    'post_status'     => 'publish' );
	$my_query = get_posts( $args ); 

	$result = array();
	foreach ($my_query as $post)
	{
		$result[] = array('value' => $post->ID, 'label' => $post->post_title);
	}

 	return $result;

}

VP_Security::instance()->whitelist_function('vp_bind_continents');
function vp_bind_continents($param = '')
{
	$continents = array(
		'Eurafrasia' => array(
			'Africa',
			'Asia',
			'Europe'
		),
		'America' => array(
			'North America',
			'Central America and the Antilles',
			'South America'
		),
		'Oceania' => array(
			'Australasia',
			'Melanesia',
			'Micronesia',
			'Polynesia',
		),
	);
	$result = array();
	$datas  = array();
	if(is_array($param))
		$param = reset($param);
	if(array_key_exists($param, $continents))
		$datas = $continents[$param];
	foreach ($datas as $data)
	{
		$result[] = array('value' => $data, 'label' => $data, 'img' => 'http://placehold.it/100x100');
	}
	return $result;
}
VP_Security::instance()->whitelist_function('vp_bind_countries');
function vp_bind_countries($param = '')
{
	$countries = array(
		'Africa' => array(
			'Algeria',
			'Nigeria',
			'Egypt',
		),
		'Asia' => array(
			'Indonesia',
			'Malaysia',
			'China',
			'Japan',
		),
		'Europe' => array(
			'France',
			'Germany',
			'Italy',
			'Netherlands',
		),
		'North America' => array(
			'United States',
			'Mexico',
			'Canada',
		),
		'Central America and the Antilles' => array(
			'Cuba',
			'Guatemala',
			'Haiti',
		),
		'South America' => array(
			'Argentina',
			'Brazil',
			'Paraguay',
		),
		'Australasia' => array(
			'Australia',
			'New Zealand',
			'Christmas Island',
		),
		'Melanesia' => array(
			'Fiji',
			'Papua New Guinea',
			'Vanuatu',
		),
		'Micronesia' => array(
			'Guam',
			'Nauru',
			'Palau'
		),
		'Polynesia' => array(
			'American Samoa',
			'Samoa',
			'Tokelau',
		),
	);
	$result = array();
	$datas  = array();
	if(is_null($param))
		$param = '';
	if(is_array($param) and !empty($param))
		$param = reset($param);
	if(empty($param))
		$param = '';
	if(array_key_exists($param, $countries))
		$datas = $countries[$param];
	foreach ($datas as $data)
	{
		$result[] = array('value' => $data, 'label' => $data, 'img' => 'http://placehold.it/100x100');
	}
	return $result;
}
VP_Security::instance()->whitelist_function('page_color');
function page_color($value)
{
	if($value === 'color')
		return true;
	return false;
}
VP_Security::instance()->whitelist_function('page_img');
function page_img($value)
{
	if($value === 'img')
		return true;
	return false;
}
VP_Security::instance()->whitelist_function('vp_bind_color_accent');
function vp_bind_color_accent($preset)
{
	switch ($preset) {
		case 'red':
			return '#ff0000';
		case 'green':
			return '#00ff00';
		case 'blue':
			return '#0000ff';
		default:
			return '#000000';
	}
}
VP_Security::instance()->whitelist_function('vp_bind_color_subtle');
function vp_bind_color_subtle($preset)
{
	return vp_bind_color_accent($preset);
}
VP_Security::instance()->whitelist_function('vp_bind_color_background');
function vp_bind_color_background($preset)
{
	return vp_bind_color_accent($preset);
}
VP_Security::instance()->whitelist_function('vp_font_preview');
function vp_font_preview($face, $style, $weight, $size, $line_height)
{
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="padding: 0 10px 0 10px; font-family: $face; font-style: $style; font-weight: $weight; font-size: {$size}px; line-height: {$line_height}em;">
	Grumpy wizards make toxic brew for the evil Queen and Jack
</p>
EOD;
	return $dom;
}