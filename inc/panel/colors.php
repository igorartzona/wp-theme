<?php
/*----------| Colors Panel >---------------------*/

		/*--Add menu color--*/
			$wp_customize->add_setting('colormenu',
				array('default' => '#F5F5F5','sanitize_callback' => 'az_text_check',) 
			);
			
			$wp_customize->add_control('colormenu',
				array(
					'label' => __('Menu Color','wp-demo'),
					'section' => 'colors',
					'type' => 'color',
				)		
			);
				
		/*--End menu color--*/
		
		/*--Add menu link color--*/
			$wp_customize->add_setting('colormenulink',array('default' => '#7f7f7f','sanitize_callback' => 'az_text_check') );
			
			$wp_customize->add_control('colormenulink',
				array(
					'label' => __('Menu Link Color','wp-demo'),
					'section' => 'colors',
					'type' => 'color',
				)		
			);
				
		/*--End menu link color--*/	

		/*--Autocolor--*/
			$wp_customize->add_setting('autocolor',
				array('default' => '1','sanitize_callback' => 'az_checkbox_check',)
			);
		
			$wp_customize->add_control('autocolor',
				array(
					'label' => __( 'Apply intellectual color theme', 'wp-demo' ), 
					'section' => 'colors',
					'type' => 'checkbox'
				,)
			);
		/*------------------------------------------------------------------------*/
		
		/*--Add primary color--*/
			$wp_customize->add_setting('primarycolor',
				array('default' => '#7f7f7f','sanitize_callback' => 'az_text_check',) 
			);
			
			$wp_customize->add_control('primarycolor',
				array(
					'label' => __('Primary Color','wp-demo'),
					'section' => 'colors',
					'type' => 'color',
				)		
			);
				
		/*--End primary color--*/
		
?>