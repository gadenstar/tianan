<?php

return array(
	'id'          => 'case_set',
	'types'       => array('case'),
	'title'       => __('案例设置', 'vp_textdomain'),
	'priority'    => 'high',
	'template'    => array(
		array(
					'type' => 'textbox',
					'name' => 'client_name',
					'label' => __('客户姓名', 'vp_textdomain'),
					'description' => __('请用X先生/X女士代替真实姓名', 'vp_textdomain'),
		),
		array(
			'type' => 'select',
			'name' => 'case_design',
			'label' => __('职位', 'vp_textdomain'),
			'description' => __('请选择所处职位', 'vp_textdomain'),
			'items' => array(
				'data' => array(
					array(
						'source' => 'function',
						'value'  => 'nii_get_team_design',
					),
				),
			),
		),
		array(
					'type' => 'textbox',
					'name' => 'client_area',
					'label' => __('项目面积', 'vp_textdomain'),
					'description' => __('这里输入装修项目面积', 'vp_textdomain'),
		),
		array(
		        'type' => 'upload',
		        'name' => 'img',
		        'label' => __('封面图像', 'vp_textdomain'),
		        'description' => __('用于分类页面展示用', 'vp_textdomain'),
		        //'default' => 'http://placehold.it/70x70',
		    ),

		array(
		    'type'      => 'group',
		    'repeating' => true,
		    'name'      => 'repeating_group',
		    'title'     => __('案例图像', 'vp_textdomain'),
		    'fields'    => array(
		        array(
					'type' => 'upload',
					'name' => 'teams_img',
					'label' => __('图像', 'vp_textdomain'),
					'description' => __('请上传成员图像', 'vp_textdomain'),
					'default' => 'http://lorempixel.com/500/400/',
				),
		        /* more controls fields or even nested group ... */
		    ),
		),
		
		
		array(
			'type'                       => 'wpeditor',
			'label'                      => __('案例介绍', 'vp_textdomain'),
			'name'                       => 'teams_content',
			'use_external_plugins'       => 1,
			'disabled_externals_plugins' => 'vp_sc_button, sgtroces2',
			'disabled_internals_plugins' => '',
			'validation'                 => 'required',
		),
	),
);

/**
 * EOF
 */