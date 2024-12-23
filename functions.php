<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

register_nav_menu('footer', 'footer');

// load bootstrap, la(les) feuille(s) css, la(les) feuille(s) js
  function styles_scripts()
  {
    wp_enqueue_style(
      'bootstrap',
      'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    );
    wp_enqueue_style(
      'style',
      get_template_directory_uri() . '/assets/cssFile/app.css'
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
      get_template_directory_uri() . '/assets/js/app.js',
      ['bootstrap-bundle'],
      1,
      true
    );
  }
  add_action('wp_enqueue_scripts', 'styles_scripts');

// ajoute la classe nav-item aux li placés par la fonction wp_nav_menu()
  function footer_menu_class($classes) {
    $classes[] = 'nav-item col';
    return $classes;
  }
  add_filter('nav_menu_css_class', 'footer_menu_class');

// ajoute la classe nav-link aux a placés par la fonction wp_nav_menu()
  function footer_menu_link_class($attrs) {
    $attrs['class'] = 'nav-link';
    return $attrs;
  }
  add_filter('nav_menu_link_attributes', 'footer_menu_link_class');

// fonction trouvée sur https://wordpress.stackexchange.com/questions/7968/how-do-i-remove-ul-on-wp-nav-menu
// permet d'enlever les balises ul afin de les mettre moi-même et de les fermer quand je veux
  function wp_nav_menu_no_ul()
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

// vérifie si le nom d'utilisateur et l'email ne sont pas déjà enregistrés puis crée un compte
  function create_account(){
    $user = ( isset($_POST['uname']) ? $_POST['uname'] : '' );
    $pass = ( isset($_POST['upass']) ? $_POST['upass'] : '' );
    $email = ( isset($_POST['uemail']) ? $_POST['uemail'] : '' );

    if ( !username_exists( $user )  && !email_exists( $email ) ) {
      $user_login = wp_slash( $user );
      $user_email = wp_slash( $email );
      $user_pass = $pass;

      $userdata = compact('user_login', 'user_email', 'user_pass');
      $user_id = wp_insert_user($userdata);

      if( !is_wp_error($user_id) ) {
        $user = new WP_User( $user_id );
        $user->set_role( 'author' );
        wp_redirect(esc_url(home_url('/profil')));
        exit;
      } else {
        //$user_id is a WP_Error object. Manage the error (à regarder plus tard selon le temps)
      }
    }
  }

add_action('init', 'create_account');


// vérifie le role puis enlève la barre si pas admin
  function check_user_role( $roles ) {
    if ( !is_user_logged_in() ) {
      return;
    }

    $user = wp_get_current_user();
    $currentUserRoles = $user->roles;
    $isMatching = array_intersect( $currentUserRoles, $roles);
    $response = false;

    if ( !empty($isMatching) ) {
      $response = true;
    }

    return $response;
  }
  $roles = [ 'author' ]; // uniquement auteur pour économiser des lignes de code (car tous les utilisateurs ont/auront ce rôle pour le moment)
  if ( check_user_role($roles) ) {
    add_filter('show_admin_bar', '__return_false');
  }

// page de création de recettes
function custom_creation_recette() {
  register_post_type('creation_recette',
      array(
          'labels' => array(
              'name' => __('Recettes'),
              'singular_name' => __('Recette'),
              'add_new_item' => __('Ajouter une nouvelle recette'),
              'edit_item' => __('Modifier une recette'),
              'new_item' => __('Nouvelle recette'),
              'view_item' => __('Voir la recette'),
              'search_items' => __('Rechercher des recettes'),
          ),
          'public' => true,
          'has_archive' => true,
          'supports' => array('title', 'editor', 'thumbnail'),
          'rewrite' => array('slug' => 'recettes'),
          'show_in_rest' => true,
          'menu_icon'   => 'dashicons-carrot',
      )
  );
}
add_action('init', 'custom_creation_recette');

// Création d'un hook pour permettre de récupérer les informations du formulaire acf et de l'enregistrer dans recette, je fais cela afin de pouvoir custom le placement du form comme je le souhaite
function handle_recipe_submission() {

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $post_title   = sanitize_text_field($_POST['post_title']);
    $ptime   = sanitize_text_field($_POST['temps']); // tag 1
    $pdifficulty   = sanitize_text_field($_POST['difficulte']); // tag 2
    $pprice   = sanitize_text_field($_POST['prix']); // tag 3
    $dishtype   = sanitize_text_field($_POST['dishtype']);
    $description  = sanitize_textarea_field($_POST['description']);
    $proteine  = sanitize_text_field($_POST['proteine']); // ingrédient 1
    $legumineuse   = sanitize_text_field($_POST['legumineuse']); // tag ingrédient 2
    $cereal   = sanitize_text_field($_POST['cereale & grain']); // tag ingrédient 3
    $noix   = sanitize_text_field($_POST['noix & graine']); // tag ingrédient 4
    $fruit   = sanitize_text_field($_POST['fruit']); // tag ingrédient 5
    $legume   = sanitize_text_field($_POST['legume']); // tag ingrédient 6
    $lait   = sanitize_text_field($_POST['produit laitier']); // tag ingrédient 7
    $descingredient  = sanitize_textarea_field($_POST['descingredient']);
    $nbrperson        = absint($_POST['nbrperson']);
    $preparation  = sanitize_textarea_field($_POST['preparation']);
    $status   = sanitize_text_field($_POST['status']);

    // Vérifie si un fichier a été téléchargé sans erreur
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
        require_once ABSPATH . 'wp-admin/includes/image.php';
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';

        $attachment_id = media_handle_upload('thumbnail', 0);

        // Vérifie s'il n'y a pas d'erreur lors du téléchargement
        if (is_wp_error($attachment_id)) {
            echo 'Erreur lors du téléchargement de l\'image : ' . $attachment_id->get_error_message();
        } else {
            $post_id = wp_insert_post(array(
                'post_type'    => 'creation_recette',
                'post_title'   => $post_title,
                'post_content' => $description,
                'post_status'  => 'publish',
            ));

            if ($post_id) {
                set_post_thumbnail($post_id, $attachment_id);

                update_post_meta($post_id, 'temps', $ptime);
                update_post_meta($post_id, 'difficulte', $pdifficulty);
                update_post_meta($post_id, 'prix', $pprice);
                update_post_meta($post_id, 'dishtype', $dishtype);
                update_post_meta($post_id, 'proteine', $proteine);
                update_post_meta($post_id, 'legumineuse', $legumineuse);
                update_post_meta($post_id, 'cereale & grain', $cereal);
                update_post_meta($post_id, 'noix & graine', $noix);
                update_post_meta($post_id, 'fruit', $fruit);
                update_post_meta($post_id, 'legume', $legume);
                update_post_meta($post_id, 'produit laitier', $lait);
                update_post_meta($post_id, 'descingredient', $descingredient);
                update_post_meta($post_id, 'nbrperson', $nbrperson);
                update_post_meta($post_id, 'preparation', $preparation);
                update_post_meta($post_id, 'status', $status);


                wp_redirect(get_permalink($post_id));
                exit;
            } else {
                echo 'Erreur lors de la création de la publication.';
            }
        }
    } else {
        echo 'Veuillez télécharger une image valide.';
    }
}
}
add_action('template_redirect', 'handle_recipe_submission');

// Action permettant de display les informations du formulaire dans le back-office pour aider le client
add_action('add_meta_boxes', function () {
add_meta_box('recette_details', 'Détails de la recette', function ($post) {
    $ptime = get_post_meta($post->ID, 'ptime', true);
    $pdifficulty = get_post_meta($post->ID, 'pdifficulty', true);

    echo 'Difficulté : ' . $pdifficulty;
}, 'creation_recette');
});
?>