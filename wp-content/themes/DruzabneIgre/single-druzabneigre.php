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
<span class="slika">
							<a align="center" href="<?php the_permalink() ?>" ><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&w=350&zc=1" alt="<?php the_title(); ?>"></a>
						<?php } ?>
								
						<?php $Arets_Spel = get_post_meta( $post->ID, 'Årets_Spel', true );
							  $Spiel_des_Jahres = get_post_meta( $post->ID, 'Spiel_des_Jahres', true );
							  $BGG = get_post_meta( $post->ID, 'BGG', true );
							  $IGA = get_post_meta( $post->ID, 'IGA', true );
							  $Spiel_der_Spiele = get_post_meta( $post->ID, 'Spiel_der_Spiele', true );
							  $Deutscher_spiele_preis = get_post_meta( $post->ID, 'Deutscher_spiele_preis', true );
							  $st=0;?>
						
						<?php if($Arets_Spel!='' || $Spiel_des_Jahres!='' || $BGG != '' || $IGA != '' || $Spiel_der_Spiele!= '' ||  $Deutscher_spiele_preis!= '' ){ echo "</br></br>"; ?>							
						
						<?php if($Spiel_des_Jahres!='') { ?> 
						<img class="someClass" title="Spiel des Jahres" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/spiel-des-jahres.png&h=110&zc=1"> <?php $st++;} ?>
						<?php if($Arets_Spel!='') { ?> 
						<img class="someClass" title="Årets Spel" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/Arets-Spel.png&h=110&zc=1"> <?php $st++;} ?>
						<?php if($BGG!='') { ?> 
						<img class="someClass" title="BGG Golden Geek" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/BGG.png&h=110&zc=1"> <?php $st++;if($st==3) echo "</br>"; } ?>
						<?php if($IGA!='') { ?> 
						<img class="someClass" title="International Gamers Awards" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/IGA.png&h=110&zc=1"> <?php $st++;if($st==3) echo "</br>";} ?>
						<?php if($Spiel_der_Spiele!='') { ?> 
						<img class="someClass" title="Deutscher Spiele Preisk" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/Spiel-der-Spiele.png&h=110&zc=1"> <?php $st++;if($st==3) echo "</br>";} ?>
						<?php if($Deutscher_spiele_preis!='') { ?> 
						<img class="someClass" title="Spiel der Spiele" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/nagrade/Deutscher_spiele_preis.png&h=110&zc=1"> <?php $st++;} ?>
						
						
						
						
						<?php }?>
						</span>
						<h3>Osnovni podatki:</h3>
		<ul class="podatki">
										<li>Število igralcev: <?php echo get_the_term_list( $post->ID, 'igralci', '', ', ', '' );?></li>
										<li>Čas igranja: <?php echo get_post_meta( $post->ID, 'cas_igranja', true ); ?> minut</li>
										<li>Starost: <?php echo get_post_meta( $post->ID, 'starost', true ); ?> +</li>
										<li>Leto izdaje: <?php echo get_post_meta( $post->ID, 'leto_izdaje', true ); ?></li>
										<li>Založnik:  <?php echo get_the_term_list( $post->ID, 'zaloznik', '', ',', '' ); ?></li>
										<li>Vrsta igre: <?php echo get_the_term_list( $post->ID, 'kategorija', '', ', ', '' );  ?></li>
										<li>Jezik: <?php echo get_the_term_list( $post->ID, 'jezik', '', ',', '' ); ?></li>
										<li>Avtor: <?php echo get_the_term_list( $post->ID, 'avtor', '', ',', '' ); ?></li>
										<li>Ilustrator: <?php echo get_the_term_list( $post->ID, 'ilustrator', '', ',', '' ); ?></li>
									</ul>


						
						
						<?php if(get_post_meta( $post->ID, 'znacilnosti_igre', true )!=''){ ?>
						<h3>Značilnosti igre</h3>
						<ul class="podatki">
								<?php echo get_post_meta( $post->ID, 'znacilnosti_igre', true );} ?>
						</ul>
						
						<?php if(get_post_meta( $post->ID, 'cilj_igre', true )!=''){ ?>
						<h3>Cilj igre</h3>
								<?php echo get_post_meta( $post->ID, 'cilj_igre', true );} ?>
						
						
						<?php if(get_post_meta( $post->ID, 'potek_igre', true )!=''){ ?>
						<h3>Potek igre</h3>
						
								<?php echo get_post_meta( $post->ID, 'potek_igre', true );} ?>
						
						
						<?php if(get_post_meta( $post->ID, 'vsebina_skatle', true )!=''){ ?>
						<h3>Vsebina škatle</h3>
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
									$data = file($url. '/wp-content/druzabneigre/' .get_post_meta( $post->ID, 'mapa', true ) . '/data.txt');
									
									$i=0;
									while($i<get_post_meta( $post->ID, 'stSlik', true )){foreach($data as $value) { ?>
								<li>
								  <a href="<?php bloginfo('url');?><?php echo '/wp-content/druzabneigre/' .get_post_meta( $post->ID, 'mapa', true ); ?>/<?php echo ($i+1) ?>.jpg">
									<img src="<?php bloginfo('url');?><?php echo '/wp-content/druzabneigre/' .get_post_meta( $post->ID, 'mapa', true ); ?>/t/<?php echo ($i+1) ?>.jpg" alt="<?php echo $value ?>">
								  </a>
								</li>
							  <?php $i++; }}?>
								
							  </ul>
							</div>
						  </div>
						</div>
						
						<?php } ?>
						

						
						<?php if(get_post_meta( $post->ID, 'youtube', true )!=''){ ?>
						<center>
	<object class="youtube"><param name="movie" value="<?php echo get_post_meta( $post->ID, 'youtube', true )?>">
	<param name="allowFullScreen" value="true"><param name="allowScriptAccess" value="always">
	<embed src="<?php echo get_post_meta( $post->ID, 'youtube', true )?>" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="640" height="390">
	</object></center> <?php } ?>
						

						
		
		<?php if(get_post_meta( $post->ID, 'mnenje_avtorja', true )!=''){ ?>
		<h3>Avtorjevo mnenje</h3>
								<?php echo get_post_meta( $post->ID, 'mnenje_avtorja', true ); }?>
		<div class="progresBar">
		<span class="meterText">
		Sreča</span>
		<div class="meter">
		
				<span style="width: 90%"></span>
		</div>
		<span class="meterText">
		Strategija</span>
		<div class="meter red">
				<span style="width: 30%"></span>
		</div>
		<span class="meterText">
		Komunikacija</span>
		<div class="meter">
				<span style="width: 60%"><span></span></span>
		</div>
		
		<span class="meterText">
		Skupaj</span>
		<div class="meter">
				<span class="someClass" title="8/10" style="width: 80%"><span></span></span>
		</div>
		</div>
		

	
		
		<footer>
			<p><time datetime="<?php the_time('Y-m-d')?>"><?php the_time('M j, Y') ?></time> <span class="author"> Avtor: <?php /*echo get_avatar(get_the_author_id() , '50'); */?><?php the_author() ?></span> <?php if ( comments_open() ) : ?><a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%'); ?></a><?php endif; ?></p>

		</footer>
	</article>
	
	<?php comments_template(); ?>
	
<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>