<?php
/*----------| Title&tag Panel >---------------------*/
	
		/*--Add address--*/
			$wp_customize->add_setting('az-address',array('sanitize_callback' => 'az_text_check',) );
			
			$wp_customize->add_control(
				'az-address',
				array(
					'label' => __('Address','wp-demo'),
					'section' => 'title_tagline',
					'type' => 'text',
				)		
			);			
		/*--End address--*/
		
		/*--Add telephone--*/
			$wp_customize->add_setting('az-tel',array('sanitize_callback' => 'az_text_check',) );
			
			$wp_customize->add_control(
				'az-tel',
				array(
					'label' => __('Phone','wp-demo'),
					'section' => 'title_tagline',
					'type' => 'text',
				)		
			);				
		/*--End telephone--*/
		
		/*--Add email--*/
			$wp_customize->add_setting('az-email',array('sanitize_callback' => 'az_text_check',) );
			
			$wp_customize->add_control(
				'az-email',
				array(
					'label' => __('E-mail','wp-demo'),
					'section' => 'title_tagline',
					'type' => 'text',
				)		
			);				
		/*--End email--*/
?>