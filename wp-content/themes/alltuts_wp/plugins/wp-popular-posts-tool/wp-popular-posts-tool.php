<?php
/*
Plugin Name: WP-Popular Posts Tool
Plugin URI: http://teofiloisrael.com/plugin-pupular-posts-tool/
Description: Enables you to automatically display most commented posts, either by category or tag. Optional: You can choose manually the category or tag you want to display its most commented posts. It has a widget to add it easily to your sidebar. See this plugin in action in http://emovilpro.com
Author: Teofilo Israel Vizcaino Rodriguez
Version: 1.1.1
Author URI: http://teofiloisrael.com
Demo URI: http://emovilpro.com
*/ 

function ti_popular_posts($num, $my_id=0, $begin='<ul>', $end='</ul>', $pre='<li>', $suf='</li>'){
	global $wpdb;
	if($my_id==0):
         if(is_category()): 
		$my_title = strtolower(single_cat_title('', false));  $my_id = get_cat_ID($my_title); 
	elseif(is_tag()):
		$my_title = $my_id = intval(get_query_var('tag_id'));
	elseif(is_single()):
		$my_title = get_the_category(); $my_id = $my_title[0]->cat_ID;
	endif;
         endif;
	if(!is_category() && !is_tag() && !is_single() && $my_id==0): 
	$querystr = "SELECT $wpdb->posts.post_title, $wpdb->posts.ID, $wpdb->posts.post_content, $wpdb->posts.comment_count FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ORDER BY $wpdb->posts.comment_count DESC LIMIT $num";
	else:
		$querystr = "SELECT * FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id) where term_id=$my_id ORDER BY comment_count desc LIMIT $num";
	endif;	

	$myposts = $wpdb->get_results($querystr, OBJECT);
	echo $begin;
	foreach($myposts as $post) {
		echo $pre;
		?><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title ?></a><?php
		echo '<br />' . $post->comment_count . ' '; _e('comments'); 
		echo $suf;
	} echo $end;
}

		function ti_popular_posts_widget($args){
				extract($args);
				$options = get_option('widget_ti_popular_posts');
				echo $before_widget;
				echo $before_title . $options['title'] . $after_title;
				ti_popular_posts($options['items_number'], $options['category_or_tag_id']);
				echo $after_widget;
		}
	
function ti_popular_posts_widget_control() {
	$options = $newoptions = get_option('widget_ti_popular_posts');

	if ($_POST["ti-popular-posts-submit"]) :

		$newoptions['title'] = strip_tags(stripslashes($_POST["ti-popular-posts-title"]));	

		$newoptions['items_number'] = strip_tags(stripslashes($_POST["ti-popular-posts-items-number"]));
		if (empty($newoptions['items_number'])) $newoptions['items_number'] = 5;	

		$newoptions['category_or_tag_id'] = strip_tags(stripslashes($_POST["ti-popular-posts-category-or-tag-id"]));
		if (empty($newoptions['category_or_tag_id'])) $newoptions['category_or_tag_id'] = 0;	
			
	endif;	

	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_ti_popular_posts', $options);
	}

	$title = htmlspecialchars($options['title'], ENT_QUOTES);
	$items_number= htmlspecialchars($options['items_number'], ENT_QUOTES);
	$category_or_tag_id = htmlspecialchars($options['category_or_tag_id'], ENT_QUOTES);
?>
			<p><label for="ti-popular-posts-title"><?php _e('Title:'); ?> <input style="width: 250px;" id="ti-popular-posts-title" name="ti-popular-posts-title" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="ti-popular-posts-items-number"><?php _e('Number of items to show:'); ?> <input style="width: 30px; text-align:right; padding-right:3px" id="ti-popular-posts-items-number" name="ti-popular-posts-items-number" type="text" value="<?php echo $items_number; ?>" /></label></p>			
			<p><label for="ti-popular-posts-category-or-tag-id"><?php _e('Id of the cateogory or tag (leave it blank for automatic detection):'); ?> <input style="width: 40px; text-align:right; padding-right:3px" id="ti-popular-posts-category-or-tag-id" name="ti-popular-posts-category-or-tag-id" type="text" value="<?php echo $category_or_tag_id; ?>" /></label></p>
			<input type="hidden" id="ti-popular-posts-submit" name="ti-popular-posts-submit" value="1" />
<?php
}


function init_ti_popular_posts_widget(){
    register_sidebar_widget("WP-Popular Posts Widget", "ti_popular_posts_widget");
	register_widget_control('WP-Popular Posts Widget', 'ti_popular_posts_widget_control', null, 75);
}

add_action("plugins_loaded", "init_ti_popular_posts_widget");

?>