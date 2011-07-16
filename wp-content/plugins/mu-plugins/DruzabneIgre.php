﻿<?php
/**
 * Plugin Name: Družabne Igre
 * Plugin URI: http://spleteh.si
 * Description: Custom post type za družabne igre
 * Author: Miha Zelnik
 * Author URI: http://spleteh.si
 * Version: 0.1.0
 * Date: 15.7.2011
 */



add_action('init', 'register_bg', 1); 

function register_bg() { 
 	$labels = array( 
		'name' => _x('Družabne igre', 'Družabne igre'),
		'singular_name' => _x('Družabne igre', 'Družabne igre'),
		'add_new' => _x('Dodaj novo igro', 'boardgame'),
		'add_new_item' => __('Dodaj novo igro'),
		'edit_item' => __('Uredi igro'),
		'new_item' => __('Nova igra'),
		'view_item' => __('Poglej igro'),
		'search_items' => __('Išči igro'),
		'not_found' =>  __('Tukaj ni nič'),
		'not_found_in_trash' => __('Tukaj ni nič')
	);
	$args = array(
		'labels' => $labels, 
		'public' => true, 
		'hierarchical' => false, 
		'menu_position' => 5, 
		'has_archive' => 'resources', 
		'supports' => array('title','editor','comments','thumbnail','custom-fields','author'),
	);
	register_post_type( 'boardgame', $args ); 
}

################################################################################
// ZALOŽNIK
################################################################################
$labels_zaloznik = array(
	'name' => __( 'Založniki'),
	'singular_name' => __( 'Založnik'),
	'search_items' =>  __( 'Išči založnika' ),
	'popular_items' => __( 'Najpogostejši založniki' ),
	'all_items' => __( 'Vsi založniki' ),
	'edit_item' => __( 'Uredi založnika' ),
	'update_item' => __( 'Shrani založnika' ),
	'add_new_item' => __( 'Dodaj novega založnika' ),
	'new_item_name' => __( 'Nov založnik' ),
	'separate_items_with_commas' => __( 'za naštevanje uporabi vejico' ),
	'add_or_remove_items' => __( 'Dodaj ali izbriši založnika' ),
	'choose_from_most_used' => __( 'Izberi od najpogostejših založnikov' )
); 

register_taxonomy(
	'zalozniki',
	array( 'boardgame' ), 
	array(
		'rewrite' => array( 
			'slug' => 'zaloznik'
			),
		'labels' => $labels_zaloznik
		)
	);

################################################################################
// JEZIK
################################################################################
	
$labels_jeziki = array(

	'name' => _x( 'Jeziki', 'taxonomy general name' ),
	'singular_name' => _x( 'Jezik', 'taxonomy singular name' ),
	'search_items' =>  __( 'Išči jezik' ),
	'popular_items' => __( 'Najpogostejši jezik' ),
	'all_items' => __( 'Vsi jeziki' ),
	'edit_item' => __( 'Uredi jezik' ),
	'update_item' => __( 'Shrani jezik' ),
	'add_new_item' => __( 'Dodaj nov jezik' ),
	'new_item_name' => __( 'Nov jezik' ),
	'separate_items_with_commas' => __( 'za naštevanje uporabi vejico' ),
	'add_or_remove_items' => __( 'Dodaj ali izbriši jezik' ),
	'choose_from_most_used' => __( 'Izberi od najpogostejših jezikov' )
); 

register_taxonomy(
	'jeziki', 
	array( 'boardgame' ), 
	array(
		'rewrite' => array( 
			'slug' => 'jezik'
			),
		'labels' => $labels_jeziki
		)
	);

################################################################################
// ZVRST
################################################################################	
	
	$labels_zvrsti = array(
	'name' => _x( 'Zvrsti', 'taxonomy general name' ),
	'singular_name' => _x( 'Zvrst', 'taxonomy singular name' ),
	'search_items' =>  __( 'Išči zvrst' ),
	'all_items' => __( 'Vse zvrsti' ),
	'parent_item' => __( 'Parent Topic' ),
	'parent_item_colon' => __( 'Parent Topic:' ),
	'edit_item' => __( 'Uredi zvrst' ),
	'update_item' => __( 'Shrani zvrst' ),
	'add_new_item' => __( 'Dodaj novo zvrst' ),
	'new_item_name' => __( 'Novo ime zvrsti' ),
); 

register_taxonomy(
	'zvrsti', // The name of the custom taxonomy
	array( 'boardgame' ), // Associate it with our custom post type
	array(
		'hierarchical' => true,
		'rewrite' => array(
			'slug' => 'zvrst', // Use "topic" instead of "topics" in permalinks
			'hierarchical' => true // Allows sub-topics to appear in permalinks
			),
		'labels' => $labels_zvrsti
		)
	);
	

################################################################################
// DODAJANJE STOLPCEV
################################################################################	
	
add_filter('manage_edit-boardgame_columns', 'add_new_boardgame_columns');

