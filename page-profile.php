<?php
/*
Template Name: Page profil
*/

if (!is_user_logged_in()) {
    wp_redirect( home_url('/login'));
	    exit;
    }

get_header('bis'); 

$curent_user = wp_get_current_user();
?>

<div class="container-fluid text-center">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col">
            <div class="row">
                <div class="col-6">
                    <?php echo get_avatar($curent_user->ID, 96, 'identicon', 'photo de profil', array('class' => 'rounded-circle'))?>
                </div>
                <div class="col-6 text-start">
                    <div>
                        <?php //au début j'ai voulu utiliser un foreach dans ma chaine et stocker le tout dans une variable pour la print mais j'ai trouvé implode
                            echo $current_user->user_login . ' - ' . implode(' ', $current_user->roles); 
                        ?>
                    </div>
                    <div>
                        <?php echo $current_user->user_email; ?>
                    </div>
                    <div>
                        <a href="<?php echo home_url('/profil/modify-profil'); ?>">Modifier le profil</a>
                    </div>
                    <div>
                        <a href="<?php echo wp_logout_url('/login'); ?>">Se déconnecter</a>
                    </div>
                </div>
                <div class="col-6 text-center">
                    <a 
                        href="<?php echo home_url('/create-recipe'); ?>"
                        class="btn btn-primary"
                    >
                        <img 
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                            alt="icone créer"
                        >
                        <span>Crée une recette</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <button class="container-fluid btn btn-primary m-2">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                    alt="personne entrain de se filmer pendant qu'elle cuisine"
                    class="img-fluid"
                >
                <div>
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                        alt="icone groupe de personnes"
                    >
                    <span>Public</span>
                </div>
            </button>
            <button class="container-fluid btn btn-primary m-2">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                    alt="table avec des dessert dessus"
                    class="img-fluid"
                >
                <div>
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                        alt="icone coeur"
                    >
                    <span>Favoris</span>
                </div>
            </button>
            <button class="container-fluid btn btn-primary m-2">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                    alt="tablette avec un recette de cuisine affichée"
                    class="img-fluid"
                >
                <div>
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                        alt="icone personne seule"
                    >
                    <span>Privé</span>
                </div>
            </button>
        </div>
    </div>
</div>

<?php get_footer(); ?>