<?php get_header(); ?>

<!-- Begin #colleft -->
			<div id="colLeft">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
				<div id="singlePost">
					<h1><?php the_title(); ?></h1>
					<div id="rating">
					<?php $category = get_the_category();
								if($category[0]->cat_ID >=5 && $category[0]->cat_ID <= 7 ){ 
								 wp_gdsr_render_article();} ?>
					</div>
					<div class="meta">
					 <?php the_time('M j, Y') ?> od <?php the_author_posts_link()?>&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_post_comments.png" alt="" /> <?php comments_popup_link('No Comments', '1 Comment ', '% Comments'); ?><br/><img src="<?php bloginfo('template_directory'); ?>/images/ico_post_date.png" alt="" /> Objavljeno pod:  <?php the_category(', ') ?>
					
					</div>
					<div class="meta-data">

					<h3>Osnovni podatki: </h3>
					<ul class="post-meta">
						<li>Število igralcev: <?php echo meta('stevilo_igralcev'); ?></li>
						<li>Čas igranja: <?php echo meta('Cas_igranja'); ?></li>
						<li>Starost: <?php echo meta('Starost'); ?></li>
						<li>Leto izdaje: <?php echo meta('Leto_izdaje'); ?></li>
						<li>Založnik:  <?php echo meta('Zaloznik'); ?></li>
						<li>Vrsta igre: <?php echo meta('Vrsta_igre'); ?></li>
						<li>Jezik: <?php echo meta('Jezik'); ?></li>
					</ul>

					<?php 
					/* $category = get_the_category();
								if($category[0]->cat_ID >=5 && $category[0]->cat_ID <= 7 ) 
								{the_meta();} */?>
								
								
					</div>
					<?php
					if(has_post_thumbnail()) {
							//the_post_thumbnail();?>
							<a align="center" href="<?php the_permalink() ?>" ><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&w=350&zc=1" alt="<?php the_title(); ?>"></a>
						<?php } ?>
					
					<h3>O igri</h3><br/>
					<?php echo get_post_meta($post->ID, 'O igri',true); ?>
				
					
					
					<h3>Cilj igre</h3><br/>
					<?php echo get_post_meta($post->ID, 'Cilj igre',true); ?>
					
					<?php the_content(); ?>
					
					
					
					

					
					
					 <div class="postTags"><?php the_tags(); ?></div>
				</div>
				<?php comments_template(); ?>
		<?php endwhile; else: ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
			
			</div>
			<!-- End #colLeft -->
			

<?php get_sidebar(); ?>	
<?php get_footer(); ?>