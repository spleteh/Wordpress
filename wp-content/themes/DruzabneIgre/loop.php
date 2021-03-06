
<?php 

if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="postBox ">
				<div class="postBoxInner">
						<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<header>
							
							<?php
						if(has_post_thumbnail()) {
							?>
							<?php 

					$attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order') );
						foreach ( $attachments as $attachment_id => $attachment ) {
								$image_attributes = wp_get_attachment_image_src( $attachment_id ); // returns an array
									if($image_attributes[1]<$image_attributes[2]){ 
									?>
							<center>
							<a href="<?php the_permalink() ?>" ><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&h=240&q=100"  alt="<?php the_title(); ?>" align="top"></a>
							<?php } else if($image_attributes[1]>$image_attributes[2]){ ?>
							<center style="<?php echo get_post_meta( $post->ID, 'margin', true ); ?>">
							<a href="<?php the_permalink() ?>" ><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&w=240&q=100"  alt="<?php the_title(); ?>" align="top"></a>
							<?php }else if($image_attributes[1]==$image_attributes[2]){ ?>
							<center>
							<a href="<?php the_permalink() ?>" ><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&h=240&w=240&q=100"  alt="<?php the_title(); ?>" align="top"></a>
						<?php }}} ?>
						</center>
							
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

								<?php if(get_post_type($post->ID)=='druzabneigre'){ ?>
								</header>
								

									<ul class="post-meta">
										<li>Število igralcev: <?php echo get_post_meta( $post->ID, 'stevilo_igralcev', true ); ?></li>
										<li>Čas igranja: <?php echo get_post_meta( $post->ID, 'cas_igranja', true ); ?> minut</li>
										<li>Vrsta igre: <?php echo get_the_term_list( $post->ID, 'kategorija', '', ', ', '' );  ?></li>		
									</ul>

								
								<footer>
								<?php  if(function_exists('wp_gdsr_render_article')){wp_gdsr_render_article();} ?>	
								<a href="<?php the_permalink() ?>" class="more-link">Več &raquo;</a>
								<p class="author"> <?php the_author_link(); ?> </p>
								<time datetime="<?php the_time('Y-m-d')?>"><?php the_time('M j, Y') ?></time>   			
								<div class="comments-link">
									<?php if ( comments_open() ) : ?><a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%'); ?></a><?php endif; ?>
								</div>	
															
								</footer>
								<?php } else { ?>
							</header>
							
							<?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?>

							<footer>
								<a href="<?php the_permalink() ?>" class="more-link">Več &raquo;</a>
								<p class="author"> <?php the_author_link(); ?> </p>
								<time datetime="<?php the_time('Y-m-d')?>"><?php the_time('M j, Y') ?></time>   			
								<div class="comments-link">
									<?php if ( comments_open() ) : ?><a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%'); ?></a><?php endif; ?>
								</div>	
								<span class="category">Objavleno pod <?php if (function_exists('parentless_categories')) parentless_categories(','); else the_category( ', ', 'multiple' ); ?></span>
								<?php the_tags('<span class="tags">Tagi: ', ', ', '</span>'); ?>
							</footer>
							<?php } ?>
							
						</article>
				</div>
			</div>
<?php endwhile; else: ?>
	<p><?php _e('Oprostite, tukaj ni objav.'); ?></p>
<?php endif; ?>

<?php if (show_posts_nav()) : ?>
<nav class="paging">
	<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else : ?>
		<div class="prev"><?php next_posts_link('&laquo; Previous Posts') ?></div>
		<div class="next"><?php previous_posts_link('Next Posts &raquo;') ?></div>
	<?php endif; ?>
</nav>
<?php endif; ?>