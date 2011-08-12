<?php
/*
Plugin Name: NajboljKomentirani
*/
 
function sampleHelloWorld()
{
/*
echo "<style>
#most-commented {
    width: 250px;
}

#most-commented li {
    list-style: none;
}

#most-commented a {
    display: block;
}
#most-commented .comment-bar {
    display: inline-block;
    position: relative;
    height: 30px;
    width: 0;
    margin: 5px 0;
    padding-left: 20px;
    background-color: #999;
}

#most-commented .comment-count {
    display: inline-block;
    position: absolute;
    right: -20px;
    top: -5px;
    width: 34px;
    height: 34px;
    border-width: 3px;
    border-style: solid;
    border-color: #FFF;
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    border-radius: 20px;
    text-align: center;
    line-height: 34px;
    background-color: #6CAC1F;
    font-size: 13px;
    font-weight: bold;
    color: #FFF;
}</style>"; */

	echo "<ul id='most-commented'>";

	$most_commented = new WP_Query( array( 'post_type' => array( 'post', 'druzabneigre' ),'orderby' => 'comment_count', 'posts_per_page' => '5')); 
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