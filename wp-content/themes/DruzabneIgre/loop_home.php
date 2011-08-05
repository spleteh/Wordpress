

<?php 
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		 query_posts( array(
		'post_type' => array(
					'post',
					'druzabneigre'
				),
				'paged' => $paged ) // for paging links to work
			);
if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="postBox ">
				<div class="postBoxInner">
						<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<header>
							<center>
							<?php
						if(has_post_thumbnail()) {
							?>
							<a href="<?php the_permalink() ?>" ><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&h=255&q=100"  alt="<?php the_title(); ?>" align="top"></a>
						<?php } ?>
						</center>
							
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<?php wp_gdsr_render_article(); ?>
								<?php if(get_post_type($post->ID)=='druzabneigre'){ ?>
								</header>
									<ul class="post-meta">
										<li>Število igralcev: <?php echo get_post_meta( $post->ID, 'stevilo_igralcev', true ); ?></li>
										<li>Čas igranja: <?php echo get_post_meta( $post->ID, 'cas_igranja', true ); ?></li>
										<li>Starost: <?php echo get_post_meta( $post->ID, 'starost', true ); ?></li>
										<li>Leto izdaje: <?php echo get_post_meta( $post->ID, 'leto_izdaje', true ); ?></li>
										<li>Založnik:  <?php echo get_the_term_list( $post->ID, 'zaloznik', '', ',', '' ); ?></li>
										<!--<li>Vrsta igre: <?php echo get_oznake('vrsta_igre');  ?></li>-->
										<li>Vrsta igre: <?php echo get_the_term_list( $post->ID, 'vrsta_igre', '', ', ', '' );  ?></li>
										<li>Jezik: <?php echo get_the_term_list( $post->ID, 'jezik', '', ',', '' ); ?></li>
									</ul>

								
								<footer>
								<a href="<?php the_permalink() ?>" class="more-link">Več &raquo;</a>
								<p class="author"> <?php the_author_link(); ?> </p>
								<time datetime="<?php the_time('Y-m-d')?>"><?php the_time('M j, Y') ?></time>   			
								<div class="comments-link">
									<?php if ( comments_open() ) : ?><a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%'); ?></a><?php endif; ?>
								</div>								
								</footer>
								<?php } else { ?>
							</header>
							
							<?php the_content(''); ?>

							<footer>
								<p><time datetime="<?php the_time('Y-m-d')?>"><?php the_time('M j, Y') ?></time> <span class="author">by <?php the_author() ?></span>. 
								<div class="comments-link <?php if(has_post_thumbnail()){ echo 'slika';}?>">
									<?php if ( comments_open() ) : ?><a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%'); ?></a><?php endif; ?>
								</div>
								<span class="category">Posted in <?php if (function_exists('parentless_categories')) parentless_categories(','); else the_category( ', ', 'multiple' ); ?></span>
								<?php the_tags('<span class="tags">Tagged as ', ', ', '</span>'); ?>
							</footer>
							<?php } ?>
							
						</article>
				</div>
			</div>
<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php if (show_posts_nav()) : ?>
<nav class="paging">
	<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else : ?>
		<div class="prev"><?php next_posts_link('&laquo; Previous Posts') ?></div>
		<div class="next"><?php previous_posts_link('Next Posts &raquo;') ?></div>
	<?php endif; ?>
</nav>
<?php endif; ?>