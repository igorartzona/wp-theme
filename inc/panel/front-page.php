<?php
/*----------| Front Page Panel >---------------------*/

			$wp_customize->add_section(	'front-page',
				array(
					'title' => __('Front Page','wp-demo'),
					'description' => __('Front Page tuning','wp-demo'),
					'priority' => 115,
				)
			);
			
			/*--Title frontpage post--*/
			$wp_customize->add_setting(	'az-frontpage-title',
				array('default' => "1",'sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'az-frontpage-title',
				array(
					'label' => __('Display post title','wp-demo'),
					'section' => 'front-page',
					'type' => 'checkbox',
				)						
			);			
		/*--End title frontpage post--*/
		
		/*--Meta frontpage post--*/
			$wp_customize->add_setting(	'az-frontpage-meta',
				array('default' => "1",'sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'az-frontpage-meta',
				array(
					'label' => __('Display post meta','wp-demo'),
					'section' => 'front-page',
					'type' => 'checkbox',
				)						
			);			
		/*--End title frontpage--*/

		/*-------Date frontpage--------------------*/
			$wp_customize->add_setting(	'az-frontpage-date',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
		
			$wp_customize->add_control(	'az-frontpage-date',
				array(
					'label' => __( 'View date', 'wp-demo' ), 
					'section' => 'front-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
		
		/*-------Time frontpage--------------------*/
			$wp_customize->add_setting(	'az-frontpage-time',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-frontpage-time',
				array(
					'label' => __( 'View time', 'wp-demo' ), 
					'section' => 'front-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/		
		
		/*-------Author frontpage--------------------*/
			$wp_customize->add_setting(	'az-frontpage-author',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',	)
			);
		
			$wp_customize->add_control(	'az-frontpage-author',
				array(
					'label' => __( 'View post author', 'wp-demo' ), 
					'section' => 'front-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
		
		/*-------Category frontpage--------------------*/
			$wp_customize->add_setting(	'az-frontpage-category',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-frontpage-category',
				array(
					'label' => __( 'View post category', 'wp-demo' ), 
					'section' => 'front-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/		
?>