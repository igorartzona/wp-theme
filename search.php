<?php get_header(); ?>

<div id="az-entry-wrap" class="az-flex">	
	
	<?php get_sidebar('left'); ?>

	<main id="main" class="az-content" >
	<!-- Search template -->
	
		<?php
			if ( have_posts() ) :?>
			<div class="az-search-title">
				<?php get_search_form(); ?>
				<?php printf( esc_html__( 'Search Results for : %s','wp-demo' ), '<strong>' . get_search_query() . '</strong>' ); ?>
			</div>
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template/archive');					
				endwhile;			
			else : ?>
			<div class="az-search-title">
				<?php get_search_form(); ?>
				<?php printf( esc_html__( 'Not Found for : %s','wp-demo' ), '<strong>' . get_search_query() . '</strong>' ); ?>
			</div>
			<div class="az-search-notfound"><img src="<?php echo get_template_directory_uri(); ?>/img/search-stork.png"></div>
			<?php endif;
		?>
		
		
		
		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?> 
	</main><!-- #main -->
	
	<?php get_sidebar('right'); ?>
	
</div> <!-- az-entry-wrap -->

<?php get_footer(); ?>

