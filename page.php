<?php get_header(); ?>

<div id="az-entry-wrap" class="az-flex">	
	
	<?php get_sidebar('left'); ?>

	<main id="main" class="az-content" >
	<!--Page template-->
	
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();		
			?>				

			<?php if ( get_theme_mod( 'az-page-bread', true) ) dimox_breadcrumbs();?>
			 
			<article  <?php post_class('az-article clearfix'); ?> id="post-<?php the_ID(); ?>">							
							
				<?php edit_post_link(__('Edit This','wp-demo'),'<span class="az-edit">','</span>'); ?>
				
				<div class="<?php echo ( get_theme_mod( 'az-page-meta', true) ) ? 'az-article-meta' : 'az-hidden' ;?>" >	
					<span class="<?php echo ( get_theme_mod( 'az-page-date', true) ) ? 'az-posttitle-date' : 'az-hidden' ;?>" >
						<?php echo the_time( get_option( 'date_format' )); ?>
					</span>
					
					<span class="<?php echo ( get_theme_mod( 'az-page-time', false) ) ? 'az-posttitle-time' : 'az-hidden' ;?>" >
						<?php echo the_time( get_option( 'time_format' )); ?>
					</span>
					
					<span class="<?php echo ( get_theme_mod( 'az-page-author', true) ) ? 'az-author-meta' : 'az-hidden' ;?>" >
						<?php the_author_meta('display_name'); ?>
					</span>								
				</div>	

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="az-index-thumbnail">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('fullsize'); ?></a>
					</div>
				<?php endif; ?>	
				
				<h3 class="<?php echo ( get_theme_mod( 'az-page-title', true) ) ? 'az-posttitle' : 'az-hidden' ;?>" >
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


