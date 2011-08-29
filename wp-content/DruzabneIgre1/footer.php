	<?php get_sidebar(); ?>
	</div><!-- END MAIN -->
	<footer id="footer" role="contentinfo">
		
		
		<?php /* Widgetized sidebar */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?><?php endif; ?>
		
		</div>
	</div>
	<div id="copyright">
		<div id="copyrightInner"><?php
$count_posts = wp_count_posts();
$posts = $count_posts->publish;

$count_igre = wp_count_posts('druzabneigre');
$st_iger = $count_igre->publish;

$count_comments = get_comment_count();
$comments  = $count_comments['approved'];

echo "Igre: " . $st_iger ."Objav: " .$posts . "Komentarjev: ".$comments." Povprecje: ".round($comments/$posts)." comments per post.";
?>
		
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