	<?php get_sidebar(); ?>
	</div><!-- END MAIN -->
	<footer id="footer" role="contentinfo">
		
		
		<?php /* Widgetized sidebar */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?><?php endif; ?>
		
		</div>
	</div>
	<div id="copyright">
		<div id="copyrightInner">
		
		</div>

	</footer>		
	<?php wp_footer(); ?>
	<?php  wp_enqueue_script("jquery");  ?>

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slide.js" type="text/javascript"></script>

	
	<script type="text/javascript">
	/* <![CDATA[ */
		jQuery('#sidebar .widget:nth-child(even)').css('margin-right', 0);
	/* ]]> */
	</script>
</body>
</html>