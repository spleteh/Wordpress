<?php get_header(); ?>

<section id="main-content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<header>
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p><time datetime="<?php the_time('Y-m-d')?>">Posted <?php the_time('F jS, Y') ?></time> <span class="author">by <?php the_author() ?></span>. <?php if ( comments_open() ) : ?><a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a><?php endif; ?></p>
		</header>
		<?php if(has_post_thumbnail()) {
							//the_post_thumbnail();?>
							<a class="slika" align="center" href="<?php the_permalink() ?>" ><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&w=350&zc=1" alt="<?php the_title(); ?>"></a>
						<?php } ?>
						<h3>Osnovni podatki:</h3>
		<ul class="post-metaFull">
										<li>Število igralcev: <?php echo get_post_meta( $post->ID, 'stevilo_igralcev', true ); ?></li>
										<li>Čas igranja: <?php echo get_post_meta( $post->ID, 'cas_igranja', true ); ?></li>
										<li>Starost: <?php echo get_post_meta( $post->ID, 'starost', true ); ?></li>
										<li>Leto izdaje: <?php echo get_post_meta( $post->ID, 'leto_izdaje', true ); ?></li>
										<li>Založnik:  <?php echo get_the_term_list( $post->ID, 'zaloznik', '', ',', '' ); ?></li>
										<li>Vrsta igre: <?php echo get_the_term_list( $post->ID, 'vrsta_igre', '', ', ', '' );  ?></li>
										<li>Jezik: <?php echo get_the_term_list( $post->ID, 'jezik', '', ',', '' ); ?></li>
									</ul>
		<div class="opisIgre">					
						<h3>O igri</h3>
								<?php echo get_post_meta( $post->ID, 'o_igri', true ); ?> 
		
						<h3>Cilj igre</h3>
								<?php echo get_post_meta( $post->ID, 'cilj_igre', true ); ?>
						
						<h3>Vsebina škatle</h3>
								<?php echo get_post_meta( $post->ID, 'vsebina_skatle', true ); ?> 
		
		</div>
		
		<footer>
			
		</footer>
	</article>
	
	<?php comments_template(); ?>
	
<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>