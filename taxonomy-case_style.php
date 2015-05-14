<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package nii_framework
 */

get_header(); 


?>
<div class=" uk-container uk-container-center">
<div class="uk-grid">
	<div id="primary" class="content-area uk-width-medium-1-1">
		<main id="main" class="site-main" role="main">
			<div class="uk-grid">
		<?php if ( have_posts() ) : ?>
			<!-- 动态网格 -->
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $case_img = vp_metabox("case_set.img"); ?>
				<div class="uk-width-1-2" >
				<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
					<div class="box-image">
						<a class="focus" href="<?php the_permalink(); ?>">
							<img src="<?php echo $case_img; ?>" alt="">
						</a>
					</div>
					<div class="centent">
						<header class="uk-clearfix">
							<h3 class="uk-h3"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( ); ?></a></h3>
							<div class="meta uk-float-left">
								<span><?php echo $teams_dept; ?></span>
								<span><?php echo $teams_job; ?></span>
							</div> 

						</header>
					</div>
				</article><!-- #post-## -->
				</div>
			<?php endwhile; ?>
				

			<?php
				//Reset Query 
				par_pagenavi();
				wp_reset_query();
	
				 
				?> 

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->


</div>
</div>
<?php get_footer(); ?>
