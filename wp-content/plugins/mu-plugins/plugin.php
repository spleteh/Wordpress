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
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => false,
		'menu_position' => 5, 
		'has_archive' => 'true', 
		'supports' => array('title','comments','thumbnail','author','custom-field'),
	);
	register_post_type( 'druzabneigre', $args );
	
}



################################################################################
// TAXONOMIES
################################################################################


add_action( 'init', 'create_druzabneigre_taxonomies', 0 );


function create_druzabneigre_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Kategorije', 'taxonomy general name' ),
    'singular_name' => _x( 'Kategorija', 'taxonomy singular name' ),
    'search_items' =>  __( 'Išči kategorijo' ),
    'all_items' => __( 'Vse kategorije' ),
    'parent_item' => __( 'Starš kategorije' ),
    'parent_item_colon' => __( 'Starš kategorije:' ),
    'edit_item' => __( 'Uredi kategorijo' ), 
    'update_item' => __( 'Shrani kategorijo' ),
    'add_new_item' => __( 'Dodaj novo kategorijo' ),
    'new_item_name' => __( 'Ime nove kategorije' ),
    'menu_name' => __( 'Kategorije' ),
  ); 	

  register_taxonomy('kategorija',array('druzabneigre'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true
  ));
  
  
    $labels = array(
    'name' => _x( 'Število igralcev', 'taxonomy general name' ),
    'singular_name' => _x( 'Število igralcev', 'taxonomy singular name' ),
    'search_items' =>  __( 'Išči' ),
    'all_items' => __( 'Vse' ),
    'parent_item' => __( 'Parent' ),
    'parent_item_colon' => __( 'Parent' ),
    'edit_item' => __( 'Uredi število igralcev' ), 
    'update_item' => __( 'Shrani število igralcev' ),
    'add_new_item' => __( 'Dodaj novo' ),
    'new_item_name' => __( 'Novo število igralcev' ),
    'menu_name' => __( 'Število igralcev' ),
  ); 	

  register_taxonomy('igralci',array('druzabneigre'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true
  ));
  


  // Add new taxonomy, NOT hierarchical (like tags)
  
  // ZALOŽNIKI-------------------------------------------------------
  $labels = array(
    'name' => _x( 'Založniki', 'taxonomy general name' ),
    'singular_name' => _x( 'Založnik', 'taxonomy singular name' ),
    'search_items' =>  __( 'Išči založnika' ),
    'popular_items' => __( 'Popularni založniki' ),
    'all_items' => __( 'Vsi založniki' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Uredi založnika' ), 
    'update_item' => __( 'Shrani založnika' ),
    'add_new_item' => __( 'Dodaj novega založnika' ),
    'new_item_name' => __( 'Ime novega založnika' ),
    'separate_items_with_commas' => __( 'razdelite z vejico' ),
    'add_or_remove_items' => __( 'Dodaj ali odstrani založnika' ),
    'choose_from_most_used' => __( 'Izberi med najbolj pogostimi založniki' ),
    'menu_name' => __( 'Založniki' ),
  ); 

  register_taxonomy('zaloznik','druzabneigre',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' =>true
  ));
  
  //JEZIKI---------------------------------------------------------
  
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
    'rewrite' => true
  ));
  
  //AVTORJI----------------------------------------------------
  
   $labels = array(
    'name' => _x( 'Avtorji', 'taxonomy general name' ),
    'singular_name' => _x( 'Avtor', 'taxonomy singular name' ),
    'search_items' =>  __( 'Išči avtorja' ),
    'popular_items' => __( 'Popularni avtorji' ),
    'all_items' => __( 'Vsi avtorji' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Uredi avtorja' ), 
    'update_item' => __( 'Shrani avtorja' ),
    'add_new_item' => __( 'Dodaj novega avtorja' ),
    'new_item_name' => __( 'Ime novega avtorja' ),
    'separate_items_with_commas' => __( 'razdelite z vejico' ),
    'add_or_remove_items' => __( 'Dodaj ali odstrani avtorja' ),
    'choose_from_most_used' => __( 'Izberi med najbolj pogostimi avtorji' ),
    'menu_name' => __( 'Avtorji' ),
  ); 

  register_taxonomy('avtor','druzabneigre',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true
  ));
  
   //ILUSTRATORJI----------------------------------------------------
  
    $labels = array(
    'name' => _x( 'Ilustratorji', 'taxonomy general name' ),
    'singular_name' => _x( 'Ilustrator', 'taxonomy singular name' ),
    'search_items' =>  __( 'Išči ilustratorja' ),
    'popular_items' => __( 'Popularni ilustratorji' ),
    'all_items' => __( 'Vsi ilustratorji' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Uredi ilustratorja' ), 
    'update_item' => __( 'Shrani ilustratorja' ),
    'add_new_item' => __( 'Dodaj novega ilustratorja' ),
    'new_item_name' => __( 'Ime novega ilustratorja' ),
    'separate_items_with_commas' => __( 'razdelite z vejico' ),
    'add_or_remove_items' => __( 'Dodaj ali odstrani ilustratorja' ),
    'choose_from_most_used' => __( 'Izberi med najbolj pogostimi ilustratorji' ),
    'menu_name' => __( 'Ilustratorji' ),
  ); 

  register_taxonomy('ilustrator','druzabneigre',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true
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

		$new_columns['igralci'] = __('Število igralcev');
		$new_columns['cas_igranja'] = __('Čas igranja');
		$new_columns['starost'] = __('Starost');
		$new_columns['leto_izdaje'] = __('Leto izdaje');
		$new_columns['jezik'] = __('jezik');

		$new_columns['zaloznik'] = __('Založniki');
		$new_columns['avtor'] = __('Avtor');
		$new_columns['ilustrator'] = __('Ilustrator');
		$new_columns['kategorija'] = __('Vrsta igre');

		$new_columns['author'] = __('Avtor');
		$new_columns['comments'] = __('Komentarji');
 
		$new_columns['date'] = _x('Datum', 'column name');
 
		return $new_columns;
	}	
	
	add_action( 'manage_druzabneigre_posts_custom_column', 'devpress_manage_druzabneigre_columns', 10, 2 );

function devpress_manage_druzabneigre_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

			
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
			
			case 'avtor' :
			$terms = get_the_terms( $post_id, 'avtor' );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'avtor' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'avtor', 'display' ) )
					);
				}
				echo join( ', ', $out );
			}
			else {
				_e( 'Brez' );
			}

			break;	
			
		case 'kategorija' :
			$terms = get_the_terms( $post_id, 'kategorija' );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'kategorija' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'kategorija', 'display' ) )
					);
				}
				echo join( ', ', $out );
			}
			else {
				_e( 'Ni vrste iger' );
			}

			break;
			
		case 'igralci' :
			$terms = get_the_terms( $post_id, 'igralci' );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'igralci' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'igralci', 'display' ) )
					);
				}
				echo join( ', ', $out );
			}
			else {
				_e( 'Brez' );
			}

			break;	


		default :
			break;
	}
}
################################################################################
// SLIKA
################################################################################
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
	
