<?php
/*
Plugin Name: Statistika
*/
 
function statistika()
{


	$count_posts = wp_count_posts();
$posts = $count_posts->publish;

$count_igre = wp_count_posts('druzabneigre');
$st_iger = $count_igre->publish;

$count_comments = get_comment_count();
$comments  = $count_comments['approved'];

echo "Igre: " . $st_iger ."Objav: " .$posts . "Komentarjev: ".$comments." Povprecje: ".round($comments/$posts)." comments per post.";

}
 
function widget_statistika($args) {
  extract($args);
  echo $before_widget;
  echo $before_title;?>Statistika<?php echo $after_title;
  statistika();
  echo $after_widget;
}
 
function statistika_init()
{
  register_sidebar_widget(__('Statistika'), 'widget_statistika');
}
add_action('plugins_loaded', 'statistika_init');
?>