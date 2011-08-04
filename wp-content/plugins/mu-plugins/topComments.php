<?php
/*
Plugin Name: Hello World
Plugin URI: http://azuliadesigns.com/
Description: Sample Hello World Plugin
Author: Tim Trott
Version: 1
Author URI: http://azuliadesigns.com/
*/
 
function sampleHelloWorld()
{
 

	echo "<ul id='most-commented'>";

	$most_commented = new WP_Query( array( 'post_type' => array( 'post', 'druzabneigre' ),'orderby' => 'comment_count', 'posts_per_page' => '10')); 
	  while ($most_commented->have_posts()) : $most_commented->the_post(); 	

	echo "<li>";
	echo "<a href='"; the_permalink();  echo "' rel='bookmark' title='"; the_title_attribute(); echo "'>";  the_title(); echo "</a>";

		echo "<span class='comment-bar'><span class='comment-count'>"; comments_number('0','1','%'); echo"</span></span>";
		echo "</li>";

		 endwhile; 

	echo"</ul>";

}
 
function widget_myHelloWorld($args) {
  extract($args);
  echo $before_widget;
  echo $before_title;?>Najbolj komentirani<?php echo $after_title;
  sampleHelloWorld();
  echo $after_widget;
}
 
function myHelloWorld_init()
{
  register_sidebar_widget(__('Najbolj komentirani'), 'widget_myHelloWorld');
}
add_action('plugins_loaded', 'myHelloWorld_init');
?>
 