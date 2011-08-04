
<!-- Begin #colRight -->
		<div id="colRight">
		<form id="searchform" action="<?php bloginfo('url'); ?>/" method="get">
			<div class="rightBox">
				<div class="rightBoxTop"></div>
				<div class="rightBoxMidSearch">
					<input type="text" id="s" name="s" value="type your search here" onfocus="this.value=''" onblur="this.value='type your search here'"/>
					<input type="submit" value="" class="submit" id="searchsubmit"/>
				</div>	
				<div class="rightBoxBottom"></div>
			</div>
		</form>
		<?php if(get_option('alltuts_ads') == 'yes'){?>
		<!-- Begin Ads -->
		<div class="rightBox clearfix">
				<div class="rightBoxTop"></div>
				<div class="rightBoxMidAds clearfix">
					 <!-- begin ads -->
						<div id="ads" class="clearfix">
							  <?php wp125_write_ads(); ?>
						</div>
						<!-- end ads -->
				<a href="<?php echo get_page_link(get_option('alltuts_advertise'));?>" class="advertise">&raquo; Advertise with us!</a>
				</div>	
				<div class="rightBoxBottom"></div>
			</div>
		<!-- End Ads -->
		<?php }?>
		
		<?php if(get_option('alltuts_twitter_user')!="" && get_option('alltuts_latest_tweet')!="no"){ ?>
		<!-- Begin #twitter -->
				<div id="twitter">					
						<div id="twitter_update_list">
						</div>
					<div id="bottom"><a href="http://twitter.com/<?php echo get_option('alltuts_twitter_user'); ?>">Follow Us on Twitter!</a></div>
				</div>
		<!-- End #twitter -->
		<?php } ?>
		
		<?php /* Widgetized sidebar */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?><?php endif; ?>
		
		</div>
		<!-- End #colRight -->
		<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
		<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo get_option('alltuts_twitter_user'); ?>.json?callback=twitterCallback2&amp;count=<?php 
		if(get_option('alltuts_number_tweets')!=""){
			echo get_option('alltuts_number_tweets');
			}else{
				echo "1";
			} ?>"></script>
