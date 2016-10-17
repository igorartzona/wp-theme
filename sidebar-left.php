<?php if ( is_active_sidebar('left-sidebar') ) : ?>
	<div class="<?php echo ( get_theme_mod( 'sidebar-left', false) ) ? 'az-sidebar az-left-sidebar' : 'az-hidden' ;?>" >	
		<?php  dynamic_sidebar( 'left-sidebar' ); ?> 
	</div>
<?php endif; ?>