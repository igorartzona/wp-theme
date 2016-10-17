<article  <?php post_class('az-article clearfix'); ?> id="post-<?php the_ID(); ?>">				
				
	<?php if (!is_sticky() ) : ?>
				
		<div class="<?php echo ( get_theme_mod( 'az-frontpage-meta', true) ) ? 'az-article-meta' : 'az-hidden' ;?>" >				
			<span class="<?php echo ( get_theme_mod( 'az-frontpage-date', true) ) ? 'az-posttitle-date' : 'az-hidden' ;?>" >
				<?php echo the_time( get_option( 'date_format' )); ?>
			</span>
					
			<span class="<?php echo ( get_theme_mod( 'az-frontpage-time', false) ) ? 'az-posttitle-time' : 'az-hidden' ;?>" >
				<?php echo the_time( get_option( 'time_format' )); ?>
			</span>
					
			<span class="<?php echo ( get_theme_mod( 'az-frontpage-author', true) ) ? 'az-author-meta' : 'az-hidden' ;?>" >
				<?php the_author_meta('display_name'); ?>
			</span>								
								
			<?php if ( has_category() ) : ?>										
				<span class="<?php echo ( get_theme_mod( 'az-frontpage-category', false) ) ? 'az-category-meta' : 'az-hidden' ;?>" >		<?php the_category(', ')?>
				</span>
			<?php endif; ?>										
		</div>
			
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="az-index-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			</div>
		<?php endif; ?>
				
			<h3 class="<?php echo ( get_theme_mod( 'az-frontpage-title', true) ) ? 'az-posttitle' : 'az-hidden' ;?>" >
				<a href="<?php the_permalink() ?>"> <?php the_title();?> </a>
			</h3>			
	<?php else: ?>
				
			<h3 class="az-stickytitle"><a href="<?php the_permalink() ?>"> <?php the_title();?> </a></h3>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="az-sticky-thumbnail">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
				</div>					
			<?php endif; ?>
			
	<?php endif; ?>
	
	<div class="entry">													
			<?php							
				if( has_excerpt() ) { 
					$length = apply_filters('excerpt_length',40);
					echo wp_trim_words(get_the_excerpt(),$length).
					'<p>
						<a class="more-link" href='.get_the_permalink().'>'.__('Read more&rArr;','wp-demo').'</a>
					</p>'; 
				} else { 							  
					the_content( __('Read more&rArr;','wp-demo') );
				}						
			?>					
	</div> 			
          
</article> 
