<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package nii_framework
 */
?>
		</div>
	</div><!-- #content   -->
	<div class="footer-contact pd20">
		<div class="uk-container uk-container-center">
		<!-- 	<div class="uk-text-center section-title">
						<h2 class="uk-h1">联系我们</h2>
						<?php echo vp_metabox("slider_set.bg_color"); ?>
						<div class="title-border">
							<div class="title-line">
								
							</div>
						</div>
					</div> -->

			<div class="uk-grid">
				<div class="uk-width-3-10 ">
					<div class=" company-info">
					
						<h2>湖南天安家装(集团)有限公司</h2>
						<ul>
							<li><i class="uk-icon-map-marker"></i> 湖南省长沙市岳麓区岳麓大道158号</li>
							<li><i class="uk-icon-phone"></i>400-888-1429</li>
							<li><i class="uk-icon-envelope"></i>tianan@qq.com</li>
							<li><span></span></li>
						</ul>
					
					</div>
				</div>
				<div class="uk-width-3-10 ">
					<div class=" footer-qr">
						
						<img src="<?php echo vp_option('vpt_option.qr');?>" alt="">
					
					</div>
				</div>
				<div class="uk-width-4-10">
					<div class="company-contact">
						<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-sidebar-2') ) ?> 
						<?php echo do_shortcode("[form form-1]"); ?>
					</div>
				</div>
				
			<!-- 	<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 1') ) ?>
			
				<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 2') ) ?> -->
			</div>
		</div>
	</div>
	<footer id="colophon" class="site-footer pd20" role="contentinfo">
		<div class="uk-container uk-container-center">
			<div class="site-info uk-text-center">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'nii_framework' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'nii_framework' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( '%1$s by %2$s.', 'nii_framework' ), '技术支持', '<a href="http://niizer.com/" rel="designer">Niizer</a>' ); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
	<div id="my-id" class="uk-offcanvas">
		<div class="uk-offcanvas-bar">
				<form action="<?php echo home_url( '/' ); ?>" method="get" id="searchform">
					<input type="text" name="s" id="s" class="search-input" value="<?php the_search_query(); ?>" placeholder="输入关键字搜索" />
					<button class="search-btn" type="submit"><i class="icon uk-icon-search"></i></button>
				</form>
			<ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
		
				<?php wp_nav_menu( 
					array( 
						'items_wrap' => '%3$s',
						'theme_location' => 'primary', 
						'container'=>false,
						'menu_class' => 'uk-navbar-nav uk-hidden-small',
						 'walker'			=>	new JWalker_Nav_Menu,
						)); ?>

			</ul>
		</div>
	  
	</div>
	<a href="#top" class="uk-button go2top" data-uk-smooth-scroll><i class="uk-icon-chevron-up"></i></a>
<?php wp_footer(); ?>
<script type="text/javascript">
	
</script>
</body>
</html>
