<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta charset=<?php bloginfo('charset'); ?>" />
<meta name="keywords" content="<?php echo get_option('bg_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('bg_description'); ?>" />
<?php if ( file_exists(TEMPLATEPATH .'/favicon.ico') ) : ?>
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
<?php endif; ?>
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/nivo-slider.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	 wp_enqueue_script("jquery"); 
	wp_head();
?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/twittercb.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/Vegur_400-Vegur_700.font.js"></script>
	<!-- Sliding effect -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slide.js" type="text/javascript"></script>
	
</head>
<body>
<?php include ('panel.php') ?>
<!-- Begin #mainWrapper -->
<div id="mainWrapper">
	<!-- Begin #menu -->
	<div id="menu-top"></div>
	<!-- Begin #wrapper -->
	<div id="wrapper">
		<!-- Begin #header -->
		<div id="header">
			<!-- Begin #logo -->
			
			<div id="logo-txt"><a href="<?php bloginfo('url'); ?>/"><p>Druzabne igre </p></a></div>
			<!-- End #logo -->
			<!-- Begin #topMenu -->
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_id' => 'topMenu', 'container_class' => 'ddsmoothmenu', 'fallback_cb'=>'primarymenu') );?>
			<!-- End #topMenu -->
			<!-- Begin #topSearch -->
			<div id="topSearch">
				<form id="searchform" action="" method="get">
					<input type="text" id="s" name="s" value="" />
				</form>
			</div>
			<!-- End #topSearch -->
			<!-- BEGIN TOP SOCIAL LINKS -->
			<div id="topSocial">
				<ul>
					<?php if(get_option('journal_twitter_user')!=""){ ?>
					<li><a href="http://www.twitter.com/<?php echo get_option('journal_twitter_user'); ?>" class="twitter <?php if(get_option('journal_latest_tweet')!="no"):?>tip<?php endif?>" title="Follow Us on Twitter!"><img src="<?php bloginfo('template_directory'); ?>/images/ico_twitter.png" alt="Follow Us on Twitter!" /></a></li>
					<?php }?>
					<?php if(get_option('journal_facebook_link')!=""){ ?>
					<li><a href="<?php echo get_option('journal_facebook_link'); ?>" class="facebook" title="Join Us on Facebook!"><img src="<?php bloginfo('template_directory'); ?>/images/ico_facebook.png" alt="Join Us on Facebook!" /></a></li>
					<?php }?>
					<li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS" class="rss"><img src="<?php bloginfo('template_directory'); ?>/images/ico_rss.png" alt="Subcribe to Our RSS Feed" /></a></li>
				</ul>
			</div>	
			
			<!-- END TOP SOCIAL LINKS -->
			
		</div>
		<!-- End #header -->
		<!-- Begin #content -->
		<div id="content">
