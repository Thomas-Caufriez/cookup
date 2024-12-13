<?php
/*
Template Name: Page profil
*/

if (!is_user_logged_in()) {
    wp_redirect( home_url('/login'));
	    exit;
    }

get_header('bis'); 
?>

<h1>Profil</h1>

<a href="<?php echo wp_logout_url('/login'); ?>">Déconnexion</a>

<?php get_footer('bis'); ?>