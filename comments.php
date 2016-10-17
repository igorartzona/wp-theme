<?php
if ( post_password_required() )	return;
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

if (comments_open()) {
	if (get_comments_number() == 0) {}
	else { ?> 
		<div class="az-comments_in">
			<h4 class="pre_comment"><?php _e('Comments :','wp-demo')?></h4>
			<?php
			/*-- start --*/
				function az_comment($comment, $args, $depth){
					$GLOBALS['comment'] = $comment; ?>
						<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
						<div id="comment-<?php comment_ID(); ?>">
						
							<span class="az-gravatar">
								<?php echo get_avatar( $comment, 48 ); ?>
							</span>
							
							<span class="comment-author vcard">
								<?php printf(__('%s','wp-demo'), get_comment_author_link()) ?> 
							</span>
							
							<?php if ($comment->comment_approved == '0') : ?>
								<em><?php _e('Your comment will be published after approval by the administrator','wp-demo') ?></em><br />
							<?php endif; ?>	  
							
							<span class="comment-meta az-article-meta commentmetadata">
								[<?php printf(__('%1$s at %2$s','wp-demo'), get_comment_date(), get_comment_time()) ?>
								<?php edit_comment_link(__('(Edit)','wp-demo'),'  ','') ?>]
							</span>
							
							<div class="az-commenttext">
								<?php comment_text() ?>
							</div>	<!-- az-commenttext -->		
							
							<div class="reply">								
								<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
							</div> <!-- reply -->
							
						</div> <!-- id-comment -->
			<?php }
			/*-- end --*/
			?>
				<ul class="az-commentlist">
					<?php 
						$args = array(
							'walker'            => null,
							'max_depth'         => '5',
							'style'             => 'ul',
							'callback'          => 'az_comment',
							'end-callback'      => null,
							'type'              => 'all',
							'page'              => '',
							'per_page'          => '',
							'avatar_size'       => 32,
							'reverse_top_level' => null,
							'reverse_children'  => null, 
						);
						
						wp_list_comments ( $args );					
					?>

				</ul>
				
				<?php
					//получаем кол-во комментариев для разбиения на страницы из Настройки->Обсуждение				
				$cpp = get_option( 'comments_per_page' );
					//получаем общее кол-во комментариев к посту
				$all_comments = intval( get_comments_number_text() );
					//если общее кол-во > кол-во для разбиения показываем пагинацию
				if ($cpp < $all_comments) : ?>

					<div class="az-pagi navigation">
						<?php paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;') ); ?>
					</div>	
						
				<?php endif; ?>
	
		</div> <!-- az-comments_in -->
	<?php
	}	
		$fields = array(
		  'author' => 
		  '<p class="comment-form-author"><label for="author">' . __( 'Name','wp-demo') . '</label> '.($req ? '<span class="required">*</span>' : '') . '<br><input type="text" id="author" name="author" class="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '></p>',
		 'email'  => 
		 '<p class="comment-form-email"><label for="email">' . __( 'Email','wp-demo') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .'<br><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		 'url'  => 
		 '<p class="comment-form-url"><label for="url">' . __( 'URL','wp-demo') . '</label> ' .'<br><input id="url" name="url" type="url" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . ' /></p>',
		);
	 
		$args = array(
		  'comment_notes_before' => '',
		  'comment_notes_after'  => '',
		  'comment_field' => '<p><textarea id="comment" name="comment" class="comment-form" rows="8" aria-required="true" placeholder="'.__('Your message...','wp-demo').'"></textarea></p>',
		  'label_submit' => __('Send','wp-demo'),
		  'fields' => apply_filters('comment_form_default_fields', $fields)
		);
		comment_form($args);		
} 
	?>