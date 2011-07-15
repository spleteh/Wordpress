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
		'singular_name' => _x('druzabneigre', 'Družabne igre'),
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
		'supports' => array('title','editor','comments','thumbnail','custom-fields'),
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


?>