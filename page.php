<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package nii_framework
 */

get_header(); ?>
<div class="page-header pd20" >
	<div class=" uk-container uk-container-center">
		<h2 class="uk-h1 mg0"><?php the_title( ); ?></h2>
		<?php //echo vp_metabox("page_builder"); ?>
		<?php // echo vp_metabox("page_builder.toggle_filtering"); ?>
		<?php // print_r(vp_metabox("page_builder.filtering_group.0")) ; ?>
		<?php //
		// if (vp_metabox("page_builder.filtering_group.0.filter_type")=="color") {
		// 	$bg = vp_metabox("page_builder.filtering_group.0.page_color");
		// }else {
		// 	$bg = vp_metabox("page_builder.filtering_group.0.page_img");
		// }
		// echo $bg;
		?>
	</div>
</div>

<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>

<div class=" uk-container uk-container-center">
	<div class="uk-grid">
		<?php if (vp_metabox("page_builder.page_sidebar_pos")=="1"||vp_metabox("page_builder.page_sidebar_pos")==""):?>
			<div id="primary" class="content-area uk-width-1-1">
				<main id="main" class="site-main " role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
						<?php
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
					<?php endwhile; // end of the loop. ?>
				</main><!-- #main -->
			</div><!-- #primary -->
	 	<?php endif; ?>
		<?php if (vp_metabox("page_builder.page_sidebar_pos")=="2"):  
			get_sidebar(); ?>
			<div id="primary" class="content-area uk-width-3-4">
				<main id="main" class="site-main " role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
						<?php
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
					<?php endwhile; // end of the loop. ?>
				</main><!-- #main -->
			</div><!-- #primary -->
	 	<?php endif; ?>
		<?php if (vp_metabox("page_builder.page_sidebar_pos")=="3"): ?>
			<div id="primary" class="content-area uk-width-3-4">
				<main id="main" class="site-main " role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
						<?php
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
					<?php endwhile; // end of the loop. ?>
				</main><!-- #main -->
			</div><!-- #primary -->
	 	<?php 
	 	get_sidebar();
	 	endif; ?>


	</div>
</div>
<?php get_footer(); ?>
