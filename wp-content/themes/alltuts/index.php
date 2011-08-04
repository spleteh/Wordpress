<?php get_header(); ?>
	
		<!-- Begin #colLeft -->
		<div id="colLeft">
		<!-- archive-title -->				
						<?php if(is_month()) { ?>
						<div id="archive-title">
						Browsing articles from "<strong><?php the_time('F, Y') ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_category()) { ?>
						<div id="archive-title">
						Browsing articles in "<strong><?php $current_category = single_cat_title("", true); ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_tag()) { ?>
						<div id="archive-title">
						Browsing articles tagged with "<strong><?php wp_title('',true,''); ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_author()) { ?>
						<div id="archive-title">
						Browsing articles by "<strong><?php wp_title('',true,''); ?></strong>"
						</div>
						<?php } ?>
					<!-- /archive-title -->
					
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
		
		<!-- Begin .postBox -->
		<div class="postBox">
			<div class="postBoxTop"></div>
			<div class="postBoxMid">
				<div class="postBoxMidInner first clearfix">
				<div class="date"><?php the_time('M') ?><br /><span class="day"><?php the_time('j') ?></span><br /><?php the_time('Y') ?></div>
				<div class="category"><?php the_category(' // ') ?></div>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> 
				<div class="postThumb"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a></div>
				<div class="textPreview">
					<?php the_excerpt(); ?>
				</div>
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
		
		<!-- slider setup -->
<script type="text/javascript">
			stepcarousel.setup({
				galleryid: 'slider', //id of carousel DIV
				beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
				panelclass: 'panel', //class of panel DIVs each holding content
				autostep: {enable:true, moveby:1, pause:5000},
				panelbehavior: {speed:500, wraparound:false, persist:true},
				defaultbuttons: {enable: true, moveby: 1, leftnav: ['<?php bloginfo('template_directory'); ?>/images/but_previous.png', -32, 30], rightnav: ['<?php bloginfo('template_directory'); ?>/images/but_next.png', -665, 30]},
				statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
				contenttype: ['inline'] //content setting ['inline'] or ['external', 'path_to_external_file']
			})
			
			</script>

<?php get_sidebar(); ?>	

<?php get_footer(); ?>