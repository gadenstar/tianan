	<style type="text/css">
		<?php if (vp_metabox("page_builder.toggle_filtering")==1): ?>
			<?php if(vp_metabox("page_builder.filtering_group.0.filter_type")=="color"): ?>
				.page-header {
					background: <?php echo vp_metabox("page_builder.filtering_group.0.page_color");?>;
				}
				<?php endif; ?>
			<?php if(vp_metabox("page_builder.filtering_group.0.filter_type")=="img"): ?>
				.page-header {
						background: url('<?php echo vp_metabox("page_builder.filtering_group.0.page_img");?>');
						background-position: 50% 50%;
	 					background-size: cover;
					}
			<?php endif; ?>
		<?php endif; ?>
		.partner {
			background: ;
		}
	<style>