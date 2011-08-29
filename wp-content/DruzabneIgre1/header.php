<!doctype html>
<html lang="en" class="no-js">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="keywords" content="<?php echo get_option('keywords'); ?>" />
<meta name="description" content="<?php echo get_option('description'); ?>" />
<!--[if IE]><![endif]-->
<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<?php if ( file_exists(TEMPLATEPATH .'/favicon.ico') ) : ?>
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
<?php endif; ?><?php if ( file_exists(TEMPLATEPATH .'/apple-touch-icon.png') ) : ?>
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/apple-touch-icon.png">
<?php endif; ?>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/test.css">

 <?php
		wp_head(); ?>



</head>

<body> <?php $body_classes = join( ' ', get_body_class() ); ?>
<!--[if lt IE 7 ]><body class="ie6 <?php echo $body_classes; ?>"><![endif]-->
<!--[if IE 7 ]><body class="ie7 <?php echo $body_classes; ?>"><![endif]-->
<!--[if IE 8 ]><body class="ie8 <?php echo $body_classes; ?>"><![endif]-->
<!--[if IE 9 ]><body class="ie9 <?php echo $body_classes; ?>"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<div id="wrapper" class="<?php echo $body_classes; ?>"><!--<![endif]-->
<?php get_template_part('panel'); ?>

<nav id="topNav" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'topMenu' ) ); ?>
</nav>
<header id="header" role="banner">

		<h1 id="logo"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>

	<div id="topSearch">
				<form id="searchform" action="<?php bloginfo('url'); ?>/" method="get">
					<input type="submit" value="" id="searchsubmit"/>
					<input type="text" id="s" name="s" value="" />
				</form>
			</div>
	
	<div id="socialLinks">
				<a href="#" class="facebook" title="Join us on Facebook!"></a>

		
				<a href="http://twitter.com/" class="twitter" title="Follow Us on Twitter!"></a>
	<a href="<?php bloginfo('rss2_url'); ?>" title="RSS" class="rss"></a>
	</div>
</header>



	
<div id="main" role="main">