function add_new_boardgame_columns($boardgame_columns) {
		$new_columns['cb'] = '<input type="checkbox" />';

		$new_columns['title'] = _x('Družabna igra', 'column name');
		$new_columns['thumbnail'] = __('Slika');

		$new_columns['steviloigralcev'] = __('Število igralcev');
		$new_columns['casigranja'] = __('Čas igranja');
		$new_columns['starost'] = __('Starost');
		$new_columns['letoizdaje'] = __('Leto izdaje');
		$new_columns['jeziki'] = __('Jeziki');

		$new_columns['zalozniki'] = __('Založniki');

		$new_columns['author'] = __('Author');
		$new_columns['comments'] = __('Komentarji');
 
		$new_columns['date'] = _x('Date', 'column name');
 
		return $new_columns;
	}	
	
	add_action( 'manage_boardgame_posts_custom_column', 'devpress_manage_boardgame_columns', 10, 2 );

function devpress_manage_boardgame_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		case 'steviloigralcev' :
			$steviloigralcev = get_post_meta( $post_id, 'steviloigralcev', true );
			if ( empty( $steviloigralcev ) )
				echo __( 'Neznano' );
			else
				printf( __( '%s' ), $steviloigralcev );
			break;
			
		case 'casigranja' :
			$casigranja = get_post_meta( $post_id, 'casigranja', true );
			if ( empty( $casigranja ) )
				echo __( 'Neznano' );
			else
				printf( __( '%s minut' ), $casigranja );
			break;
			
		case 'starost' :
			$starost = get_post_meta( $post_id, 'starost', true );
			if ( empty( $starost ) )
				echo __( 'Neznano' );
			else
				printf( __( '%s+' ), $starost );
			break;
			
		case 'letoizdaje' :
			$letoizdaje = get_post_meta( $post_id, 'letoizdaje', true );
			if ( empty( $letoizdaje ) )
				echo __( 'Neznano' );
			else
				printf( __( '%s' ), $letoizdaje );
			break;
			
		case 'jeziki' :
			$terms = get_the_terms( $post_id, 'jeziki' );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'jeziki' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'jeziki', 'display' ) )
					);
				}
				echo join( ', ', $out );
			}
			else {
				_e( 'Ni jezikov' );
			}

			break;		
	
		case 'zalozniki' :
			$terms = get_the_terms( $post_id, 'zalozniki' );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'zalozniki' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'zalozniki', 'display' ) )
					);
				}
				echo join( ', ', $out );
			}
			else {
				_e( 'Ni založnikov' );
			}

			break;		
		


		default :
			break;
	}
}

function fb_AddThumbColumn($cols) { 
		$cols['thumbnail'] = __('Thumbnail'); 
		return $cols;
	}
 
	function fb_AddThumbValue($column_name, $post_id) {
 
			$width = (int) 150;
			$height = (int) 100;
 
 
			if ( 'thumbnail' == $column_name ) {
				// thumbnail of WP 2.9
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
				// image from gallery
				$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
				if ($thumbnail_id)
					$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				elseif ($attachments) {
					foreach ( $attachments as $attachment_id => $attachment ) {
						$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
					}
				}
					if ( isset($thumb) && $thumb ) {
						echo $thumb;
					} else {
						echo __('None');
					}
			}
	}
 
	// for posts
	add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
	add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
 
	// for investments
	add_filter( 'manage_boardgame_columns', 'fb_AddThumbColumn' );
	add_action( 'manage_boardgame_custom_column', 'fb_AddThumbValue', 10, 2 );

################################################################################
// SORTIRANJE
################################################################################	
	
add_filter( 'manage_edit-boardgame_sortable_columns', 'devpress_boardgame_sortable_steviloigralcev_columns' );

function devpress_boardgame_sortable_steviloigralcev_columns( $columns ) {

	$columns['steviloigralcev'] = 'steviloigralcev';
	return $columns;
}

add_filter( 'manage_edit-boardgame_sortable_columns', 'devpress_boardgame_sortable_casigranja_columns' );

function devpress_boardgame_sortable_casigranja_columns( $columns ) {

	$columns['casigranja'] = 'casigranja';
	return $columns;
}

add_filter( 'manage_edit-boardgame_sortable_columns', 'devpress_boardgame_sortable_starost_columns' );

function devpress_boardgame_sortable_starost_columns( $columns ) {

	$columns['starost'] = 'starost';
	return $columns;
}

add_filter( 'manage_edit-boardgame_sortable_columns', 'devpress_boardgame_sortable_letoizdaje_columns' );

function devpress_boardgame_sortable_letoizdaje_columns( $columns ) {

	$columns['letoizdaje'] = 'letoizdaje';
	return $columns;
}

add_filter( 'manage_edit-boardgame_sortable_columns', 'devpress_boardgame_sortable_jeziki_columns' );

function devpress_boardgame_sortable_jeziki_columns( $columns ) {

	$columns['jeziki'] = 'jeziki';
	return $columns;
}

add_filter( 'manage_edit-boardgame_sortable_columns', 'devpress_boardgame_sortable_zalozniki_columns' );

function devpress_boardgame_sortable_zalozniki_columns( $columns ) {

	$columns['zalozniki'] = 'zalozniki';
	return $columns;
}
	





	
	

?>