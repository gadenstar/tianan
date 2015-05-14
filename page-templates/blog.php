<?php
/**
 * Template Name: Blog Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div class=" uk-container uk-container-center">
<div class="uk-grid">
	<div id="primary" class="content-area blog uk-width-medium-7-10 uk-float-left">
		<main id="main" class="site-main " role="main">
			<?php
		$limit=get_option('posts_per_page');
		$paged=(get_query_var('paged'))?get_query_var('paged'):1;
		query_posts('showposts=' .$limit .'&paged=' .$paged);
		$wp_query->is_archive=true;
		$wp_query->is_home=false;
		        //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		        while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		        <?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>
		        <?php endwhile; ?>
						 <?php
						//Reset Query 
						par_pagenavi(9);
						wp_reset_query();
			
						 
						?> 
		</main><!-- #content -->
	</div><!-- #primary -->


<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer();
