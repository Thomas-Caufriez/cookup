<?php
/*
Template Name: Page Mot de Passe Oublié
*/

if (is_user_logged_in()) {
    wp_redirect( home_url('/profil') );
      exit;
    }

get_header('bis'); 
?>

<h1>Mot de passe oublié</h1>

<?php get_footer('bis'); ?>