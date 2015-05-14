<?php
/**
 * @package nii_framework
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('uk-width-1-2'); ?>>
		<div class="centent">
			<header>
			 	<?php
					$category = get_the_category();
					if($category[0]){
					echo '<a href="'.get_category_link($category[0]->term_id ).'" class="cat">'.$category[0]->cat_name.'</a>';
					}
				?> 
				<div class="date">
						  			<div>
						  				<span><?php echo get_the_date('Y/m/d' ); ?></span>
						  			</div>
				</div>
				<h2 class="uk-h3 uk-text-bold entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo wp_trim_words( get_the_title(), 20 ); ?></a></h2>
			</header>
			<p class="note">
					<?php
						/* translators: %s: Name of current post */
						/*the_content( sprintf(
							__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nii_framework' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );*/
						$content = get_the_content();
						 $trimmed_content = wp_trim_words( $content, 220, '...' );
						echo $trimmed_content;
					
					?>
			</p>
			<div class="uk-text-center more">
				<a href="<?php the_permalink(); ?>"><i class="uk-icon-arrow-circle-o-right"></i></a>
			</div>
		</div>
</div><!-- #post-## -->