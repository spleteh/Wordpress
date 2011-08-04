<aside id="sidebar">
	<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
	
		<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar( 'primary-widget-area' ); ?>
		

		
		
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