add_filter( 'manage_edit-druzabneigre_sortable_columns', 'devpress_druzabneigre_sortable_igralci_columns' );

function devpress_druzabneigre_sortable_igralci_columns( $columns ) {

	$columns['stevilo_igralcev'] = 'igralci';
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

	$columns['kategorija'] = 'kategorija';
	return $columns;
}


################################################################################
// DODAJANJE CUSTOM FIELDS
################################################################################	

add_action("admin_init", "admin_init");
 
function admin_init(){
  add_meta_box("Osnovni_podatki", "Osnovni podatki", "osnovni_podatki_meta", "druzabneigre", "normal", "high");
  add_meta_box("opis_igre", "Opis igre", "opis_igre", "druzabneigre", "normal", "high");
  add_meta_box("mnenja", "Mnenja", "mnenja", "druzabneigre", "normal", "high");
  add_meta_box("izgled", "Izgled", "izgled", "druzabneigre", "normal", "low");
  add_meta_box("nagrade", "Nagrade", "nagrade", "druzabneigre", "normal", "high");
  add_meta_box("galerija", "Galerija", "galerija", "druzabneigre", "normal", "high");
  
  
}
 
 
function osnovni_podatki_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $stevilo_igralcev = $custom["stevilo_igralcev"][0];
  $cas_igranja = $custom["cas_igranja"][0];
  $starost = $custom["starost"][0];
  $leto_izdaje = $custom["leto_izdaje"][0];
  ?>
  <p><label>Čas igranja:</label>
  <input size="1" name="cas_igranja" value="<?php echo $cas_igranja; ?> " /> minut</p>
  <p><label>Starost:</label>
  <input size="1" name="starost" value="<?php echo $starost; ?>" />+</p>
  <p><label>Leto izdaje:</label>
  <input size="3" name="leto_izdaje" value="<?php echo $leto_izdaje; ?>" /></p>
  <?php
}

