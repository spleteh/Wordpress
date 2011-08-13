<?php

if (is_admin()) include_once("includes/theme-config.php");

include_once("includes/theme-enqueue.php");

function show_posts_nav() {
   global $wp_query;
   return ($wp_query->max_num_pages > 1);
}

################################################################################
// Add theme sidebars
################################################################################

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	  	'name' => __( 'Primary Widget Area' ),
		'id' => 'primary-widget-area',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
	));
	
	register_sidebar(array(
	'name' => 'footer',
	'before_widget' => '<div class="boxFooter">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));
}

################################################################################
// Add theme support
################################################################################
add_theme_support('post-thumbnails');
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'nav-menus' );
// add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
// set_post_thumbnail_size( 324, 324, true ); 
// add_image_size( 'single-post-thumbnail', 160, 100, true );

register_nav_menus( array(
	'primary_menu' => __( 'Primary Navigation' ),
	'topMenu' => _( 'Top menu' ),
) );

################################################################################
// Comment formatting
################################################################################

function theme_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
   	
	<li>
     <article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
       <header class="comment-author vcard">
          <?php echo get_avatar($comment, '50'); ?>
          <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
          <time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s %2$s'), get_comment_date(),  get_comment_time()) ?></a></time>


       </header>
       <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Your comment is awaiting moderation.') ?></em>
          <br />
       <?php endif; ?>

       <?php comment_text() ?>

       <footer>
	    <?php edit_comment_link(__('Uredi'),'  ',''); delete_comment_link(get_comment_ID());
		?><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	   </footer>

     </article>
    <!-- </li> is added by wordpress automatically -->
    <?php
}

################################################################################
// Actions + Filters
################################################################################

// Remove links to the extra feeds (e.g. category feeds)
remove_action( 'wp_head', 'feed_links_extra', 3 );
// Remove links to the general feeds (e.g. posts and comments)
remove_action( 'wp_head', 'feed_links', 2 );
// Remove link to the RSD service endpoint, EditURI link
remove_action( 'wp_head', 'rsd_link' );
// Remove link to the Windows Live Writer manifest file
remove_action( 'wp_head', 'wlwmanifest_link' );
// Remove index link
remove_action( 'wp_head', 'index_rel_link' );
// Remove prev link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
// Remove start link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
// Display relational links for adjacent posts
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
// Remove XHTML generator showing WP version
remove_action( 'wp_head', 'wp_generator' );

function custom_excerpt($text) {
	return str_replace('[...]', ' <a href="'. get_permalink($post->ID) . '" class="more">' . 'More&nbsp;&raquo;' . '</a>', $text);
}
add_filter('the_excerpt', 'custom_excerpt');

// Allow HTML in descriptions
$filters = array('pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description');
foreach ( $filters as $filter ) {
	remove_filter($filter, 'wp_filter_kses');
}

function get_image_path ($post_id = null) {
	if ($post_id == null) {
		global $post;
		$post_id = $post->ID;
	}
	$theImageSrc = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
	global $blog_id;
	if (isset($blog_id) && $blog_id > 0) {
		$imageParts = explode('/files/', $theImageSrc);
		if (isset($imageParts[1])) {
			$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
		}
	}
	return $theImageSrc;
}


function delete_comment_link($id) {
  if (current_user_can('edit_post')) {
    echo ' | <a href="'.admin_url("comment.php?action=cdc&c=$id").'">Izbriši</a> ';
    echo ' | <a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">Spam</a> | ';
  }
}


