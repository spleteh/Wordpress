<?php get_header(); ?>

<section id="main-content">

	<?php if ( is_category() ) : ?>
	<h1 class="archive-title"><?php single_cat_title(); ?></h1>
	<?php elseif( is_tag() ) : ?>
	<h1 class="archive-title">Posts Tagged &ldquo;<?php single_tag_title(); ?>&rdquo;</h1>
	<?php elseif( is_tax('avtor') ) : ?>
	<h1 class="archive-title">Avtor: <?php single_tag_title(); ?></h1>
	<?php elseif(is_tax('ilustrator') ) : ?>
	<h1 class="archive-title">Ilustrator: <?php single_tag_title(); ?></h1>
	<?php elseif( is_tax('zaloznik') ) : ?>
	<h1 class="archive-title">Založnik: <?php single_tag_title(); ?></h1>
	<?php elseif(is_tax('zaloznik') ) : ?>
	<h1 class="archive-title">Založnik: <?php single_tag_title(); ?></h1>
	<?php elseif(is_tax('igralci') ) : ?>
	<h1 class="archive-title">Število igralcev: <?php single_tag_title(); ?></h1>
	<?php elseif(is_tax('kategorija') ) : ?>
	<h1 class="archive-title">Kategorija: <?php single_tag_title(); ?></h1>
	<?php elseif (is_day()) : ?>
	<h1 class="archive-title">Archive for <?php the_time('F jS, Y'); ?></h1>
	<?php elseif (is_month()) : ?>
	<h1 class="archive-title">Archive for <?php the_time('F, Y'); ?></h1>
	<?php elseif (is_year()) : ?>
	<h1 class="archive-title">Archive for <?php the_time('Y'); ?></h1>
	<?php elseif (is_author()) : ?>
	<h1 class="archive-title">Author Archive</h1>
	<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
	<h1 class="archive-title">Blog Archives</h1>
	<?php endif; ?>

	<?php get_template_part('loop'); ?>

</section>

<?php get_footer(); ?>