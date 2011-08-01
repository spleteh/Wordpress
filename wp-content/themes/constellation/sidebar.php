<aside id="sidebar">
	<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
	
		<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar( 'primary-widget-area' ); ?>
		
		<section id="commented-sidebar" class="widget-container">
		<h3 class="widget-title">Najbolj komentirani</h3>
		<ul id="most-commented">

		<?php $most_commented = new WP_Query( array( 'post_type' => array( 'post', 'druzabneigre' ),'orderby' => 'comment_count', 'posts_per_page' => '10')); ?>
		<?php while ($most_commented->have_posts()) : $most_commented->the_post(); ?>	

		<li>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>

		<span class="comment-bar"><span class="comment-count"><?php comments_number('0','1','%'); ?></span></span>
		</li>

		<?php endwhile; ?>

		</ul>
		</section>	
		
		
		
	<?php else : ?>
	
		<section class="widget-container widget_search">
			<?php get_search_form(); ?>
		</section>

		<section id="archives" class="widget-container">
			<h3 class="widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</section>

		<section id="meta" class="widget-container">
			<h3 class="widget-title"><?php _e( 'Meta', 'twentyten' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</section>
		
	<?php endif; ?>
</aside>
