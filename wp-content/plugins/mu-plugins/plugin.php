<?php
/*
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
// 				- Custom post type Družabne igre (druzabneigre)
//				- Založnike (brez hirarhije)
//				- jezik (brez hirarhije)
//				- Vrsta igre (z hirarhijo)
//				- Dodani stolpci (Družabna igra, Slika, število igralcev, Čas igranja, Starost, Leto izdaje, jezik, Založniki,	Vrsta igre,	Avtor, Komentarji, Datum)
//				- sortiranje stolpcev
//              - Meta Box (Osnovni podatki, Opis igre)
################################################################################

################################################################################
// CUSTOM POST TYPE
################################################################################

add_action('init', 'register_bg', 1); 

function register_bg() { 
 	$labels = array( 
		'name' => _x('Družabne igre', 'post general name'),
		'singular_name' => _x('Družabna igra', 'post singular name'),
		'add_new' => _x('Dodaj novo igro', 'druzabneigre'),
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
	register_post_type( 'druzabneigre', $args ); 
}



//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_druzabneigre_taxonomies', 0 );

//create two taxonomies, genres and writers for the post type "book"
function create_druzabneigre_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Vrsta igre', 'taxonomy general name' ),
    'singular_name' => _x( 'Vrsta igre', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Genres' ),
    'all_items' => __( 'All Genres' ),
    'parent_item' => __( 'Parent Genre' ),
    'parent_item_colon' => __( 'Parent Genre:' ),
    'edit_item' => __( 'Edit Genre' ), 
    'update_item' => __( 'Update Genre' ),
    'add_new_item' => __( 'Add New Genre' ),
    'new_item_name' => __( 'New Genre Name' ),
    'menu_name' => __( 'Vrsta igre' ),
  ); 	

  register_taxonomy('vrsta_igre',array('druzabneigre'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'vrstaigre' ),
  ));

  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Založniki', 'taxonomy general name' ),
    'singular_name' => _x( 'Založnik', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Writers' ),
    'popular_items' => __( 'Popular Writers' ),
    'all_items' => __( 'All Writers' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Writer' ), 
    'update_item' => __( 'Update Writer' ),
    'add_new_item' => __( 'Add New Writer' ),
    'new_item_name' => __( 'New Writer Name' ),
    'separate_items_with_commas' => __( 'Separate writers with commas' ),
    'add_or_remove_items' => __( 'Add or remove writers' ),
    'choose_from_most_used' => __( 'Choose from the most used writers' ),
    'menu_name' => __( 'Založniki' ),
  ); 

  register_taxonomy('zaloznik','druzabneigre',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'zaloznik' ),
  ));
  
   $labels = array(
    'name' => _x( 'Jeziki', 'taxonomy general name' ),
    'singular_name' => _x( 'Jezik', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Writers' ),
    'popular_items' => __( 'Popular Writers' ),
    'all_items' => __( 'All Writers' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Writer' ), 
    'update_item' => __( 'Update Writer' ),
    'add_new_item' => __( 'Add New Writer' ),
    'new_item_name' => __( 'New Writer Name' ),
    'separate_items_with_commas' => __( 'Separate writers with commas' ),
    'add_or_remove_items' => __( 'Add or remove writers' ),
    'choose_from_most_used' => __( 'Choose from the most used writers' ),
    'menu_name' => __( 'Jeziki' ),
  ); 

  register_taxonomy('jezik','druzabneigre',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'jezik' ),
  ));
}


	

################################################################################
// DODAJANJE STOLPCEV
################################################################################	
	
add_filter('manage_edit-druzabneigre_columns', 'add_new_druzabneigre_columns');

function add_new_druzabneigre_columns($druzabneigre_columns) {
		$new_columns['cb'] = '<input type="checkbox" />';

		$new_columns['title'] = _x('Družabna igra', 'column name');
		$new_columns['thumbnail'] = __('Slika');

		$new_columns['stevilo_igralcev'] = __('Število igralcev');
		$new_columns['cas_igranja'] = __('Čas igranja');
		$new_columns['starost'] = __('Starost');
		$new_columns['leto_izdaje'] = __('Leto izdaje');
		$new_columns['jezik'] = __('jezik');

		$new_columns['zaloznik'] = __('Založniki');
		$new_columns['vrsta_igre'] = __('Vrsta igre');

		$new_columns['author'] = __('Avtor');
		$new_columns['comments'] = __('Komentarji');
 
		$new_columns['date'] = _x('Datum', 'column name');
 
		return $new_columns;
	}	
	
	add_action( 'manage_druzabneigre_posts_custom_column', 'devpress_manage_druzabneigre_columns', 10, 2 );

function devpress_manage_druzabneigre_columns( $column, $post_id ) {
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
			
		case 'jezik' :
			$terms = get_the_terms( $post_id, 'jezik' );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'jezik' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'jezik', 'display' ) )
					);
				}
				echo join( ', ', $out );
			}
			else {
				_e( 'Ni jezikov' );
			}

			break;		
	
		case 'zaloznik' :
			$terms = get_the_terms( $post_id, 'zaloznik' );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'zaloznik' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'zaloznik', 'display' ) )
					);
				}
				echo join( ', ', $out );
			}
			else {
				_e( 'Ni založnikov' );
			}

			break;	
			
		case 'vrsta_igre' :
			$terms = get_the_terms( $post_id, 'vrsta_igre' );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'vrsta_igre' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'vrsta_igre', 'display' ) )
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
	add_filter( 'manage_druzabneigre_columns', 'fb_AddThumbColumn' );
	add_action( 'manage_druzabneigre_custom_column', 'fb_AddThumbValue', 10, 2 );

################################################################################
// SORTIRANJE
################################################################################	
	
add_filter( 'manage_edit-druzabneigre_sortable_columns', 'devpress_druzabneigre_sortable_steviloigralcev_columns' );

function devpress_druzabneigre_sortable_steviloigralcev_columns( $columns ) {

	$columns['stevilo_igralcev'] = 'steviloigralcev';
	return $columns;
}

add_filter( 'manage_edit-druzabneigre_sortable_columns', 'devpress_druzabneigre_sortable_casigranja_columns' );

function devpress_druzabneigre_sortable_casigranja_columns( $columns ) {

	$columns['cas_igranja'] = 'casigranja';
	return $columns;
}

add_filter( 'manage_edit-druzabneigre_sortable_columns', 'devpress_druzabneigre_sortable_starost_columns' );

function devpress_druzabneigre_sortable_starost_columns( $columns ) {

	$columns['starost'] = 'starost';
	return $columns;
}

add_filter( 'manage_edit-druzabneigre_sortable_columns', 'devpress_druzabneigre_sortable_letoizdaje_columns' );

function devpress_druzabneigre_sortable_letoizdaje_columns( $columns ) {

	$columns['leto_izdaje'] = 'letoizdaje';
	return $columns;
}

add_filter( 'manage_edit-druzabneigre_sortable_columns', 'devpress_druzabneigre_sortable_jezik_columns' );

function devpress_druzabneigre_sortable_jezik_columns( $columns ) {

	$columns['jezik'] = 'jezik';
	return $columns;
}

add_filter( 'manage_edit-druzabneigre_sortable_columns', 'devpress_druzabneigre_sortable_zalozniki_columns' );

function devpress_druzabneigre_sortable_zalozniki_columns( $columns ) {

	$columns['zaloznik'] = 'zaloznik';
	return $columns;
}

add_filter( 'manage_edit-druzabneigre_sortable_columns', 'devpress_druzabneigre_sortable_vrste_iger_columns' );

function devpress_druzabneigre_sortable_vrste_iger_columns( $columns ) {

	$columns['vrsta_igre'] = 'vrsta_igre';
	return $columns;
}

################################################################################
// DODAJANJE CUSTOM FIELDS
################################################################################	

add_action("admin_init", "admin_init");
 
function admin_init(){
  add_meta_box("Osnovni_podatki", "Osnovni podatki", "osnovni_podatki_meta", "druzabneigre", "side", "high");
  add_meta_box("opis_igre", "Opis igre", "opis_igre", "druzabneigre", "normal", "high");
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
	
add_action('init','get_oznake');
function get_oznake($taxonomy){
$terms = get_the_terms( $post_id, $taxonomy );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( 
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, $taxonomy, 'display' ) )
					);
				}
				echo join( ', ', $out );
			}
			else {
				_e( ' ' );
			}
}




	
	

?>