<?php
/*----------| Layout Panel >---------------------*/

			$wp_customize->add_section(	'layout',
				array(
					'title' => __('Layout','wp-demo'),
					'description' => __('Layout settings','wp-demo'),
					'priority' => 114,
				)
			);
			
			/*--Sidebar left--*/
			$wp_customize->add_setting(	'sidebar-left',
				array('sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'sidebar-left',
				array(
					'label' => __('Display left sidebar','wp-demo'),
					'section' => 'layout',
					'type' => 'checkbox',
				)						
			);			
		/*--End Sidebar left--*/
		
		/*--Sidebar Right--*/
			$wp_customize->add_setting(	'sidebar-right',
				array('default'=>'1','sanitize_callback' => 'az_checkbox_check',)
			);
			
			$wp_customize->add_control(	'sidebar-right',
				array(
					'label' => __('Display right sidebar','wp-demo'),
					'section' => 'layout',
					'type' => 'checkbox',
				)						
			);			
		/*--End Sidebar right--*/	

		/*--Sidebar width--*/
			$wp_customize->add_setting(	'site-maxwidth',
				array('default'=>'1400','sanitize_callback' => 'az_number_check','validate_callback' => 'validate_number')
			);
			
			$wp_customize->add_control(	'site-maxwidth',
				array(
					'label' => __('Site max-width (px)','wp-demo'),
					'section' => 'layout',
					'type' => 'text',
				)						
			);	
		/*--End Sidebar width--*/
						
		/*--Sidebar width--*/
			$wp_customize->add_setting(	'sidebar-width',
				array('default'=>'33','sanitize_callback' => 'az_number_check','validate_callback' => 'validate_number')
			);
			
			$wp_customize->add_control(	'sidebar-width',
				array(
					'label' => __('Sidebar width (%)','wp-demo'),
					'section' => 'layout',
					'type' => 'text',
				)						
			);	
		/*--End Sidebar width--*/			
		
?>