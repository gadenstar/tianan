<?php
/**
 * @package nii_framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('uk-width-1-1'); ?>>
		<div class="nimabi">

		<?php 
		vp_metabox("team_set.team_member_name"); ?>
		<?php vp_metabox("name.binding_group.vp_meta_sample_2"); ?>
		<?php echo vp_metabox("vp_meta_sample_2.binding_group.0.name"); ?>
	</div>
	<!-- .entry-meta -->
	<?php  if (get_post_type() == 'team_member'){
		echo 'nimabibu a ';
	}else {
		echo get_post_type();
	} ?>
	<header class="entry-header dfgdfg">
		
		<?php the_title( '<h1 class="uk-h2">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php nii_framework_posted_on(); ?>
		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'nii_framework' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php nii_framework_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
