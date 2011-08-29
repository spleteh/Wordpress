<!-- Panel -->
<div id="toppanel"> 
<?php 
	global $user_identity, $user_ID;	
	// If user is logged in or registered, show dashboard links in panel
	if (is_user_logged_in()) { 
?>
	<div id="panel">
		<div class="content clearfix">
			<div class="left border">
				<h1>Welcome back <?php echo $user_identity ?></h1>
				<h2>Headline</h2>				
				 <?php echo get_avatar(get_the_author_id() , '40'); ?>
				<h2>Dashboard</h2>
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/index.php">Go to Dashboard</a></li>
				</ul>
			</div>
			<div class="left narrow">			
				<h2>My Account</h2>				
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/index.php">Global Dashboard</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/profile.php">Edit My Profile</a></li>
					<?php if ( current_user_can('level_1') ) : ?>
						<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-comments.php">Comments</a></li>
					<?php endif ?>
	        		<li><a href="<?php echo wp_logout_url(get_permalink()); ?>" rel="nofollow" title="<?php _e('Log out'); ?>"><?php _e('Log out'); ?></a></li>
				</ul>	
					<?php if ( current_user_can('level_2') ) : ?>
					
				<h2>Posts</h2>				
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php">New Post</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/edit.php">Edit Posts</a></li>
				<?php if ( current_user_can('level_3') ) : ?>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-tags.php">Tags</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/categories.php">Categories</a></li>
				<?php endif ?>
				</ul>
				
		
			<?php endif ?>
			
			</div>
		
			
			
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	    	<!-- Logout -->
	        <li><a href="<?php echo wp_logout_url(get_permalink()); ?>" rel="nofollow" title="<?php _e('Odjava'); ?>"><?php _e('Odjava'); ?></a></li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Odpri</a>
				<a id="close" style="display: none;" class="close" href="#">Zapri</a>	
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
<?php 
	// Else if user is not logged in, show login and register forms
	} else {	
?>
	<div id="panel">
		<div class="content clearfix">
		
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="<?php bloginfo('url') ?>/wp-login.php" method="post">
					<h1>Prijava</h1>
					<label class="grey" for="log">Uporabniško ime:</label>
					<input class="field" type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="23" />
					<label class="grey" for="pwd">Geslo:</label>
					<input class="field" type="password" name="pwd" id="pwd" size="23" />
	            	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Zapomni se me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Prijava" class="button" />
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
					<a class="lost-pwd" href="<?php bloginfo('url') ?>/wp-login.php?action=lostpassword">Pozabil geslo?</a>
				</form>
			</div>
			<div class="left right">
			<?php if (get_option('users_can_register')) : ?>	
				<!-- Register Form -->
				<form name="registerform" id="registerform" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
					<h1>Še nisi član? Registrijaj se!</h1>	
					<label class="grey" for="user_login"><?php _e('Uporabniško ime') ?></label>
					<input class="field" type="text" name="user_login" id="user_login" class="input" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" size="20" tabindex="10" />
					<label class="grey" for="user_email"><?php _e('E-mail') ?></label>
					<input class="field" type="text" name="user_email" id="user_email" class="input" value="<?php echo attribute_escape(stripslashes($user_email)); ?>" size="25" tabindex="20" />
					<?php do_action('register_form'); ?>
					<label id="reg_passmail"><?php _e('Geslo bo poslano na vaš e-naslov.') ?></label>
					<input type="submit" name="wp-submit" id="wp-submit" value="<?php _e('Registracija'); ?>" class="button" />
				</form>
			<?php else : ?>
				<h1>Registracija je zaprta</h1>
				<p>Trenutno se ni mogoče registrirati!</p>
				<p>Za dodatne informacije pišite na<b>info@druzabne-igre.si</b>.</p>

			<?php endif ?>			
			</div>
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	    	<!-- Login / Register -->
			<li id="toggle">
				<a id="open" class="open" href="#">Prijava| Registracija</a>
				<a id="close" style="display: none;" class="close" href="#">Zapri okno</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->			
<?php } ?>	
</div> <!--END panel -->	