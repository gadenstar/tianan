<header id="masthead" class="header" role="banner" >
		<div class="brand-nav">
			<div class="uk-container uk-container-center">
				<nav class="uk-navbar">
					<a href="#my-id" class="uk-navbar-toggle   uk-hidden-large "  data-uk-offcanvas></a>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="uk-navbar-brand ">
						<?php  ?>
						<?php 
							if (vp_option('vpt_option.logo')!=''){
								echo '<img src="'.vp_option('vpt_option.logo').'" alt="">';
							}else {
								bloginfo( 'name' );
							}
						?>

					</a>
					
					<div class="uk-navbar-flip">
			       		<div class="tel uk-visible-large">
			       				<p><i class="uk-icon-phone"></i>咨询电话</p>
			       				<p class="tel"><?php echo vp_option('vpt_option.se_phone');?></p>
			       		</div>
		   	
			    	</div>
				</nav>
			</div>
		</div>
		<div class="nav2" data-uk-sticky="{top:-200,animation: 'uk-animation-slide-top'}">
			<div class="uk-container uk-container-center">
				<nav class="uk-navbar">

				    <ul class="uk-navbar-nav uk-visible-large">
					            <?php wp_nav_menu( 
					            array( 
					            'items_wrap' => '%3$s',
					            'theme_location' => 'primary', 
					            'container'=>false,
					            'menu_class' => 'uk-navbar-nav',
					            'walker'			=>	new JWalker_Nav_Menu,

					             ) 
					             ); ?>
				        	</ul>
		
				</nav>
			</div>
		</div>
</header><!-- #masthead -->