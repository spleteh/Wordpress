<?php
/**
 * Plugin Name: Družabne Igre
 * Plugin URI: http://spleteh.si
 * Description: Custom post type za družabne igre
 * Author: Miha Zelnik
 * Author URI: http://spleteh.si
 * Version: 1.0.0
 * Date: 16.7.2011
 */

################################################################################
// Plugin vsebuje:
// 				- Custom post type Družabne igre (boardgame)
//				- Založnike (brez hirarhije)
//				- Jeziki (brez hirarhije)
//				- Vrsta igre (z hirarhijo)
//				- Dodani stolpci (Družabna igra, Slika, Število igralcev, Čas igranja, Starost, Leto izdaje, Jeziki, Založniki,	Vrsta igre,	Avtor, Komentarji, Datum)
//				- sortiranje stolpcev
//              - Meta Box (Osnovni podatki, Opis igre)
################################################################################

################################################################################
// CUSTOM POST TYPE
################################################################################

add_action('init', 'register_bg', 1); 

function register_bg() { 
 	$labels = array( 
		'name' => _x('Družabne igre', 'Vse družabne igre'),
		'singular_name' => _x('Vse družabne igre', 'Vse družabne igre'),
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
// VRSTA IGRE
################################################################################	
	
	$labels_vrsta = array(
	'name' => _x( 'Vrsta igre', 'taxonomy general name' ),
	'singular_name' => _x( 'Vrsta igre', 'taxonomy singular name' ),
	'search_items' =>  __( 'Išči vrsto' ),
	'all_items' => __( 'Vse vrste iger' ),
	'parent_item' => __( 'Parent Topic' ),
	'parent_item_colon' => __( 'Parent Topic:' ),
	'edit_item' => __( 'Uredi vrsto' ),
	'update_item' => __( 'Shrani vrsto' ),
	'add_new_item' => __( 'Dodaj novo vrsto' ),
	'new_item_name' => __( 'Novo ime vrste iger' ),
); 

register_taxonomy(
	'vrste_iger', // The name of the custom taxonomy
	array( 'boardgame' ), // Associate it with our custom post type
	array(
		'hierarchical' => true,
		'rewrite' => array(
			'slug' => 'vrsta', // Use "topic" instead of "topics" in permalinks
			'hierarchical' => true // Allows sub-topics to appear in permalinks
			),
		'labels' => $labels_vrsta
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

		$new_columns['stevilo_igralcev'] = __('Število igralcev');
		$new_columns['cas_igranja'] = __('Čas igranja');
		$new_columns['starost'] = __('Starost');
		$new_columns['leto_izdaje'] = __('Leto izdaje');
		$new_columns['jeziki'] = __('Jeziki');

		$new_columns['zalozniki'] = __('Založniki');
		$new_columns['vrste_iger'] = __('Vrsta igre');

		$new_columns['author'] = __('Avtor');
		$new_columns['comments'] = __('Komentarji');
 
		$new_columns['date'] = _x('Datum', 'column name');
 
		return $new_columns;
	}	
	
	add_action( 'manage_boardgame_posts_custom_column', 'devpress_manage_boardgame_columns', 10, 2 );

function devpress_manage_boardgame_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		case 'stevilo_igralcev' :
			$steviloigralcev = get_post_meta( $post_id, 'stevilo_igralcev', true );
			if ( empty( $steviloigralcev ) )
				echo __( 'Neznano' );
			else
				printf( __( '%s' ), $steviloigralcev );
			break;
			
		case 'cas_igranja' :
			$casigranja = get_post_meta( $post_id, 'cas_igranja', true );
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
			
		case 'leto_izdaje' :
			$letoizdaje = get_post_meta( $post_id, 'leto_izdaje', true );
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
			
		case 'vrste_iger' :
			$terms = get_the_terms( $post_id, 'vrste_iger' );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'vrste_iger' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'vrste_iger', 'display' ) )
					);
				}
				echo join( ', ', $out );
			}
			else {
				_e( 'Ni vrste iger' );
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

	$columns['stevilo_igralcev'] = 'steviloigralcev';
	return $columns;
}

