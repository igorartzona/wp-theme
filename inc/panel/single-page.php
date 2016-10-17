<?php		
/*----------| Single Page Panel >---------------------*/		

		$wp_customize->add_section(	'single-page',
				array(
					'title' => __('Single Page','wp-demo'),
					'description' => __('Single page tuning','wp-demo'),
					'priority' => 116,
				)
			);		

		/*-- single page breadcrumbs--*/
			$wp_customize->add_setting(	'az-page-bread',
				array(	'default' => "1",	'sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'az-page-bread',
				array(
					'label' => __('Display breadcrumbs','wp-demo'),
					'section' => 'single-page',
					'type' => 'checkbox',
				)						
			);			
		/*--End single page breadcrumbs--*/		
		
		/*--Title single page--*/
			$wp_customize->add_setting(	'az-page-title',
				array('default' => "1",	'sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'az-page-title',
				array(
					'label' => __('Display page title','wp-demo'),
					'section' => 'single-page',
					'type' => 'checkbox',
				)						
			);			
		/*--End title single page--*/
		
		/*--Meta single page--*/
			$wp_customize->add_setting(	'az-page-meta',
				array(	'default' => "1", 'sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'az-page-meta',
				array(
					'label' => __('Display page meta','wp-demo'),
					'section' => 'single-page',
					'type' => 'checkbox',
				)						
			);			
		/*--End meta single page--*/

		/*-------Date single page--------------------*/
			$wp_customize->add_setting(	'az-page-date',
				array(	'default' => "1",'sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-page-date',
				array(
					'label' => __( 'View date', 'wp-demo' ), 
					'section' => 'single-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
		
		/*-------Time single page--------------------*/
			$wp_customize->add_setting(	'az-page-time',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-page-time',
				array(
					'label' => __( 'View time', 'wp-demo' ), 
					'section' => 'single-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/		
		
		/*-------Author single page--------------------*/
			$wp_customize->add_setting(	'az-page-author',
				array('default' => "1",'sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control(	'az-page-author',
				array(
					'label' => __( 'View post author', 'wp-demo' ), 
					'section' => 'single-page',
					'type' => 'checkbox'
				,)
			);
		/*----------------------------------------------*/
?>