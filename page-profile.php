<?php
/*
Template Name: Page Profil
*/

if (!is_user_logged_in()) {
    wp_redirect( home_url('/connexion'));
	    exit;
    }

get_header('bis'); 

echo do_shortcode('[wpmem_profile]');
?>

<h1>Profil</h1>

<a href="<?php echo wp_logout_url('/'); ?>">Déconnexion</a>

<?php get_footer('bis'); ?>