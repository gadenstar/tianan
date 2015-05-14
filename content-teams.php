<?php
/**
 * @package nii_framework
 */
$teams_name = vp_metabox("teams_set.teams_name");
$teams_img = vp_metabox("teams_set.teams_img");
$teams_style = vp_metabox("teams_set.teams_style");
$teams_time = vp_metabox("teams_set.teams_time");
$teams_content = vp_metabox("teams_set.teams_content");
$depts = get_the_terms( $post->ID, 'teams_dept' );
$jobs = get_the_terms( $post->ID, 'teams_job' );

$depta = array();
	foreach ( $depts as $dept ) {
		$depta[] = $dept->name;
	}						
$teams_dept = join( ", ", $depta );

$joba = array();
	foreach ( $jobs as $job ) {
		$joba[] = $job->name;
	}						
$teams_job = join( ", ", $joba );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="uk-grid team-box ">
		<div class="uk-width-3-10 team-img">
			<img src="<?php echo $teams_img; ?>" alt="">
		</div>
		<div class="uk-width-7-10 team-info">
			<div class="name">
				<h3 class="uk-h3">
					<span><?php echo $teams_job; ?></span><?php echo $teams_name; ?>
				</h3>
			</div>
			<div class="dept">
				<span>从业时间</span>
					<?php echo $teams_time; ?>年
			</div>
			<div class="style">
				<span>擅长风格</span>
					<?php echo $teams_style; ?>
			</div>	
			<div class="design">
				<span>设计理念</span>
				<p><?php echo $teams_content; ?>	</p>
			</div>
			
		</div>
	</div>
	<div class="team-content">
		<div class="title">
			<span class="uk-h3">设计案例</span>
		</div>
		<?php echo get_the_content(); ?>
		<?php echo do_shortcode( '[AuthorRecommendedPosts]' ); ?>
	</div>
	<!-- .entry-meta -->

	<footer class="entry-footer">
		<?php nii_framework_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
