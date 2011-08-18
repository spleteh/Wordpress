<?php
/*
Plugin Name: Kategorije Družabne igre
*/
 
function kategorija()
{
wp_list_categories(array('taxonomy'=>'kategorija','show_count'=>1,'title_li'=>'')); 
}
 
function widget_kategorija($args) {
  extract($args);
  echo $before_widget;
  echo $before_title;?>Kategorije<?php echo $after_title;
  kategorija();
  echo $after_widget;
}
 
function kategorija_init()
{
  register_sidebar_widget(__('kategorija'), 'widget_kategorija');
}
add_action('plugins_loaded', 'kategorija_init');
?>