add_filter( 'manage_edit-boardgame_sortable_columns', 'devpress_boardgame_sortable_casigranja_columns' );

function devpress_boardgame_sortable_casigranja_columns( $columns ) {

	$columns['cas_igranja'] = 'casigranja';
	return $columns;
}

add_filter( 'manage_edit-boardgame_sortable_columns', 'devpress_boardgame_sortable_starost_columns' );

function devpress_boardgame_sortable_starost_columns( $columns ) {

	$columns['starost'] = 'starost';
	return $columns;
}

add_filter( 'manage_edit-boardgame_sortable_columns', 'devpress_boardgame_sortable_letoizdaje_columns' );

function devpress_boardgame_sortable_letoizdaje_columns( $columns ) {

	$columns['leto_izdaje'] = 'letoizdaje';
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

add_filter( 'manage_edit-boardgame_sortable_columns', 'devpress_boardgame_sortable_vrste_iger_columns' );

function devpress_boardgame_sortable_vrste_iger_columns( $columns ) {

	$columns['vrste_iger'] = 'vrste_iger';
	return $columns;
}

################################################################################
// DODAJANJE CUSTOM FIELDS
################################################################################	

add_action("admin_init", "admin_init");
 
function admin_init(){
  add_meta_box("Osnovni_podatki", "Osnovni podatki", "osnovni_podatki_meta", "boardgame", "side", "high");
  add_meta_box("opis_igre", "Opis igre", "opis_igre", "boardgame", "normal", "high");
}
 
 
function osnovni_podatki_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $stevilo_igralcev = $custom["stevilo_igralcev"][0];
  $cas_igranja = $custom["cas_igranja"][0];
  $starost = $custom["starost"][0];
  $leto_izdaje = $custom["leto_izdaje"][0];
  ?>
  <p><label>Število igralcev:</label><br />
  <input name="stevilo_igralcev" value="<?php echo $stevilo_igralcev; ?>" /></p>
  <p><label>Čas igranja:</label><br />
  <input name="cas_igranja" value="<?php echo $cas_igranja; ?> " /></p>
  <p><label>Starost:</label><br />
  <input name="starost" value="<?php echo $starost; ?>" /></p>
  <p><label>Leto izdaje:</label><br />
  <input name="leto_izdaje" value="<?php echo $leto_izdaje; ?>" /></p>
  <?php
}

function opis_igre(){
	global $post;
	$custom = get_post_custom($post->ID);
	$o_igri = $custom["o_igri"][0];
	$cilj_igre = $custom["cilj_igre"][0];
	$vsebina_skatle = $custom["vsebina_skatle"][0];
	?>
	<p><label>O igri:</label><br />
	<textarea cols="80" rows="10" name="o_igri"><?php echo $o_igri; ?></textarea></p>
	<p><label>Cilj igre:</label><br />
	<textarea cols="80" rows="10" name="cilj_igre"><?php echo $cilj_igre; ?></textarea></p>
	<p><label>Vsebina škatle:</label><br />
	<textarea cols="80" rows="10" name="vsebina_skatle"><?php echo $vsebina_skatle; ?></textarea></p>
  <?php
}


add_action('save_post', 'save_details');
function save_details(){
  global $post;
 
  update_post_meta($post->ID, "leto_izdaje", $_POST["leto_izdaje"]);
  update_post_meta($post->ID, "stevilo_igralcev", $_POST["stevilo_igralcev"]);
  update_post_meta($post->ID, "cas_igranja", $_POST["cas_igranja"]);
  update_post_meta($post->ID, "starost", $_POST["starost"]);
  update_post_meta($post->ID, "o_igri", $_POST["o_igri"]);
  update_post_meta($post->ID, "cilj_igre", $_POST["cilj_igre"]);
  update_post_meta($post->ID, "vsebina_skatle", $_POST["vsebina_skatle"]);
}
	





	
	

?>