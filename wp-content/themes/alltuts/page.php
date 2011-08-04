<?php get_header(); ?>

<!-- begin colLeft -->
	<div id="colLeft">
    <!-- Begin .postBox -->
		<div class="postBox">
			<div class="postBoxTop"></div>
			<div class="postBoxMid">
				<div class="postBoxMidInner first clearfix">
				<h1><?php the_title(); ?></h1>	
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<?php the_content(); ?>
				
				<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
			</div>
		</div>
		<div class="postBoxBottom"></div>
        </div>
	 <!-- End .postBox -->
	</div>
	<!-- end colleft -->
	
	<?php get_sidebar(); ?>	

<?php get_footer(); ?>