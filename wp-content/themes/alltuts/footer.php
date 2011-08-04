</div>
		<!-- end content -->
	
	</div>
	<!-- end wrapper -->
	<!-- begin footer -->
	<div id="footer">
		<div id="footerInner">
		<!-- Popular Articles -->
		<?php if(function_exists(ti_popular_posts) && get_option('alltuts_popular_posts')!='no'): ?>
		<div class="boxFooter">
		<h2>Popular Posts</h2>
			<?php ti_popular_posts(5); ?>
		</div>
		<?php endif; ?>
		
		<?php /* Widgetized sidebar */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?><?php endif; ?>
		
		</div>
	</div>
	<div id="copyright">
		<div id="copyrightInner">
			<?php if (get_option('alltuts_copyright') <> ""){
			echo stripslashes(stripslashes(get_option('alltuts_copyright')));
			}else{
				echo 'Just go to Theme Options Page and edit copyright text';
			}?>
		<div id="site5bottom"><a href="http://www.site5.com/p/ruby/">Rails Hosting</a></div>
		</div>
	</div>
	<!-- end footer -->
<?php if (get_option('alltuts_analytics') <> "") { 
		echo stripslashes(stripslashes(get_option('alltuts_analytics'))); 
	} ?>
	<?php wp_footer(); ?>
</body>
</html>
