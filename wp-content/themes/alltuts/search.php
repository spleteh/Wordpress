<?php get_header(); ?>
	
		<!-- Begin #colLeft -->
		<div id="colLeft">

		<div id="archive-title">
		Search results for "<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<strong>'); echo $key; _e('</strong>'); wp_reset_query(); ?>"
		</div>
						
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<!-- Begin .postBox -->
		<div class="postBox">
			<div class="postBoxTop"></div>
			<div class="postBoxMid">
				<div class="postBoxMidInner first clearfix">
				<div class="date"><?php the_time('M') ?><br /><span class="day"><?php the_time('j') ?></span><br /><?php the_time('Y') ?></div>
				<div class="category"><?php the_category(' // ') ?></div>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> 
				<!--<div class="textPreview">-->
					<?php the_excerpt(); ?>
				<!--</div>-->
				<div class="postMeta">
					<a href="<?php the_permalink() ?>" class="more-link">Continue Reading &raquo;</a>
					<div class="metaRight">
						<img src="<?php bloginfo('template_directory'); ?>/images/ico_author.png" alt="Author"/> An article by <?php the_author_link(); ?>
						<img src="<?php bloginfo('template_directory'); ?>/images/ico_comments.png" alt="Comments"/> <?php comments_popup_link('No Comments', '1 Comment ', '% Comments'); ?>
					</div>
				</div>
				</div>
			</div>
			<div class="postBoxBottom"></div>
		</div>
		
		<!-- End .postBox -->
		
		<?php endwhile; ?>

	<?php else : ?>
		<p>Sorry, but you are looking for something that isn't here.</p>
	<?php endif; ?>
            <!--<div class="navigation">
						<div class="alignleft"><?php next_posts_link() ?></div>
						<div class="alignright"><?php previous_posts_link() ?></div>
			</div>-->
			<?php if (function_exists("emm_paginate")) {
				emm_paginate();
			} ?>
		</div>
		<!-- End #colLeft -->

<?php get_sidebar(); ?>	

<?php get_footer(); ?>
