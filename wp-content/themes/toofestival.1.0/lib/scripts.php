<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.10.2.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.6.2.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function roots_scripts() {
  wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/main.theme.min.css', false, '9a2dd99b82ca338b034e8730b94139d2');
  /*wp_enqueue_style('toofestival_style', get_template_directory_uri().'/assets/css/theme-style.css', false, null);
  wp_enqueue_style('bootstrap-fullcalendar', get_template_directory_uri().'/assets/css/bootstrap-fullcalendar.css', false, null);*/
  wp_enqueue_style('fancybox-style', get_template_directory_uri().'/assets/js/fancybox/jquery.fancybox.css', false, null);
  wp_enqueue_style('pace', get_template_directory_uri().'/assets/css/pace.css', false, null);
  wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/dark-hive/jquery-ui.css', false, null);


  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, null, false);
    add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', false, null, false);
  wp_register_script('pace', get_template_directory_uri() . '/assets/js/pace.min.js', false, null, false);
  
  wp_register_script('roots_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', false, '2a3e700c4c6e3d70a95b00241a845695', true);
  wp_register_script('masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', false, null, true);
  wp_register_script('imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', false, null, true);
  wp_register_script('infinite', get_template_directory_uri() . '/assets/js/jquery.infinitescroll.js', false, null, true);
  wp_register_script('isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', false, null, true);
  wp_register_script('jquery_scrollTo', get_template_directory_uri() . '/assets/js/jquery.scrollTo.min.js', false, null, true);
  wp_register_script('YTPlayer', get_template_directory_uri() . '/assets/js/jquery.mb.YTPlayer.min.js', false, null, true);
  wp_register_script('fancybox', get_template_directory_uri() . '/assets/js/fancybox/jquery.fancybox.pack.js', false, null, true);
  wp_register_script('app_script', get_template_directory_uri() . '/assets/js/app.min.js', false, null, true);
  wp_register_script('jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js', false, null, false);
  
  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui');
  wp_enqueue_script('roots_scripts');
  wp_enqueue_script('masonry');
  wp_enqueue_script('imagesloaded');
  wp_enqueue_script('infinite');
  wp_enqueue_script('isotope');
  wp_enqueue_script('jquery_scrollTo');
  wp_enqueue_script('YTPlayer');
  wp_enqueue_script('fancybox');
  wp_enqueue_script('app_script');
  wp_enqueue_script('pace');


}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.10.2.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'roots_jquery_local_fallback');



add_action('wp_enqueue_scripts', 'child_enqueue_js', 20);
function child_enqueue_js() { 

if(!is_page( 'calendario-festivales' ) && !is_page( 'carteles-de-festivales' )){
  wp_dequeue_script('events-manager');
  wp_deregister_script('events-manager');

  $eventsScripts = array(
    'jquery-ui-draggable',
    'jquery-ui-position',
    'jquery-ui-widget',
    'jquery-ui-core',
    'jquery-ui-mouse',
    'jquery-ui-sortable',
    'jquery-ui-datepicker',
    'jquery-ui-autocomplete',
    'jquery-ui-resizable',
    'jquery-ui-button',
    'jquery-ui-dialogue'
    );
  wp_dequeue_script( $eventsScripts );
  wp_deregister_script( $eventsScripts );

  
  wp_register_script('events-manager-custom', get_template_directory_uri() . '/assets/js/events-manager-custom.js', false, null, false);
  wp_enqueue_script('events-manager-custom');
  wp_register_script('events-manager', plugins_url('events-manager/includes/js/events-manager.js', 'events-manager'), false, null, false);
  wp_enqueue_script('events-manager');
  }

}

function roots_google_analytics() { ?>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && !current_user_can('manage_options')) {
  add_action('wp_footer', 'roots_google_analytics', 20);
}


