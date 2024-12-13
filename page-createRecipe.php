<?php
/*
Template Name: Page createrecipe
*/

if (!is_user_logged_in()) {
    wp_redirect( home_url('/login') );
	exit;
}

get_header('bis'); 
?>

<h1>Créer recette</h1>

<?php get_footer('bis'); ?>