function opis_igre(){
	global $post;
	$custom = get_post_custom($post->ID);
	$znacilnosti_igre = $custom["znacilnosti_igre"][0];
	$cilj_igre = $custom["cilj_igre"][0];
	$vsebina_skatle = $custom["vsebina_skatle"][0];
	$potek_igre = $custom["potek_igre"][0];
	?>
	<p><label>Značilnosti igre:</label><br />
	<textarea cols="80" rows="10" name="znacilnosti_igre"><?php echo $znacilnosti_igre; ?></textarea></p>
	<p><label>Cilj igre:</label><br />
	<textarea cols="80" rows="10" name="cilj_igre"><?php echo $cilj_igre; ?></textarea></p>
	<p><label>Vsebina škatle:</label><br />
	<textarea cols="80" rows="10" name="vsebina_skatle"><?php echo $vsebina_skatle; ?></textarea></p>
	<p><label>Potek igre:</label><br />
	<textarea cols="80" rows="10" name="potek_igre"><?php echo $potek_igre; ?></textarea></p>
  <?php
}

function mnenja(){
	global $post;
	$custom = get_post_custom($post->ID);
	$mnenje_avtorja = $custom["mnenje_avtorja"][0];
	?>
	<p><label>Mnenje avtorja:</label><br />
	<textarea cols="80" rows="10" name="mnenje_avtorja"><?php echo $mnenje_avtorja; ?></textarea></p>
	
  <?php
}

 
function izgled() {
  global $post;
  $custom = get_post_custom($post->ID);
  
  $margin = $custom["margin"][0];
  ?>
  <p><label>Margin:</label>
  <input name="margin" value="<?php echo $margin; ?>" /></p>
 
  <?php
}

 
function nagrade() {
  global $post;
  $custom = get_post_custom($post->ID);
  
  $Spiel_des_Jahres = $custom["Spiel_des_Jahres"][0];
  $Årets_Spel = $custom["Årets_Spel"][0];
  $BGG = $custom["BGG"][0];
  $IGA = $custom["IGA"][0];
  $Deutscher_spiele_preis = $custom["Deutscher_spiele_preis"][0];
  $Spiel_der_Spiele = $custom["Spiel_der_Spiele"][0];
  ?>
  <p>
  <label><img src="../wp-content/themes/DruzabneIgre/images/nagrade/spiel-des-jahres.png" width="64" ></label>
  <input size="1" name="Spiel_des_Jahres" value="<?php echo $Spiel_des_Jahres; ?>"> Spiel des Jahres
  
  <label><img src="../wp-content/themes/DruzabneIgre/images/nagrade/Arets-Spel.png" width="64" height="64"></label>
  <input size="1" name="Årets_Spel" value="<?php echo $Årets_Spel; ?>"> Årets Spel
  <label><img src="../wp-content/themes/DruzabneIgre/images/nagrade/BGG.png" width="64" height="64"></label>
  <input size="1" name="BGG" value="<?php echo $BGG; ?>"> BGG Golden Geek </p><p>
  <label><img src="../wp-content/themes/DruzabneIgre/images/nagrade/IGA.png" width="64" height="64"></label>
  <input size="1" name="IGA" value="<?php echo $IGA; ?>"> International Gamers Awards
  <label><img src="../wp-content/themes/DruzabneIgre/images/nagrade/Deutscher_spiele_preis.png" width="64" height="64"></label>
  <input size="1" name="Deutscher_spiele_preis" value="<?php echo $Deutscher_spiele_preis; ?>"> Deutscher spiele preisk
  <label><img src="../wp-content/themes/DruzabneIgre/images/nagrade/Spiel-der-Spiele.png" width="64" height="64"></label>
  <input size="1" name="Spiel_der_Spiele" value="<?php echo $Spiel_der_Spiele; ?>"> Spiel der Spiele</p>
  

  <?php $i=0;
}

function galerija() {
  global $post;
  $custom = get_post_custom($post->ID);
  
  $galerija = $custom["galerija"][0];
  $mapa = $custom["mapa"][0];
  $stSlik = $custom["stSlik"][0];

  ?>
  <p>
  <label>Galerija</label>
  <input size="1" name="galerija" value="<?php echo $galerija; ?>"> </p>
  <p>
  <label>Mapa</label>
  <input name="mapa" value="<?php echo $mapa; ?>"></p>
  <label>Število slik</label>
  <input name="stSlik" value="<?php echo $stSlik; ?>"></p>

  
  

  <?php
}


