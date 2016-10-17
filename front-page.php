<?php get_header(); ?>

<div id="az-entry-wrap" class="az-flex">	

	<?php get_sidebar('left'); ?>

	<main id="main" class="az-content" >
	<!--Front-page template-->	

		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template/front-page', 'blog' );					
				endwhile;
			endif; 
		?>
		
		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?> 
	</main><!-- #main -->
	
	<?php get_sidebar('right'); ?>
	
</div> <!-- az-entry-wrap -->

<?php get_footer(); ?>

