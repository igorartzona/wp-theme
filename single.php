<?php get_header(); ?>

<div id="az-entry-wrap" class="az-flex">	
	
	<?php get_sidebar('left'); ?>

	<main id="main" class="az-content" >
	<!--Single template-->
	
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();		
			?>	
				
			<?php if ( get_theme_mod( 'az-post-bread', true) ) dimox_breadcrumbs();?>
			
			<article  <?php post_class('az-article clearfix'); ?> id="post-<?php the_ID(); ?>">			
										
				<?php edit_post_link(__('Edit This','wp-demo'),'<span class="az-edit">','</span>'); ?>
				<div class="<?php echo ( get_theme_mod( 'az-post-meta', true) ) ? 'az-article-meta' : 'az-hidden' ;?>" >			
					<span class="<?php echo ( get_theme_mod( 'az-post-date', true) ) ? 'az-posttitle-date' : 'az-hidden' ;?>" >
						<?php echo the_time( get_option( 'date_format' )); ?>
					</span>		
						
					
					<span class="<?php echo ( get_theme_mod( 'az-post-time', false) ) ? 'az-posttitle-time' : 'az-hidden' ;?>" >
						<?php echo the_time( get_option( 'time_format' )); ?>
					</span>
					
					<span class="<?php echo ( get_theme_mod( 'az-post-author', true) ) ? 'az-author-meta' : 'az-hidden' ;?>" >
						<?php the_author_meta('display_name'); ?>
					</span>								
								
					<?php if ( has_category() ) : ?>										
						<span class="<?php echo ( get_theme_mod( 'az-post-category', true) ) ? 'az-category-meta' : 'az-hidden' ;?>" >		<?php the_category(', ')?>
						</span>
					<?php endif; ?>										
				</div>
				
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="az-single-thumbnail">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
					</div>
				<?php endif; ?>
				
				<h3 class="<?php echo ( get_theme_mod( 'az-post-title', true) ) ? 'az-posttitle' : 'az-hidden' ;?>" >
					<a href="<?php the_permalink() ?>"> <?php the_title();?> </a>
				</h3>					
								
				<div class="entry clearfix">      
					<?php the_content(); ?>										
				</div>                                
                
				<?php if ( has_tag() ) : ?>
					<div class="az-article-meta">                    
						<span class="az-tags-meta"><?php the_tags(__('Tags: ','wp-demo'),', ',' ');?></span>               
					</div>
				<?php endif; ?>
				
				<!-- nextpage tag support -->
				<?php
					$defaults = array(
						'before'           => '<div class="navigation">' . __( 'Pages:','wp-demo' ),
						'after'            => '</div>',
						'link_before'      => '',
						'link_after'       => '',
						'next_or_number'   => 'number',
						'separator'        => ' ',
						'nextpagelink'     => __( 'Next page','wp-demo' ),
						'previouspagelink' => __( 'Previous page','wp-demo' ),
						'pagelink'         => '%',
						'echo'             => 1
					);	
				?>
					
				<?php wp_link_pages( $defaults );?>						

				</article>
				
				<div class="<?php echo ( get_theme_mod( 'aaz-post-prev-next-link', true) ) ? 'az-prev-next-link clearfix' : 'az-hidden' ;?>" >				
					<span class="az-prev-link"><?php previous_post_link('%link', '&lArr;%title'); ?></span>
					<span class="az-next-link alignright"><?php next_post_link('%link', '%title&rArr;'); ?></span>
				</div>
		
		<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
		
			<?php 
			endwhile;
		endif; 
		?>		
		
		<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?> 
		
	</main><!-- #main -->
	
	<?php get_sidebar('right'); ?>
	
</div> <!-- az-entry-wrap -->

<?php get_footer(); ?>