add_action('save_post', 'save_details');
function save_details(){
  global $post;
 
  update_post_meta($post->ID, "leto_izdaje", $_POST["leto_izdaje"]);
  update_post_meta($post->ID, "stevilo_igralcev", $_POST["stevilo_igralcev"]);
  update_post_meta($post->ID, "cas_igranja", $_POST["cas_igranja"]);
  update_post_meta($post->ID, "starost", $_POST["starost"]);
  update_post_meta($post->ID, "znacilnosti_igre", $_POST["znacilnosti_igre"]);
  update_post_meta($post->ID, "cilj_igre", $_POST["cilj_igre"]);
  update_post_meta($post->ID, "vsebina_skatle", $_POST["vsebina_skatle"]);
  update_post_meta($post->ID, "potek_igre", $_POST["potek_igre"]);
  update_post_meta($post->ID, "mnenje_avtorja", $_POST["mnenje_avtorja"]);
  /*NAGRADE*/
  update_post_meta($post->ID, "Spiel_des_Jahres", $_POST["Spiel_des_Jahres"]);
  update_post_meta($post->ID, "Årets_Spel", $_POST["Årets_Spel"]);
  update_post_meta($post->ID, "BGG", $_POST["BGG"]);
  update_post_meta($post->ID, "IGA", $_POST["IGA"]);
  update_post_meta($post->ID, "Deutscher_spiele_preis", $_POST["Deutscher_spiele_preis"]);
  update_post_meta($post->ID, "Spiel_der_Spiele", $_POST["Spiel_der_Spiele"]);
  /*GALERIJA*/
  update_post_meta($post->ID, "galerija", $_POST["galerija"]);
  update_post_meta($post->ID, "mapa", $_POST["mapa"]);
  update_post_meta($post->ID, "stSlik", $_POST["stSlik"]);
  update_post_meta($post->ID, "margin", $_POST["margin"]);
}

add_action('init','init');
function init(){
// add to our plugin init function
global $wp_rewrite;

$druzabneigre_structure = '%druzabneigre%';
$wp_rewrite->add_rewrite_tag("%druzabneigre%", '([^/]+)', "druzabneigre=");
$wp_rewrite->add_permastruct('druzabneigre', $druzabneigre_structure, false);
// Add filter to plugin init function
add_filter('post_type_link', 'druzabneigre_permalink', 10, 3);}	
// Adapted from get_permalink function in wp-includes/link-template.php
function druzabneigre_permalink($permalink, $post_id, $leavename) {
	$post = get_post($post_id);
	$rewritecode = array(
		'%year%',
		'%monthnum%',
		'%day%',
		'%hour%',
		'%minute%',
		'%second%',
		$leavename? '' : '%postname%',
		'%post_id%',
		'%category%',
		'%author%',
		$leavename? '' : '%pagename%',
	);
 
	if ( '' != $permalink && !in_array($post->post_status, array('draft', 'pending', 'auto-draft')) ) {
		$unixtime = strtotime($post->post_date);
 
		$category = '';
		if ( strpos($permalink, '%category%') !== false ) {
			$cats = get_the_category($post->ID);
			if ( $cats ) {
				usort($cats, '_usort_terms_by_ID'); // order by ID
				$category = $cats[0]->slug;
				if ( $parent = $cats[0]->parent )
					$category = get_category_parents($parent, false, '/', true) . $category;
			}
			// show default category in permalinks, without
			// having to assign it explicitly
			if ( empty($category) ) {
				$default_category = get_category( get_option( 'default_category' ) );
				$category = is_wp_error( $default_category ) ? '' : $default_category->slug;
			}
		}
 
		$author = '';
		if ( strpos($permalink, '%author%') !== false ) {
			$authordata = get_userdata($post->post_author);
			$author = $authordata->user_nicename;
		}
 
		$date = explode(" ",date('Y m d H i s', $unixtime));
		$rewritereplace =
		array(
			$date[0],
			$date[1],
			$date[2],
			$date[3],
			$date[4],
			$date[5],
			$post->post_name,
			$post->ID,
			$category,
			$author,
			$post->post_name,
		);
		$permalink = str_replace($rewritecode, $rewritereplace, $permalink);
	} else { // if they're not using the fancy permalink option
	}
	return $permalink;
}

/*******************************
 EXCERPT LENGTH ADJUST
********************************/

