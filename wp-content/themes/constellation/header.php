<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" class="no-js">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="keywords" content="<?php echo get_option('keywords'); ?>" />
<meta name="description" content="<?php echo get_option('description'); ?>" />
<!--[if IE]><![endif]-->
<title><?php

	global $page, $paged;
	wp_title( '|', true, 'right' );
	// Dodaj ime strani
	bloginfo( 'name' );
	// Dodaj opis strani na domaèo stran
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	?></title>
	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<?php if ( file_exists(TEMPLATEPATH .'/favicon.ico') ) : ?>
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
<?php endif; ?><?php if ( file_exists(TEMPLATEPATH .'/apple-touch-icon.png') ) : ?>
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/apple-touch-icon.png">
<?php endif; ?><link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>

</head><?php $body_classes = join( ' ', get_body_class() ); ?>
<!--[if lt IE 7 ]><body class="ie6 <?php echo $body_classes; ?>"><![endif]-->
<!--[if IE 7 ]><body class="ie7 <?php echo $body_classes; ?>"><![endif]-->
<!--[if IE 8 ]><body class="ie8 <?php echo $body_classes; ?>"><![endif]-->
<!--[if IE 9 ]><body class="ie9 <?php echo $body_classes; ?>"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><body class="<?php echo $body_classes; ?>"><!--<![endif]-->

<header id="header" role="banner">
	<?php if (is_home() || is_front_page()) : ?>
		<h1 id="logo"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
	<?php else : ?>
		<div id="logo"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></div>			
	<?php endif; ?>
</header>



<nav id="main-nav" role="navigation"><?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'top_menu' ) ); ?></nav>
	
<div id="main" role="main">