<?php
/**
 * @package nii_framework
 */
$client_name = vp_metabox("case_set.client_name");
$teams_img = vp_metabox("case_set.teams_dept");
$teams_content = vp_metabox("case_set.teams_content");
$case_area = vp_metabox("case_set.client_area");
$depts = get_the_terms( $post->ID, 'teams_dept' );
$styles = get_the_terms( $post->ID, 'case_style' );


$style = array();
	foreach ( $styles as $s ) {
		$style[] = $s->name;
	}						
$case_style = join( ", ", $style );

$cat_id = vp_option('vpt_option.se_teams');
				$args = array(
					'post__in' => array( 103 ),
					'orderby'=> 'post_date',
					'post_type' => 'teams', //自定义分类法→ 文章类别
					'posts_per_page' => -1,
					'showposts' => 16,        //输出6篇文章
					// 'tax_query' => array(
					// 	array(
					// 		'taxonomy' => 'teams_dept',//自定义分类法→ 分类标记
					// 		//'terms' => $cat_id //自定义分类法→ 显示某ID分类
					// 		),
					// 	)
			);
	$my_query = new WP_Query($args);
	
	 wp_reset_query();
?>
<?php
/**
 * The template for displaying all single posts.
 *
 * @package nii_framework
 */

get_header(); ?>
<div class="page-header pd20" >
	<div class=" uk-container uk-container-center">
		<h2 class="uk-h1 mg0"><?php the_title( ); ?></h2>
	</div>
</div>

<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>

<div class=" uk-container uk-container-center">

	<div id="primary" class="content-area ">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="uk-grid">
					<div class="uk-width-medium-1-4">
						<div class="case-info">
							<ul>
								<li><span>客户</span><?php echo $client_name; ?></li>
								<li><span>设计风格</span><?php echo $case_style; ?></li>
								<?php 
									if ($case_area!=''){
									echo '<li><span>装修面积</span>'.$case_area.'m²</li>';
								}
								?>
								<li><span>项目介绍</span><?php echo $teams_content; ?></li>
							</ul>
						</div>
					</div>
					<div class="case-content uk-width-medium-3-4">
						<div class="uk-slidenav-position" data-uk-slideshow>
						    <ul class="uk-slideshow">
						        <?php //echo $teams_content;
									$count = count(vp_metabox("case_set.repeating_group"));
												//echo vp_metabox("case_set.repeating_group");
									for ($x=0; $x<$count; $x++) {
									  echo "<li>";
									  echo '<a href="'.vp_metabox("case_set.repeating_group.$x.teams_img").'" data-uk-lightbox="{group:\'group1\'}" title=""><img src="'.vp_metabox("case_set.repeating_group.$x.teams_img").'"></a>';
									  echo "</li>";
									} 
							 	?>
						    </ul>
						    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
	   						<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
	   						<ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
			
						        <?php //echo $teams_content;
									$count = count(vp_metabox("case_set.repeating_group"));
												//echo vp_metabox("case_set.repeating_group");
									for ($x=0; $x<$count; $x++) {
									  echo '<li data-uk-slideshow-item="'.$x.'"><a href=""></a></li>';
									} 
								?>
						    </ul>
						</div>
					</div>
					

					
				</div>
				<footer class="entry-footer">
						<?php nii_framework_entry_footer(); ?>
					</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

			<?php nii_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>


