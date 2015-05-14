<?php

return array(
	'id'          => 'team_set',
	'types'       => array('team_member'),
	'title'       => __('团队成员设置', 'vp_textdomain'),
	'priority'    => 'high',
	'template'    => array(
		array(
					'type' => 'textbox',
					'name' => 'team_member_name',
					'label' => __('姓名', 'vp_textdomain'),
					'description' => __('输入姓名', 'vp_textdomain'),
		),
		// array(
		// 	'type' => 'select',
		// 	'name' => 'team_dept',
		// 	'label' => __('部门', 'vp_textdomain'),
		// 	'description' => __('请选择所在部门', 'vp_textdomain'),
		// 	'items' => array(
		// 		'data' => array(
		// 			array(
		// 				'source' => 'function',
		// 				'value'  => 'nii_get_team_dept',
		// 			),
		// 		),
		// 	),
		// ),
		// array(
		// 	'type' => 'select',
		// 	'name' => 'team_job',
		// 	'label' => __('职位', 'vp_textdomain'),
		// 	'description' => __('请选择所处职位', 'vp_textdomain'),
		// 	'items' => array(
		// 		'data' => array(
		// 			array(
		// 				'source' => 'function',
		// 				'value'  => 'nii_get_team_job',
		// 			),
		// 		),
		// 	),
		// ),
		array(
			'type' => 'upload',
			'name' => 'team_member_img',
			'label' => __('图像', 'vp_textdomain'),
			'description' => __('请上传成员图像', 'vp_textdomain'),
			'default' => 'http://lorempixel.com/500/400/',
		),
		array(
			'type'                       => 'wpeditor',
			'label'                      => __('成员简介', 'vp_textdomain'),
			'name'                       => 'team_member_content',
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