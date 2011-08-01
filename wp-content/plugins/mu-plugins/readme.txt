global $wp_rewrite;
$wp_rewrite->add_rewrite_tag('%druzabnaigra%', '([^/]+)', 'druzabneigre=');

global $wp_rewrite;

//the root of the post type, ie mysite.com/movie-reviews/ will be the landing page for the post type
$permalink_prefix = 'druzabnaigra';
//the permalink structure for the post type that will be appended to the prefix, mysite.com/movie-reviews/2010/11/25/test-movie-review/
$permalink_structure = '%year%/%monthnum%/%day%/%druzabnaigra%/';

//we use the WP_Rewrite class to generate all the endpoints WordPress can handle by default.
$rewrite_rules = $wp_rewrite->generate_rewrite_rules($permalink_prefix.'/'.$permalink_structure, EP_ALL, true, true, true, true, true);

//build a rewrite rule from just the prefix to be the base url for the post type
$rewrite_rules = array_merge($wp_rewrite->generate_rewrite_rules($permalink_prefix), $rewrite_rules);
$rewrite_rules[$permalink_prefix.'/?$'] = 'index.php?paged=1';
foreach($rewrite_rules as $regex => $redirect) {
  if(strpos($redirect, 'attachment=') === false) {
    //add the post_type to the rewrite rule
    $redirect .= '&post_type=druzabneigre';
  }

  //turn all of the $1, $2,... variables in the matching regex into $matches[] form
  if(0 < preg_match_all('@\$([0-9])@', $redirect, $matches)) {
    for($i = 0; $i < count($matches[0]); $i++) {
      $redirect = str_replace($matches[0][$i], '$matches['.$matches[1][$i].']', $redirect);
    }
  }
  //add the rewrite rule to wp_rewrite
  $wp_rewrite->add_rule($regex, $redirect, 'top');
}

add_filter('post_type_link', 'filter_druzabneigre_link', 10, 2);
function filter_movie_review_link($permalink, $post) {
  if(('druzabneigre' == $post->post_type) && '' != $permalink && !in_array($post->post_status, array('draft', 'pending', 'auto-draft')) ) {
    $rewritecode = array(
      '%year%',
      '%monthnum%',
      '%day%',
      '%druzabnaigra%'
    );

    $unixtime = strtotime($post->post_date);
    $date = explode(" ",date('Y m d H i s', $unixtime));
    $rewritereplace = array(
      $date[0],
      $date[1],
      $date[2],
      $post->post_name,
    );
    $permalink = str_replace($rewritecode, $rewritereplace, '/druzabnaigra/%year%/%monthnum%/%day%/%druzabnaigra%/');
    $permalink = user_trailingslashit(home_url($permalink));
  }
  return $permalink;
}
