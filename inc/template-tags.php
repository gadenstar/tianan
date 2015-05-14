<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package nii_framework
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'nii_framework' ); ?></h2>
		<div class="nav-links uk-clearfix">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'nii_framework' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'nii_framework' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'nii_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function nii_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">

		<div class="nav-links uk-clearfix ">
			<?php
				previous_post_link( '<div class="nav-previous"><strong>previous</strong><br />%link</div>', '%title' );
				next_post_link( '<div class="nav-next"><strong>next</strong><br />%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if ( ! function_exists( 'nii_pagenavi' ) ) :

	function par_pagenavi($range = 9){
	global $paged, $wp_query;
	 
	$range = 2; // only edit this if you want to show more page-links   
	$showitems = ($range * 2)+1; 
	if(!$max_page){$max_page = $wp_query->max_num_pages;}
	if(!$paged){$paged = 1;}
	$prev = $paged - 1;   
	$next = $paged + 1; 

	if($max_page > 1){
		
	echo "<div class='pagination'><ul>";   

		if($paged != 1){
			echo ($paged < 3 )?"":"<li><a href='".get_pagenum_link(1)."'>最前</a></li>";
			echo "<li><a href='".get_pagenum_link($prev)."'>上一页</a></li>";
		}
	
	for ($i=1; $i <= $max_page; $i++){   
	if (1 != $max_page &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $max_page <= $showitems )){   
	echo ($paged == $i)? "<li class='current'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";   
	}   
	} 

    if($paged != $max_page){
    	echo "<li><a href='".get_pagenum_link($next)."'>下一页</a></li>";
    	echo ($paged < $max_page-1)?"<li><a href='".get_pagenum_link($max_page)."'>最后</a></li> ":" ";
    }
     echo "</ul></div>";   
}
   
}
endif;



if ( ! function_exists( 'nii_framework_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function nii_framework_posted_on() {
	$categories_list = get_the_category_list( __( ', ', 'nii_framework' ) );
		
	echo '<span class="posted-on"><i class="uk-icon-clock-o"></i>' . get_the_date('Y-m-d') . '</span>';
	if ( $categories_list && nii_framework_categorized_blog() ) {
			printf( '<span class="cat-links"><i class="uk-icon-folder-open"></i>' . __( '%1$s', 'nii_framework' ) . '</span>', $categories_list );
		}
/*	$byline = sprintf(
		_x( 'by %s', 'post author', 'nii_framework' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
*/
	
	echo '<span class="views"><i class="uk-icon-eye"></i>';
	post_views('阅读(', ')');
	echo '</span>';
	echo '<span class="comments-link"><i class="uk-icon-comments-o"></i>';
	comments_popup_link( __( '评论(0)', 'nii_framework' ), __( '评论(1)', 'nii_framework' ), __( '评论(%)', 'nii_framework' ) );

	echo '</span>';

}
endif;

if ( ! function_exists( 'nii_framework_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function nii_framework_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		/*$categories_list = get_the_category_list( __( ', ', 'nii_framework' ) );
		if ( $categories_list && nii_framework_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'nii_framework' ) . '</span>', $categories_list );
		}*/

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ' ', 'nii_framework' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tags: %1$s', 'nii_framework' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'nii_framework' ), __( '1 Comment', 'nii_framework' ), __( '% Comments', 'nii_framework' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'nii_framework' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'nii_framework' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'nii_framework' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'nii_framework' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'nii_framework' ), get_the_date( _x( 'Y', 'yearly archives date format', 'nii_framework' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'nii_framework' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'nii_framework' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'nii_framework' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'nii_framework' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'nii_framework' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'nii_framework' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'nii_framework' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'nii_framework' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'nii_framework' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'nii_framework' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'nii_framework' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'nii_framework' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'nii_framework' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'nii_framework' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'nii_framework' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'nii_framework' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function nii_framework_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'nii_framework_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'nii_framework_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so nii_framework_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so nii_framework_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in nii_framework_categorized_blog.
 */
function nii_framework_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'nii_framework_categories' );
}
add_action( 'edit_category', 'nii_framework_category_transient_flusher' );
add_action( 'save_post',     'nii_framework_category_transient_flusher' );


