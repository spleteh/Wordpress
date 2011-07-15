<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<!-- Begin #featuredPosts -->
	<?php
	 if(get_option('journal_featured_posts')!=''){
		 query_posts('tag=featured&showposts='.get_option('journal_featured_posts'));
		 }else{
		 query_posts('tag=featured&showposts=2');
	}
	 $featuredindex = 1; 
	 if (have_posts()) : ?>	
			<div id="featuredPosts">
		<?php while (have_posts()) : the_post(); ?>
				<div class="item <?php if(($featuredindex % 2) == 0){ echo 'lastItem';}?>">
					<h1><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<?php
					if ( has_post_thumbnail() ) {?>
						<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
						<?php //the_post_thumbnail('featured-post-thumbnail');?>
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&h=290&w=430&zc=1" alt="<?php the_title(); ?>">
						</a>
					<?php } else {?>
						<img src="<?php bloginfo('template_directory'); ?>/images/nothumb_featured.jpg" alt="No Thumb"  />
					<?php } ?>
					<?php wpe_excerpt('wpe_excerptlength_featured', 'wpe_excerptmore'); ?>

					<a href="<?php the_permalink() ?>" class="readMore">Read More</a>
				</div>
		<?php ++$featuredindex; ?>
		<?php endwhile; ?>
		</div>
		<?php endif;
			wp_reset_query();?>
		<!-- End #featuredPosts -->

		<?php $postindex = 1; 
		 	if(!query_posts('showposts='.get_option('journal_home_posts').'&tag=homepost')){
				if(get_option('journal_home_posts')!=''){
			 		query_posts('showposts='.get_option('journal_home_posts'));
				}else{
					query_posts('showposts=6');
				}
			}else{
				query_posts('showposts='.get_option('journal_home_posts').'&tag=homepost');
				if(get_option('journal_home_posts')!=''){
			 		query_posts('showposts='.get_option('journal_home_posts').'&tag=homepost');
				}else{
					query_posts('showposts=6&tag=homepost');
				}
			}
		 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		 query_posts( array(
		'post_type' => array(
					'post',
					'boardgame'
				),
				'paged' => $paged ) // for paging links to work
			);
		 if (have_posts()) : while (have_posts()) : the_post(); ?>	
		 <?php $t = wp_get_post_tags($post->ID);
						if($t[0]->name !='featured'){ ?>
			<div class="postBox <?php if(($postindex % 3) == 0){ echo 'lastBox';}?>">
				<div class="postBoxInner">
					<CENTER>
					<?php
					if(has_post_thumbnail()) {
							//the_post_thumbnail();?>
							<a href="<?php the_permalink() ?>" ><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_image_path($post->ID); ?>&h=255&zc=1" alt="<?php the_title(); ?>" align="top"></a>
						<?php } /*else {
							echo '<img src="'.get_bloginfo("template_url").'/images/nothumb.jpg"  alt="No Thumbnail"/>';
						}*/?>
					</CENTER>
					<h2><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h2>
					<div class="excerpt">
					
					<?php $category = get_the_category();
								if($category[0]->cat_ID >=5 && $category[0]->cat_ID <= 7 ) 
								{	?>			 	
					<ul class="post-meta">
						<li>Število igralcev: <?php echo meta('stevilo_igralcev'); ?></li>
						<li>Čas igranja: <?php echo meta('Cas_igranja'); ?></li>
						<li>Starost: <?php echo meta('Starost'); ?></li>
						<li>Leto izdaje: <?php echo meta('Leto_izdaje'); ?></li>
						<li>Založnik:  <?php echo meta('Zaloznik'); ?></li>
						<li>Vrsta igre: <?php echo meta('Vrsta_igre'); ?></li>
						<li>Jezik: <?php echo meta('Jezik'); ?></li>
					</ul>
					<?php } 
								else 
								{wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore');}  
								?>   
									
					</div>
					<div class="meta"> <?php the_time('M j, Y') ?> &nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/ico_post_comments.png" alt="" /> <?php comments_popup_link('Brez komentarja', '1 komentar ', '% komentarjev'); ?></div>
				</div>
				<a href="<?php the_permalink() ?>" class="readMore">Read More</a>
			</div>
			<?php ++$postindex; }?>
			<?php endwhile; ?>

	<?php else : ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; 
	wp_reset_query();?>
			
<?php get_footer(); ?>
