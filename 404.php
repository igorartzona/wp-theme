<?php get_header(); ?>

<div id="az-entry-wrap" class="az-flex">	
	
	<?php get_sidebar('left'); ?>

	<main id="main" class="az-content" >
	<!-- 404 template -->
	
		<p><?php _e('Page','wp-demo')?> <?php _e('not found','wp-demo')?></p>
	</main><!-- #main -->
	
	<?php get_sidebar('right'); ?>
	
</div> <!-- az-entry-wrap -->

<?php get_footer(); ?>

