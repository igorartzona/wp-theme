<?php
	function az_dynamic_css ($dynamic_css) {
		wp_enqueue_style('az-dynamic-style', get_template_directory_uri() . '/css/custom_script.css');
		$dynamic_css = '';
		
		$site_maxwidth	= get_theme_mod('site-maxwidth', '1400');		
		$sidebar_width	= get_theme_mod('sidebar-width', '33');
				
		$colormenu	= get_theme_mod('colormenu');
		$colormenulink	= get_theme_mod('colormenulink');
		
		$primarycolor	= get_theme_mod('primarycolor', '#7f7f7f');
		$secondarycolor = "#FFF";
		$autocolor	= get_theme_mod('autocolor',true);
		
		/*-----------layout-----------------*/
			if ( $site_maxwidth ) {	$dynamic_css .= "\n\t #az-wrap {\n\t max-width: ".$site_maxwidth."px; \n}";	}				
		/*-----------end layout-----------------*/
		
		/*-----------color-----------------*/
			if ( $colormenulink ) {
				$dynamic_css .= "\n\t .az-primary-nav ul> li > a {\n\t color: $colormenulink; \n}".
								"\n\t .az-primary-nav .menu-item-has-children::after {\n\t color: $colormenulink; \n}".
								"\n\t .az-primary-nav .menu-item-has-children > li:hover {\n\t background: $colormenulink; \n}".
								"\n\t .current-menu-item, .current_page_item{\n\t color:$colormenulink; \n}".								
								"\n\t .az-primary-nav .current-menu-item, .az-primary-nav .current_page_item {\n\t background:$colormenulink; \n}".
								"\n\t .az-primary-nav .menu .menu-item-home a{\n\t color:$colormenulink; \n}".
								"\n\t .az-primary-nav a, .az-primary-nav .menu-item-has-children::after {\n\t color:$colormenulink; \n}".
								"\n\t .az-primary-nav ul > li {\n\t border-right: 1px solid $colormenulink; \n}".
								"\n\t .az-primary-nav li:hover {\n\t background:$colormenulink; \n}".
								"\n\t .toggle-button:after {\n\t color: $colormenulink; \n}";
				
			}
			
			if ( $colormenu ) {
				$dynamic_css .= "\n\t .az-primary-nav {\n\t background: $colormenu; \n}".
								"\n\t .az-primary-nav .page_item_has_children:hover, .az-primary-nav .menu-item-has-children:hover {\n\t border-right:1px solid $colormenu \n}"."\n\t .current-menu-item a, .current_page_item a{\n\t color:$colormenu; \n}".
								"\n\t .az-primary-nav .menu-item-home {\n\t background:$colormenu; \n}".	
								"\n\t .az-primary-nav .current-menu-item a, .az-primary-nav .current_page_item a{\n\t color:$colormenu; \n}".
								"\n\t .az-primary-nav .menu .menu-item-home:hover > a{\n\t color:$colormenu; \n}".
								"\n\t .az-primary-nav .sub-menu,.az-primary-nav .children {\n\t background: $colormenu; \n}".
								"\n\t .az-primary-nav li a:hover {\n\t color:$colormenu; \n}".
								"\n\t .az-primary-nav li:hover > a {\n\t color:$colormenu; \n}";				
			}
			
			if ( $autocolor ) {
				$dynamic_css .= "\n\t .az-posttitle {\n\t border-left: 1.4em solid $primarycolor; \n}".
								"\n\t .az-posttitle:after {\n\t border: 1px inset $primarycolor; \n}".
								"\n\t .sticky {\n\t box-shadow: 1px 1px 2px $primarycolor inset, -1px -1px 2px $primarycolor inset; \n}".								
								"\n\t input[type='submit'], .more-link, .comment-form-author > input, .comment-form-email > input, .comment-form-url > input {\n\t border: 1px solid $primarycolor; \n}".
								"\n\t .comment-reply-title:before,a:link,a:visited,a:hover,blockquote:before {\n\t color:$primarycolor; \n}".
								"\n\t .more-link:hover,thead,th,input[type='submit'],.navigation a, footer {\n\t background:$primarycolor; color:$secondarycolor; \n}".
								"\n\t input[type='submit']:hover,.navigation a:hover {\n\t	color:$primarycolor;background:$secondarycolor; \n}".
								"\n\t blockquote {\n\t border-left:2px solid $primarycolor; \n}".
								"\n\t .sticky:before{\n\t color: $primarycolor;border:2px solid $primarycolor; \n}".
								"\n\t .az-widget {\n\t border-bottom: 1px solid $primarycolor;border-top: 1px solid $primarycolor;color:$primarycolor; \n}".
								"\n\t .bypostauthor {\n\t background:$secondarycolor; border-left:2px solid $primarycolor; \n}";			
			}
			
		/*-----------color end-------------*/
		
		/*-------------media---------------*/
		$dynamic_css .= '@media only screen and (min-width: 1024px) {';
			if ( $sidebar_width ) {					
				$dynamic_css .= "\n\t .az-sidebar {\n\t min-width: ".$sidebar_width."%; \n
													\n\t max-width: ".$sidebar_width."%; \n}";			
			}						
		$dynamic_css .= '\n }';
		
		$dynamic_css .= '@media only screen and (min-width: 321px) and (max-width: 1023px) {';			
			if ( $colormenulink ) {
				$dynamic_css .= "\n\t .az-primary-nav ul > li {\n\t border:0; \n}";
			}			
		$dynamic_css .= '\n }';
		
		/*---------media end---------------*/
		
		wp_add_inline_style( 'az-dynamic-style', $dynamic_css );		
	}
	
	add_action( 'wp_enqueue_scripts', 'az_dynamic_css' );
?>