<?php get_header(); ?>

<section id="main-content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<header>
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
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
						
						
						
						<h4>O igri</h4>
								<?php echo get_post_meta( $post->ID, 'o_igri', true ); ?> 
		
						<h4>Cilj igre</h4>
								<?php echo get_post_meta( $post->ID, 'cilj_igre', true ); ?>
								
						<?php $Arets_Spel = get_post_meta( $post->ID, 'Årets_Spel', true );
							  $Spiel_des_Jahres = get_post_meta( $post->ID, 'Spiel_des_Jahres', true );?>
						<?php if($Arets_Spel!=''|| $Spiel_des_Jahres!=''){ ?>							
						<h4>Nagrade</h4>
						<?php $Årets_Spel = get_post_meta( $post->ID, 'Årets_Spel', true );
							$Spiel_des_Jahres = get_post_meta( $post->ID, 'Spiel_des_Jahres', true );?>
						</br>
						<?php if($Spiel_des_Jahres=='Spiel des Jahres') { ?> 
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/spiel-des-jahres-logo.png&h=110&zc=1"> <?php } ?>
						<?php if($Arets_Spel=='Årets Spel') { ?> 
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php bloginfo('template_directory'); ?>/images/Arets-Spel.jpg&h=110&zc=1"> <?php } }?>
						
						<h4>Vsebina škatle</h4>
								<?php echo get_post_meta( $post->ID, 'vsebina_skatle', true ); ?> 
		
		
		
		<h4>Avtorjevo mnenje</h4>
								<?php echo get_post_meta( $post->ID, 'mnenje_avtorja', true ); ?>
		
		<footer>
			<p><time datetime="<?php the_time('Y-m-d')?>"><?php the_time('M j, Y') ?></time> <span class="author"> <?php the_author() ?></span> <?php if ( comments_open() ) : ?><a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%'); ?></a><?php endif; ?></p>

		</footer>
	</article>
	
	<?php comments_template(); ?>
	
<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>