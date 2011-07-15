</div>
<!-- End #content -->
	</div>
	<!-- End #wrapper -->
	<!-- Begin #footer -->
	<div id="footer">
		<div id="footerInner">
		<?php if ( ! dynamic_sidebar( 'footer' ) ) :
			  endif; ?>
		<!-- BEGIN COPYRIGHT -->
		<div id="copyright">
			<?php if (get_option('journal_copyright') <> ""){
				echo stripslashes(stripslashes(get_option('journal_copyright')));
				}?> 
				<div id="site5bottom"><a href="http://www.spleteh.si/">Izdelava strani: Spleteh.si</a></div>
		</div>
		<!-- END COPYRIGHT -->	
		</div>
	</div>
	<!-- End #footer -->
</div>
<!-- End #mainWrapper -->
<script type="text/javascript">Cufon.now(); </script>

<!-- Header Twitter Tooltip -->
<div class="tooltip">
				<ul id="twitter_tooltip"></ul>
				<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo get_option('journal_twitter_user'); ?>.json?callback=twitterCallback2&amp;count=1"></script>
			</div>
<?php if (get_option('journal_analytics') <> "") { 
		echo stripslashes(stripslashes(get_option('journal_analytics'))); 
	} ?>
<?php wp_footer(); ?>

</body>
</html>
