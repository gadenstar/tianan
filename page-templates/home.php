<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div class="home-slider">
	<div data-uk-slideshow="{animation: 'fade'}">
		<div class="uk-slidenav-position " >
		    <ul class="uk-slideshow uk-overlay-active nii-slideshow " data-uk-slideshow="{autoplay:tr1ue}">
		    	<?php
				$cat_id = vp_option('vpt_option.se_teams');
				$args = array(
					'post__not_in' => array( $post->ID ),
					//'post__in' => array( 103 ),
					'orderby'=> 'post_date',
					'post_type' => 'slider', //自定义分类法→ 文章类别
					'posts_per_page' => -1,
					'showposts' => 4
					);
				$my_query = new WP_Query($args);

				if( $my_query->have_posts() ) {
				    while ($my_query->have_posts()) : $my_query->the_post();?>


					

				  	<li id="post-<?php the_ID(); ?>" <?php post_class('uk-overlay'); ?> style="background:<?php if(vp_metabox("slider_set.img")==''){echo vp_metabox("slider_set.bg_color");}  ?>;">
						<img src="<?php echo vp_metabox("slider_set.img");?>" alt="">
						<?php 
							if (vp_metabox("slider_set.toggle") =='1'):
						?>
							<div class="uk-overlay-panel uk-text-center uk-vertical-align ">
							<div class="text uk-vertical-align-middle uk-animation-slide-bottom " data-uk-scrollspy="{delay:6000}">
								<p class="h3 " >fgfdghhfghghgfhjghj</p>
								<p class="h2  " >fgfdghhfghghgfhjghj</p>
								<p>fgfdghhfghghgfhjghj</p>
								<div class="slider_button">
									<?php if(vp_metabox("slider_set.button_1_group.0.button_text")!=''): ?>
										<a href="<?php echo vp_metabox("slider_set.button_1_group.0.button_link"); ?>" target="_blank">
											<?php echo vp_metabox("slider_set.button_1_group.0.button_text"); ?>
										</a>
									<?php endif ?>
									<?php if(vp_metabox("slider_set.button_2_group.0.button_text")!=''): ?>
										<a href="<?php echo vp_metabox("slider_set.button_2_group.0.button_text"); ?>" target="_blank">
											<?php echo vp_metabox("slider_set.button_2_group.0.button_text"); ?>
										</a>
									<?php endif ?>
								</div>
							</div>
							</div>
						<?php endif ?>
					</li>
		
				    <?php endwhile;
				    wp_reset_query();
			   } ?>
		    	</ul>
		    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
		    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
		    <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
		        <li data-uk-slideshow-item="0"><a href=""></a></li>
		        <li data-uk-slideshow-item="1"><a href=""></a></li>
		        <li data-uk-slideshow-item="2"><a href=""></a></li>
		    </ul>
		</div>
	</div>
</div>
<!--<?php echo vp_metabox("page_builder.row.0.column.0.grid"); ?>
<?php echo vp_metabox("page_builder.row.0.column.0.content"); ?>
<?php echo vp_metabox("page_builder.row.1.column.0.content"); ?>
<?php echo vp_metabox("page_builder.use_pb"); ?>-->
<?php //echo vp_metabox("page_builder.content"); ?>
<?php echo vp_metabox("slider_set.img"); ?>
<?php $custom_text = get_post_meta($post->ID, 'slider_set', false);
		foreach($custom_text as $key=>$v)
		{
		echo $key.'=>'.$v;
		}

?>
<div class="advantage pd20">
	<div class="uk-container uk-container-center">
			<div class="uk-text-center section-title">
				<h2 class="uk-h1">我们的优势</h2>
				<?php echo vp_metabox("slider_set.bg_color"); ?>
				<div class="title-border">
					<div class="title-line">
						
					</div>
				</div>
			</div>
			<div class="uk-grid">
				<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-4 " data-uk-scrollspy="{cls:'uk-animation-slide-bottom'}">
					<div class="icon">
						<i class="  uk-icon-compass"></i>
					</div>
					
					<div class="uk-h2 title">

						360°整家解决方案
					</div>
					<p>
						由100多名美家顾问、方案设计师、绘图设计师、配饰设计师、项目管家、工程督导和客服人员组成整家解决方案小组为您提供一流的整家配置服务，将设计、家装、家具、家电、软装以及家居百货一步搞定。
					</p>
				</div>
				<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-4 " data-uk-scrollspy="{cls:'uk-animation-slide-bottom'}">
					<div class="icon">
						<i class="  uk-icon-home"></i>
					</div>
					<div class="uk-h2 title">
						20种主流生活方式
					</div>
					<p>
						风情、国际、书香、现代四大系列共包括20套1:1实景家装样板房，为您提供居家花样选择，在天安家装选择您钟爱的生活方式，把它带回家。
					</p>
				</div>

				<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-4 " data-uk-scrollspy="{cls:'uk-animation-slide-bottom'}">
			
					<div class="icon">
						<i class="  uk-icon-thumbs-up"></i>
					</div>
					<div class="uk-h2 title">
						高品质绿色家居
					</div>
					<p>
						天安施工团队打造湖南首屈一指家装工艺，用料皆为一线环保品牌，全程实施金牌管家5A监管体制，为您构筑高品质环保家。
					</p>
				</div>
				<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-4 " data-uk-scrollspy="{cls:'uk-animation-slide-bottom'}">
					
					<div class="icon">
						<i class="  uk-icon-compass"></i>
					</div>
					<div class="uk-h2 title">
						无需担心价格
					</div>
					<p>
						天安家装整合家具上下游资源，对原材料进行集团化采购，搭建一线品牌联盟，让整体家装费用净省30%以上。施工前杜绝漏项，真正做到让预算=决算，不再增加任何费用。
					
					</p>
				</div>
			</div>
	
	</div>
