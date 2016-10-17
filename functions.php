<?php
/*=== WPCodex. Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts. ===*/
	if ( ! isset( $content_width ) ) {$content_width = 600;}

/*=== Localisation ===*/	
	function az_locale(){
		load_theme_textdomain( 'wp-demo', get_template_directory() . '/languages' );		
	}
	add_action('after_setup_theme', 'az_locale');

/*=== Register style & script. Reset.css (Reset style), comment-reply, dashicons, style, font ===*/	
	function my_scripts_and_styles() {		
		if ( is_singular() && get_option( 'thread_comments' ) )	wp_enqueue_script( 'comment-reply' );
			wp_enqueue_style('style', get_stylesheet_uri(), array(),null );
			
			wp_register_style('my_dashicons', '/wp-includes/css/dashicons.min.css',array(),null );
			wp_enqueue_style( 'my_dashicons',get_stylesheet_uri(), array( 'my_dashicons' ),null);
		
	}
	add_action( 'wp_enqueue_scripts', 'my_scripts_and_styles' );

/*=== WPCodex. add_theme_support ===*/
	/* 	feed-links 	*/
		add_theme_support( 'automatic-feed-links' );
	
	/* 	title-tag 	*/	
		add_theme_support( 'title-tag' );

	/*	custom-background	*/
		$defaults = array( 
			'default-color' => '',
			'default-image' => '', 
			'wp-head-callback' => '_custom_background_cb', 
			'admin-head-callback' => '', 'admin-preview-callback' => '' 
		 ); 
		add_theme_support( 'custom-background', $defaults ); 
		
	/*	custom-header	*/
		$args = array(
			'uploads' => true,
			'width'   => 360,
			'height'  => 50,
			'flex-height'  => true,
			'flex-width'   => true,
		);
		add_theme_support( 'custom-header', $args );
		
	/* 	get_header_image compability	*/
		function az_has_header_image() { return (bool) get_header_image(); }
		
	/*	post-thumbnails */	
		add_theme_support('post-thumbnails');		

	/* 	html5 	*/
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		
/*=== WPCodex. Filters wp_title to print a neat <title> tag based on what is being viewed. ===*/
	function theme_name_wp_title( $title, $sep ) {
		if ( is_feed() ) {return $title;}	
		global $page, $paged;
		$title .= get_bloginfo( 'name', 'display' );	
		$site_description = get_bloginfo( 'description', 'display' );
		
		if ( $site_description && ( is_home() || is_front_page() ) ) {$title .= " $sep $site_description";}
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'wp-demo' ), max( $paged, $page ) );
		}
		return $title;
	}
	add_filter( 'wp_title', 'theme_name_wp_title', 10, 2 );

/*=== Style for editor ===*/
	function az_add_editor_styles() {
		add_editor_style( '/css/editor_styles.css' );
	}
	add_action( 'current_screen', 'az_add_editor_styles' );
	

/*=== Menu register ===*/
	register_nav_menus(	array('az_menu' => __('Main menu','wp-demo'),)	);

/*=== Sidebar register ===*/	
	function az_base_theme_widgets_init(){
		register_sidebar( array(
			'name' => __( 'Left Sidebar', 'wp-demo' ),
			'id' => 'left-sidebar',        
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="az-widget">',
			'after_title'   => '</div>',
		) ); 
		
		register_sidebar( array(
			'name' => __( 'Right Sidebar', 'wp-demo' ),
			'id' => 'right-sidebar',        
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="az-widget">',
			'after_title'   => '</div>',
		) );				
	}
	
	add_action( 'widgets_init', 'az_base_theme_widgets_init' );

/*=== Pagination ===*/
	function wp_corenavi() {  
	  global $wp_query, $wp_rewrite;  
	  $pages = '';  
	  $max = $wp_query->max_num_pages;  
	  if (!$current = get_query_var('paged')) $current = 1;  
	  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));  
	  $a['total'] = $max;  
	  $a['current'] = $current;  
	  
	  $total = 0;   
	  $a['mid_size'] = 3; 
	  $a['end_size'] = 1; 
	  $a['prev_text'] = '&laquo;'; 
	  $a['next_text'] = '&raquo;'; 
	  
	  if ($max > 1) echo '<div class="navigation">';  
	  if ($total == 1 && $max > 1) $pages = '<span class="pages">' ._e('Page','wp-demo'). $current . _e('from','wp-demo') . $max . '</span>'."\r\n";  
	  echo $pages . paginate_links($a);  
	  if ($max > 1) echo '</div>';  
	}

/*=== breadcrumbs ===*/
	function dimox_breadcrumbs() {

	 /* === OPTIONS === */
	$text['home'] = __('Home','wp-demo'); 
	$text['category'] = __('Category "%s"','wp-demo'); 
	$text['search'] = __('Search in "%s"','wp-demo'); 
	$text['tag'] = __('Tag in "%s"','wp-demo');
	$text['author'] = __('By author %s','wp-demo');
	$text['404'] = __('Error 404','wp-demo'); 
	$text['page'] = __('Page %s','wp-demo');
	$text['cpage'] = __('Page comments %s','wp-demo'); 
	 
	$wrap_before = '<div class="az-breadcrumbs">'; 
	$wrap_after = '</div><!-- .breadcrumbs -->'; 
	$sep = '›'; 
	$sep_before = '<span class="sep">'; 
	$sep_after = '</span>'; 
	$show_home_link = 1; 
	$show_on_home = 0; 
	$show_current = 1; 
	$before = '<span class="current">'; 
	$after = '</span>'; 
	 
	global $post;
	$home_link = home_url('/');
	$link_before = '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
	$link_after = '</span>';
	$link_attr = ' itemprop="url"';
	$link_in_before = '<span itemprop="title">';
	$link_in_after = '</span>';
	$link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	$frontpage_id = get_option('page_on_front');
	$parent_id = $post->post_parent;
	$sep = ' ' . $sep_before . $sep . $sep_after . ' ';
	
	if (is_home() || is_front_page()) {
		if ($show_on_home) echo $wrap_before . '<a href="' . $home_link . '">' . $text['home'] . '</a>' . $wrap_after;
	} else {
	  
	echo $wrap_before;
    if ($show_home_link) echo sprintf($link, $home_link, $text['home']);

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }
	} elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }
    echo $wrap_after;
  }
} // end of dimox_breadcrumbs()
	
	
/*--------------------------Az-baze-theme----------------------------------------*/	

/*=== include dynamic css ===*/
	require get_template_directory() . '/inc/dynamic_css.php';	
	
/*=== Customizer ===*/	

	function az_customizer( $wp_customize ) {		

	/*--replace code--*/
		require 'inc/panel/title-tag.php';		
		require 'inc/panel/single-page.php';
		require 'inc/panel/single-post.php';
		require 'inc/panel/front-page.php';
		require 'inc/panel/layout.php';
		require 'inc/panel/colors.php';

	
	/*------------------settings check-----------------------*/
		function az_text_check($input){
			return wp_kses_post( force_balance_tags( $input ) );
		}
		
		function az_number_check($input){
			return $input*1;
		}
		
		function validate_number($validity,$value){
			$value = intval( $value );
			if ( empty( $value ) || ! is_numeric( $value ) ) {
				$validity->add( 'required', __( 'You must supply a numeric value.','wp-demo' ) );
			} 
			return $validity;
		}
		
		function az_checkbox_check($input){					 
			return ($input == true) ? true : false;
		}
			
	}
	add_action( 'customize_register', 'az_customizer' );
	



?>