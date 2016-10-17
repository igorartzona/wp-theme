<!DOCTYPE HTML>
<html <?php language_attributes(); ?> > 
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
	<!-- mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" > 

	<!-- WP required -->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon.ico" />

	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?> >

<div id="az-wrap">	
	<header id="az-header">
		<div id="az-site-branding">				
			<h1 class="az-site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo('name'); ?>"><?php bloginfo( 'name' ); ?></a>
			</h1>
						
			<?php	$description = get_bloginfo( 'description','display');if ($description || is_customize_preview()) : ?>
				<h2 class="site-description"><?php echo $description; ?></h2>
			<?php endif; ?>			
		</div>
			
		<div id="az-logo">
			<a href="<?php  echo home_url(); ?>" title="<?php bloginfo('name'); ?>">				
				<?php if (az_has_header_image() ) : ?> 							
					<img 
						src="<?php header_image(); ?>" 
						height="<?php echo get_custom_header()->height; ?>" 
						width="<?php echo get_custom_header()->width; ?>" 
						alt="<?php bloginfo('name'); ?>"
						class="az-logo-img" 
					/>						
				<?php endif; ?>				
			</a>
		</div>
				
		<?php if ( get_theme_mod( 'az-address') || get_theme_mod( 'az-tel') || get_theme_mod( 'az-email') ) : ?>
			<div class="az-requisites">
				<div class="<?php if ( !get_theme_mod( 'az-address') ) echo 'az-hidden';?> az-address-wrap">
					<address class="az-address">
						<?php echo get_theme_mod( 'az-address'); ?>
					</address>
				</div>
					
				<div class="<?php if ( !get_theme_mod( 'az-tel') ) echo 'az-hidden';?> az-tel-wrap">
					<a href="tel:<?php echo get_theme_mod( 'az-tel'); ?>" class="az-tel">
						<?php echo get_theme_mod( 'az-tel'); ?>
					</a>
				</div>
					
				<div class="<?php if ( !get_theme_mod( 'az-email') ) echo 'az-hidden';?> az-email-wrap">
					<a href="mailto:<?php echo get_theme_mod( 'az-email'); ?>" class="az-email">
						<?php echo get_theme_mod( 'az-email'); ?>
					</a>
				</div>
			</div>
		<?php endif; ?>
			
	</header>

	<!---------Primary menu------------>
	
	<input type="checkbox" id="menu-checkbox"  />
	<nav class="az-primary-nav" role="navigation">	
		<label class="toggle-button" for="menu-checkbox" onclick></label>
			<?php 
				wp_nav_menu(array(
					'theme_location' => 'az_menu',
					'fallback_cb' => false,					
					)
				);	
			?>
	</nav>	
