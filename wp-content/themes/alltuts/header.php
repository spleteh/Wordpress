<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="keywords" content="<?php echo get_option('alltuts_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('alltuts_description'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link href="<?php bloginfo('template_directory'); ?>/css/ddsmoothmenu.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('template_directory'); ?>/css/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.lightbox-0.5.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/Century_Gothic_400-Century_Gothic_700.font.js"></script>
<!-- Cufon init -->
<script type="text/javascript">
		<?php if(get_option('alltuts_cufon')!="no"):?>
		 Cufon.replace('h1',{hover: true})('h2')('h3')('.stepcarousel .panel .caption .title');
		 <?php endif ?>
	</script>
<!-- lightbox initialize script -->
	<script type="text/javascript">
		$(function() {
		   $('a.lightbox').lightBox();
		});
	 </script>
<!-- drop down top menu init -->
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "topMenu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>

</head>

<body>
<!-- Begin #wrapper -->
<div id="wrapper">
	<!-- Begin #header -->
	<div id="header">
		<div id="logo"><a href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_option('alltuts_logo_img'); ?>" alt="<?php echo get_option('alltuts_logo_alt'); ?>" /></a><br /><span><?php echo get_settings('blogdescription');?></span></div>
		<!-- Begin #topMenu -->
		<?php if ( function_exists( 'wp_nav_menu' ) ){
					wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_id' => 'topMenu', 'container_class' => 'ddsmoothmenu', 'fallback_cb'=>'primarymenu') );
				}else{
					primarymenu();
			}?>
			
		<!-- End #topMenu -->
		<!-- Begin #topMenuRight -->
			<div id="topMenuRight">
			<?php if ( function_exists( 'wp_nav_menu' ) ){
					wp_nav_menu( array( 'theme_location' => 'secondary-menu','fallback_cb'=>'secondarymenu') );
				}else{
					secondarymenu();
			}?>

			</div>
		<!-- End #topMenuRight -->
		<!-- Begin #socialLinks -->
			<div id="socialLinks">
				<?php if(get_option('alltuts_linkedin_link')!=""){ ?>
				<a href="<?php echo get_option('alltuts_linkedin_link'); ?>" class="linkedin" title="Join us on LinkedIn!">Join us on LinkedIn!</a>
				<?php }?>
				<?php if(get_option('alltuts_facebook_link')!=""){ ?>
				<a href="<?php echo get_option('alltuts_facebook_link'); ?>" class="facebook" title="Join us on Facebook!">Join us on Facebbook!</a>
				<?php }?>
				 <?php if(get_option('alltuts_twitter_user')!=""){ ?>
				<a href="http://twitter.com/<?php echo get_option('alltuts_twitter_user'); ?>" class="twitter" title="Follow Us on Twitter!">Follow Us on Twitter!</a>
				<?php }?>
				<a href="<?php bloginfo('rss2_url'); ?>" title="RSS" class="rss">Subscribe to our RSS Feed!</a>
			</div>
		<!-- End #socialLinks -->
	</div>
	<!-- End #header -->
	
	<!-- Begin #content -->
	<div id="content" class="clearfix">