function wpe_excerptlength_featured($length) {
    return 40;
}
function wpe_excerptlength_index($length) {
    return 60;
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

/*******************************
 PAGINATION
********************************
 * Retrieve or display pagination code.
 *
 * The defaults for overwriting are:
 * 'page' - Default is null (int). The current page. This function will
 *      automatically determine the value.
 * 'pages' - Default is null (int). The total number of pages. This function will
 *      automatically determine the value.
 * 'range' - Default is 3 (int). The number of page links to show before and after
 *      the current page.
 * 'gap' - Default is 3 (int). The minimum number of pages before a gap is 
 *      replaced with ellipses (...).
 * 'anchor' - Default is 1 (int). The number of links to always show at begining
 *      and end of pagination
 * 'before' - Default is '<div class="emm-paginate">' (string). The html or text 
 *      to add before the pagination links.
 * 'after' - Default is '</div>' (string). The html or text to add after the
 *      pagination links.
 * 'title' - Default is '__('Pages:')' (string). The text to display before the
 *      pagination links.
 * 'next_page' - Default is '__('&raquo;')' (string). The text to use for the 
 *      next page link.
 * 'previous_page' - Default is '__('&laquo')' (string). The text to use for the 
 *      previous page link.
 * 'echo' - Default is 1 (int). To return the code instead of echo'ing, set this
 *      to 0 (zero).
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param array|string $args Optional. Override default arguments.
 * @return string HTML content, if not displaying.
 */
 
function emm_paginate($args = null) {
	$defaults = array(
		'page' => null, 'pages' => null, 
		'range' => 3, 'gap' => 3, 'anchor' => 1,
		'before' => '<div class="emm-paginate">', 'after' => '</div>',
		'title' => __(''),
		'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo'),
		'echo' => 1
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	if (!$page && !$pages) {
		global $wp_query;

		$page = get_query_var('paged');
		$page = !empty($page) ? intval($page) : 1;

		$posts_per_page = intval(get_query_var('posts_per_page'));
		$pages = intval(ceil($wp_query->found_posts / $posts_per_page));
	}
	
	$output = "";
	if ($pages > 1) {	
		$output .= "$before<span class='emm-title'>$title</span>";
		$ellipsis = "<span class='emm-gap'>...</span>";

		if ($page > 1 && !empty($previouspage)) {
			$output .= "<a href='" . get_pagenum_link($page - 1) . "' class='emm-prev'>$previouspage</a>";
		}
		
		$min_links = $range * 2 + 1;
		$block_min = min($page - $range, $pages - $min_links);
		$block_high = max($page + $range, $min_links);
		$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
		$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

		if ($left_gap && !$right_gap) {
			$output .= sprintf('%s%s%s', 
				emm_paginate_loop(1, $anchor), 
				$ellipsis, 
				emm_paginate_loop($block_min, $pages, $page)
			);
		}
		else if ($left_gap && $right_gap) {
			$output .= sprintf('%s%s%s%s%s', 
				emm_paginate_loop(1, $anchor), 
				$ellipsis, 
				emm_paginate_loop($block_min, $block_high, $page), 
				$ellipsis, 
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else if ($right_gap && !$left_gap) {
			$output .= sprintf('%s%s%s', 
				emm_paginate_loop(1, $block_high, $page),
				$ellipsis,
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else {
			$output .= emm_paginate_loop(1, $pages, $page);
		}

		if ($page < $pages && !empty($nextpage)) {
			$output .= "<a href='" . get_pagenum_link($page + 1) . "' class='emm-next'>$nextpage</a>";
		}

		$output .= $after;
	}

	if ($echo) {
		echo $output;
	}

	return $output;
}

/**
 * Helper function for pagination which builds the page links.
 *
 * @access private
 *
 * @author Eric Martin <eric@ericmmartin.com>
 * @copyright Copyright (c) 2009, Eric Martin
 * @version 1.0
 *
 * @param int $start The first link page.
 * @param int $max The last link page.
 * @return int $page Optional, default is 0. The current page.
 */
function emm_paginate_loop($start, $max, $page = 0) {
	$output = "";
	for ($i = $start; $i <= $max; $i++) {
		$output .= ($page === intval($i)) 
			? "<span class='emm-page emm-current'>$i</span>" 
			: "<a href='" . get_pagenum_link($i) . "' class='emm-page'>$i</a>";
	}
	return $output;
}

function post_is_in_descendant_category( $cats, $_post = null )
{
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}

function check_referrer() {
    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == “”) {
        wp_die( __('Please enable referrers in your browser, or, if you\'re a spammer, bugger off!') );
    }
}

add_action('check_comment_flood', 'check_referrer');

function post_type_tags_fix($request) {
    if ( isset($request['tag']) && !isset($request['post_type']) )
    $request['post_type'] = 'any';
    return $request;
} 
add_filter('request', 'post_type_tags_fix');
?>
