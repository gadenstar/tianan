	<div class="topbar" >
		<div class="uk-container uk-container-center uk-clearfix">
			<h5 class="uk-h5 uk-float-left">湖南天安家装（集团）有限公司<span>服务热线:<?php echo vp_option('vpt_option.se_phone');?></span></h5>
			<ul class="uk-float-right">
				<li class =""><a href="">设为首页</a></li>
				<li><a href="">收藏本站</a></li>
			</ul>
		</div>
	</div>
	<header id="masthead" class="header" role="banner" data-uk-sticky="{top:-200,animation: 'uk-animation-slide-top'}">
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
			        	
			    	</div>
				</nav>
			</div>
		</div>
	</header><!-- #masthead -->