function my_fields($fields) {
	$fields =  array(
	'author' => '<p class="comment-form-author  form-group required">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
	'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
	'email'  => '<p class="comment-form-email form-group required"><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
	'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
	'url'    => '<p class="comment-form-url form-group"><label for="url">' . __( 'Website' ) . '</label>' .
	'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);
	return $fields;
}
add_filter('comment_form_default_fields','my_fields');

/* 访问计数 */ 
function record_visitors() 
{ 
	if (is_singular()) 
	{ 
	global $post; 
	$post_ID = $post->ID; 
	if($post_ID) 
	{ 
	$post_views = (int)get_post_meta($post_ID, 'views', true); 
	if(!update_post_meta($post_ID, 'views', ($post_views+1))) 
	{ 
	add_post_meta($post_ID, 'views', 1, true); 
	} 
	} 
	} 
	} 
	add_action('wp_head', 'record_visitors'); 
	/// 函数名称：post_views 
	/// 函数作用：取得文章的阅读次数 
	function post_views($before = '(点击 ', $after = ' 次)', $echo = 1) 
	{ 
	global $post; 
	$post_ID = $post->ID; 
	$views = (int)get_post_meta($post_ID, 'views', true); 
	if ($echo) echo $before, number_format($views), $after; 
	else return $views; 
}
/**
 * WordPress 添加面包屑导航 
 * http://www.wpdaxue.com/wordpress-add-a-breadcrumb.html
 */
function cmp_breadcrumbs() {
	$delimiter = '»'; // 分隔符
	$before = '<span class="current">'; // 在当前链接前插入
	$after = '</span>'; // 在当前链接后插入
	if ( !is_home() && !is_front_page() || is_paged() ) {
		echo '<div id="breadcrumbs" class="breadcrumbs"><div class="uk-container-center uk-container"><div class="breadcrumbs_inner">';
		global $post;
		$homeLink = home_url();
		echo ' <a itemprop="breadcrumb" href="' . $homeLink . '"><i class="icon uk-icon-home"></i></a> ' . $delimiter . ' ';
		if ( is_category() ) { // 分类 存档
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0){
				$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
			}
			echo $before . '' . single_cat_title('', false) . '' . $after;
		} elseif ( is_day() ) { // 天 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) { // 月 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) { // 年 存档
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) { // 文章
			if ( get_post_type() != 'post' ) { // 自定义文章类型
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else { // 文章 post
				$cat = get_the_category(); $cat = $cat[0];
				$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
				echo $before . get_the_title() . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) { // 附件
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) { // 页面
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) { // 父级页面
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) { // 搜索结果
			echo $before ;
			printf( __( 'Search Results for: %s', 'cmp' ),  get_search_query() );
			echo  $after;
		} elseif ( is_tag() ) { //标签 存档
			echo $before ;
			printf( __( 'Tag Archives: %s', 'cmp' ), single_tag_title( '', false ) );
			echo  $after;
		} elseif ( is_author() ) { // 作者存档
			global $author;
			$userdata = get_userdata($author);
			echo $before ;
			printf( __( 'Author Archives: %s', 'cmp' ),  $userdata->display_name );
			echo  $after;
		} elseif ( is_404() ) { // 404 页面
			echo $before;
			_e( 'Not Found', 'cmp' );
			echo  $after;
		}
		if ( get_query_var('paged') ) { // 分页
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
				echo sprintf( __( '( Page %s )', 'cmp' ), get_query_var('paged') );
		}
		echo '</div></div></div>';
	}
}
//官方Gravatar头像调用ssl头像链接
function get_ssl_avatar($avatar) {
 $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
 return $avatar;
}
add_filter('get_avatar', 'get_ssl_avatar');

function nii_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		global $commentcount, $page;
		if ( (int) get_option('page_comments') === 1 && (int) get_option('thread_comments') === 1 ) { //开启嵌套评论和分页才启用
			if(!$commentcount) { //初始化楼层计数器
				$page = ( !empty($in_comment_loop) ) ? get_query_var('cpage') : get_page_of_comment( $comment->comment_ID, $args ); //获取当前评论列表页码
				$cpp = get_option('comments_per_page'); //获取每页评论显示数量
				 if ( !$post_id ) $post_id = get_the_ID();
				 if ( get_option('comment_order') === 'desc' ) { //倒序
					$cnt = get_comments( array('status' => 'approve','parent' => '0','post_id' => $post_id,'count' => true) );
					if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page  == ceil($cnt / $cpp))) $commentcount = $cnt + 1;
					else $commentcount = $cpp * $page + 1;
				} else {
					$commentcount = $cpp * ($page - 1);
				}
			}
			if ( !$parent_id = $comment->comment_parent ) {
				$commentcountText = '';
				if ( get_option('comment_order') === 'desc' ) { //倒序
					$commentcountText .= '#'. --$commentcount ;
				} else {
					$commentcountText .= '#' .++$commentcount ;
				}
			}
		}
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="img-thumbnail">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
		<div class="comment-block">
		<div class="comment-arrow"></div>
		<span class="comment-by">
			<?php printf(__('<strong class="fn">%s</strong>'), get_comment_author_link()) ?>
			<span class="date ">
				<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s'), get_comment_date('Y-m-d'),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
			?>
			
			</span>
		<span class="comt-f pull-right ">
			<?php echo $commentcountText; ?>
		</span>	
			
		</span>
		
		
<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
		</div>
		<br />
<?php endif; ?>
		<?php comment_text() ?>
		<span class="reply">
				<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</span>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
<?php
        }

        function autoset_featured() {
          global $post;
          $already_has_thumb = has_post_thumbnail($post->ID);
              if (!$already_has_thumb)  {
              $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
                          if ($attached_image) {
                                foreach ($attached_image as $attachment_id => $attachment) {
                                set_post_thumbnail($post->ID, $attachment_id);
                                }
                           }
                        }
      }  //end function
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');


