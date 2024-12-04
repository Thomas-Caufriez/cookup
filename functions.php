<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

register_nav_menu('footer', 'footer');

function styles_scripts()
  {
    wp_enqueue_style(
      'bootstrap',
      'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    );
    wp_enqueue_style(
      'style',
      get_template_directory_uri() . '/assets/css/app.css'
    );

    wp_enqueue_script(
      'bootstrap-bundle',
      'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
      false,
      1,
      true
    );
    wp_enqueue_script(
      'app-js',
      get_template_directory_uri() . '/assets/javascript/app.js',
      ['bootstrap-bundle'],
      1,
      true
    );
  }
add_action('wp_enqueue_scripts', 'styles_scripts');

function footer_menu_class($classes) {
  $classes[] = 'nav-item';
  return $classes;
}

function footer_menu_link_class($attrs) {
  $attrs['class'] = 'nav-link';
  return $attrs;
}

add_filter('nav_menu_css_class', 'footer_menu_class');
add_filter('nav_menu_link_attributes', 'footer_menu_link_class');


function wp_nav_menu_no_ul()
// fonction trouvée sur https://wordpress.stackexchange.com/questions/7968/how-do-i-remove-ul-on-wp-nav-menu //
// me permet d'enlever les balises ul afin de les mettre moi-même et de les fermer quand je veux //
{
    $options = array(
        'echo' => false,
        'container' => false,
        'theme_location' => 'footer'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);
}

?>