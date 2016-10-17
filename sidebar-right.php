<?php if ( is_active_sidebar('right-sidebar') ) : ?>
		<div class="<?php echo ( get_theme_mod( 'sidebar-right', true) ) ? 'az-sidebar az-right-sidebar' : 'az-hidden' ;?>" >		
			<?php  dynamic_sidebar( 'right-sidebar' ); ?> 
		</div>
<?php endif; ?>