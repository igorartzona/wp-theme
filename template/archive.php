<article  <?php post_class('az-article clearfix'); ?> id="post-<?php the_ID(); ?>">				
				
			<div class="az-article-meta">						
				<span class="az-posttitle-date" ><?php echo get_the_date(); ?></span>
				<span class="az-posttitle-time"><?php echo get_the_time('g:i'); ?></span>
				<span class="az-author-meta"><?php the_author_meta('display_name'); ?></span>
				<span class="az-comment-meta">
					<?php comments_popup_link( sprintf( __( 'Leave a comment', 'wp-demo' ), get_the_title() ) ); ?>
				</span> 						
				<span class="az-category-meta"><?php the_category(', ')?></span>					
			</div>	

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="az-index-thumbnail">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
				</div>
			<?php endif; ?>	
			
			<h3 class="az-posttitle"><a href="<?php the_permalink() ?>"> <?php the_title();?> </a></h3>				
	
	<div class="entry">													
			<?php	
				$length = apply_filters('content_length',40);
				echo wp_trim_words(get_the_content(),$length).
				'<p>
					<a class="more-link" href='.get_the_permalink().'>'.__('Read more&rArr;','wp-demo').'</a>
				</p>';			
			?>					
	</div> 			
          
</article> 
