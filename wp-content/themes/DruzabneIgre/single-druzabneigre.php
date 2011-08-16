<?php get_header(); ?>

<section id="main-content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<header>
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php /*echo get_avatar(get_the_author_id() , '50'); */?>
					</header>
		<?php if(has_post_thumbnail()) {
							//the_post_thumbnail();?>
							<a class="slika" align="center" href="<?php the_permalink() ?>" ><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&w=350&zc=1" alt="<?php the_title(); ?>"></a>
						<?php } ?>
						<h4>Osnovni podatki:</h4>
		<ul>
										<li>Število igralcev: <?php echo get_post_meta( $post->ID, 'stevilo_igralcev', true ); ?></li>
										<li>Čas igranja: <?php echo get_post_meta( $post->ID, 'cas_igranja', true ); ?></li>
										<li>Starost: <?php echo get_post_meta( $post->ID, 'starost', true ); ?></li>
										<li>Leto izdaje: <?php echo get_post_meta( $post->ID, 'leto_izdaje', true ); ?></li>
										<li>Založnik:  <?php echo get_the_term_list( $post->ID, 'zaloznik', '', ',', '' ); ?></li>
										<li>Vrsta igre: <?php echo get_the_term_list( $post->ID, 'vrsta_igre', '', ', ', '' );  ?></li>
										<li>Jezik: <?php echo get_the_term_list( $post->ID, 'jezik', '', ',', '' ); ?></li>
									</ul>
						
						
						<?php if(get_post_meta( $post->ID, 'znacilnosti_igre', true )!=''){ ?>
						<h4>Značilnosti igre</h4>
								<?php echo get_post_meta( $post->ID, 'znacilnosti_igre', true );} ?> 
						
						<?php if(get_post_meta( $post->ID, 'cilj_igre', true )!=''){ ?>
						<h4>Cilj igre</h4>
								<?php echo get_post_meta( $post->ID, 'cilj_igre', true );} ?>
								
						<?php $Arets_Spel = get_post_meta( $post->ID, 'Årets_Spel', true );
							  $Spiel_des_Jahres = get_post_meta( $post->ID, 'Spiel_des_Jahres', true );
							  $BGG = get_post_meta( $post->ID, 'BGG', true );
							  $IGA = get_post_meta( $post->ID, 'IGA', true );
							  $Spiel_der_Spiele = get_post_meta( $post->ID, 'Spiel_der_Spiele', true );
							  $Deutscher_spiele_preis = get_post_meta( $post->ID, 'Deutscher_spiele_preis', true );?>
						
						<?php if($Arets_Spel!='' || $Spiel_des_Jahres!='' || $BGG != '' || $IGA != '' ){ ?>							
						<h4>Nagrade</h4>
						
						</br>
						<?php if($Spiel_des_Jahres!='') { ?> 
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/spiel-des-jahres.png&h=110&zc=1"> <?php } ?>
						<?php if($Arets_Spel!='') { ?> 
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/Arets-Spel.png&h=110&zc=1"> <?php } ?>
						<?php if($BGG!='') { ?> 
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/BGG.png&h=110&zc=1"> <?php } ?>
						<?php if($IGA!='') { ?> 
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/IGA.png&h=110&zc=1"> <?php } ?>
						<?php if($Spiel_der_Spiele!='') { ?> 
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/Spiel-der-Spiele.png&h=110&zc=1"> <?php } ?>
						<?php if($Deutscher_spiele_preis!='') { ?> 
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/Deutscher_spiele_preis.png&h=110&zc=1"> <?php } ?>
						
						
						<?php }?>
						
						<?php if(get_post_meta( $post->ID, 'vsebina_skatle', true )!=''){ ?>
						<h4>Vsebina škatle</h4>
								<?php echo get_post_meta( $post->ID, 'vsebina_skatle', true );} ?>
								
						<?php if(get_post_meta( $post->ID, 'galerija', true )!=''){ ?>
						
							
					<div id="gallery" class="ad-gallery">
						  <div class="ad-image-wrapper">
						  </div>
						  <div class="ad-controls">
						  </div>
						  <div class="ad-nav">
							<div class="ad-thumbs">
							  <ul class="ad-thumb-list">
							  <?php $url = get_bloginfo('url');
									$data = file($url. '/' .get_post_meta( $post->ID, 'mapa', true ) . '/data.txt');
									
									
									while($i<get_post_meta( $post->ID, 'stSlik', true )){foreach($data as $value) { ?>
								<li>
								  <a href="<?php bloginfo('url');?><?php echo '/' .get_post_meta( $post->ID, 'mapa', true ); ?>/<?php echo ($i+1) ?>.jpg">
									<img src="<?php bloginfo('url');?><?php echo '/' .get_post_meta( $post->ID, 'mapa', true ); ?>/thumbs/t<?php echo ($i+1) ?>.jpg" alt="<?php echo $value ?>">
								  </a>
								</li>
							  <?php $i++; }}?>
								
							  </ul>
							</div>
						  </div>
						</div>
						
						<?php } ?>
						
						<video width="640" height="360" src="http://www.youtube.com/watch?v=17DPJHNVx2Q" autobuffer>
 <br>You must have an HTML5 capable browser.
							</video>
							
		
		
		<?php if(get_post_meta( $post->ID, 'mnenje_avtorja', true )!=''){ ?>
		<h4>Avtorjevo mnenje</h4>
								<?php echo get_post_meta( $post->ID, 'mnenje_avtorja', true ); }?>
		
		<footer>
			<p><time datetime="<?php the_time('Y-m-d')?>"><?php the_time('M j, Y') ?></time> <span class="author"> Avtor: <?php /*echo get_avatar(get_the_author_id() , '50'); */?><?php the_author() ?></span> <?php if ( comments_open() ) : ?><a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%'); ?></a><?php endif; ?></p>

		</footer>
	</article>
	
	<?php comments_template(); ?>
	
<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>