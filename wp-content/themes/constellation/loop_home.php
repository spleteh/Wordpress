<?php 
	$postindex = 1;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		 query_posts( array(
		'post_type' => array(
					'post',
					'druzabneigre'
				),
				'paged' => $paged ) // for paging links to work
			);
if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="postBox <?php if(($postindex % 2) == 0){ echo 'lastBox';}?>">
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
								<p><time datetime="<?php the_time('Y-m-d')?>">Posted <?php the_time('F jS, Y') ?></time> <span class="author">by <?php the_author() ?></span>. <?php if ( comments_open() ) : ?><a class="comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a><?php endif; ?></p>
							</header>
							
							<?php the_content(''); ?>
							
							<footer>
								<span class="category">Posted in <?php if (function_exists('parentless_categories')) parentless_categories(','); else the_category( ', ', 'multiple' ); ?></span>
								<?php the_tags('<span class="tags">Tagged as ', ', ', '</span>'); ?>
							</footer>
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