</div>


<div class="qr pd20">
	<div class="uk-container uk-container-center">

		<div class="uk-grid">
			<div class="uk-width-1-2 " data-uk-scrollspy="{cls:'uk-animation-slide-left'}">
			
				<div class="qr-tip uk-text-right uk-vertical-align ">
					<div class="uk-vertical-align-middle">
						<h2 class="uk-h1">关注微信</h2>
						<p>及时了解公司动态与最新活动</p>
					</div>
				</div>

				
			</div>
			<div class="uk-width-1-2" data-uk-scrollspy="{cls:'uk-animation-slide-right'}">
				<div class="qr-img uk-vertical-align">
					<div class="uk-vertical-align-middle">
						<img src="<?php echo vp_option('vpt_option.qr');?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="teams pd20">
	<div class="uk-container uk-container-center">

			<div class="uk-text-center section-title">
				<h2 class="uk-h1">设计团队</h2>
				<div class="title-border">
					<div class="title-line">
						
					</div>
				</div>
				<p class="uk-h2">一线品牌直供，品质安全可靠</p>
			</div>
			<div id="owl-example" class="owl-carousel">
			<?php
				$cat_id = vp_option('vpt_option.se_teams');
				$args = array(
					'post__not_in' => array( $post->ID ),
					//'post__in' => array( 103 ),
					'orderby'=> 'post_date',
					'post_type' => 'teams', //自定义分类法→ 文章类别
					'posts_per_page' => -1,
					'showposts' => 16,        //输出6篇文章
					'tax_query' => array(
						array(
							'taxonomy' => 'teams_dept',//自定义分类法→ 分类标记
							'terms' => $cat_id //自定义分类法→ 显示某ID分类
							),
						)
					);
				$my_query = new WP_Query($args);
				//print_r($my_query->post->post_title) ;
				if( $my_query->have_posts() ) {
				    while ($my_query->have_posts()) : $my_query->the_post();?>
				    <?php 
						$teams_name = vp_metabox("teams_set.teams_name");
						$teams_img = vp_metabox("teams_set.teams_img");
						$jobs = get_the_terms( $post->ID, 'teams_job' );
						$joba = array();
							foreach ( $jobs as $job ) {
								$joba[] = $job->name;
							}						
						$teams_job = join( ", ", $joba );
					?>

				
				  <div> 
				  	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
					<div class="box-image">
						<a class="focus" href="<?php the_permalink(); ?>">
							<img src="<?php echo $teams_img; ?>" alt="">
						</a>
					</div>
					<div class="centent">
						<h3 class="uk-h3">
							<span><?php echo $teams_job; ?></span>
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo $teams_name; ?></a>
						</h3>
					</div>
					</article><!-- #post-## --> 
				</div>
				    <?php endwhile;
				    wp_reset_query();
			   } ?>
			</div>
	</div>
</div>
 <div class="partner pd20" style="background:#6eb356;">
	<div class="uk-container uk-container-center">

			<div class="uk-text-center ">
				<p class="uk-h1 uk-text-bold" style="color:#fff;">中国家居整装整配模式专家</p>
				<p class="uk-h3"style="color:#fff;">DIS研发|设计|家装|家具|家电|软装|家居百货</p>
			</div>

	
	
	</div>
</div> 
<div class="news pd20">
	<div class="uk-container uk-container-center">

			<div class="uk-text-center section-title">
				<h2 class="uk-h1">公司动态</h2>
				<div class="title-border">
					<div class="title-line">
						
					</div>
				</div>
				<!-- <p class="uk-h2">一线品牌直供，品质安全可靠</p> -->
			</div>
			<div class="uk-grid">
				<?php
				$cat_id = vp_option('vpt_option.se_news');
				$posts = get_posts(  
					$args = array(
						'category' => $cat_id,
						'numberposts' =>3
				 )); 
				 if( $posts ):
				 foreach( $posts as $post ) : setup_postdata( $post ); ?>
					 <div class="uk-width-small-1-1 uk-width-medium-1-3"> 
						  	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
						  		<div class="date">
						  			<div>
						  				<span><?php echo get_the_date('Y/m/d' ); ?></span>
							  			<p><?php //echo get_the_date( 'Y' );?></p>
						  			</div>
						  		</div>
						  		<div class="title">
						  			<h3 class="uk-h3">
									<!-- <span><?php the_category( );?></span> -->
									<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( ); ?></a>
								</h3>
						  		</div>
								<div class="centent">
									<?php echo wp_trim_words( get_the_content(), 100 );?>
									<div class="uk-text-center more">
										<a href="<?php the_permalink(); ?>"><i class="uk-icon-arrow-circle-o-right"></i></a>
									</div>
								</div>
							</article><!-- #post-## --> 
						</div>
				<?php endforeach; 
				endif; ?>
			</div>
			<div class="uk-text-center section-more">
				<a href="<?php echo get_category_link($cat_id );?>">查看更多</a>
			</div>
	
	</div>
</div>

<!-- <div class="partner pd20">
	<div class="uk-container uk-container-center">

			<div class="uk-text-center section-title">
				<h2 class="uk-h1">合作伙伴</h2>
				<div class="title-border">
					<div class="title-line">
						
					</div>
				</div>
				<p class="uk-h2">一线品牌直供，品质安全可靠</p>
			</div>

	
	</div>
</div> -->

<!-- <div class=" uk-container uk-container-center">
<div class="uk-grid">
	<div id="primary" class="content-area uk-width-medium-7-10">
		<main id="main" class="site-main " role="main">
		aaa
		</main>
	</div>

</div>
</div> -->
<?php get_footer();
