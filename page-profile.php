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

<div class="container-fluid text-center mt-4">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col ">
            <div class="row">
                <div class="col-6 imgProfil">
                    <?php echo get_avatar($curent_user->ID, 96, 'identicon', 'photo de profil', array('class' => 'imgProfil rounded-circle'))?>
                </div>
                <div class="col-6 text-start">
                    <div class="mt-2 mt-md-3 h2Salsa">
                        <?php //au début j'ai voulu utiliser un foreach dans ma chaine et stocker le tout dans une variable pour la print mais j'ai trouvé implode
                            echo $current_user->user_login . ' - <span style="background: #FF62C0;  -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold;">' . implode(' ', $current_user->roles) . '</span>'; 
                        ?>
                    </div>
                    <div class="mt-4 ps-1 ps-md-3 pRobotoLogin">
                        <?php echo $current_user->user_email; ?>
                    </div>
                    <div class="mt-2 ps-1 ps-md-3">
                        <a href="<?php echo home_url('/profil/modify-profil'); ?>" class="pUnderline">Modifier le profil</a>
                    </div>
                    <div class="mt-2 ps-1 ps-md-3">
                        <a href="<?php echo wp_logout_url('/login'); ?>"class="pUnderline">Se déconnecter</a>
                    </div>
                </div>
                <div class="col-6 text-center mt-4">
                    <a 
                        href="<?php echo home_url('/create-recipe'); ?>"
                        class="btn btnRecetteProfil"
                    >
                        <img 
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/iconRecette.svg" 
                            alt="icone créer"
                        >
                        <span class="pRobotoLogin">Crée une recette</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col mt-3">
            <button class="container-fluid btn mt-2 catégorieProfil">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/imgPublic.jpg" 
                    alt="personne entrain de se filmer pendant qu'elle cuisine"
                    class="img-fluid imgPublic"
                >
                <div>
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconPublic.svg" 
                        alt="icone groupe de personnes"
                        class="iconPublic"
                    >
                    <span class="pRobotoLogin">Public</span>
                </div>
            </button>
            <button class="container-fluid btn mt-2 catégorieProfil">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/imgFavoris.jpg" 
                    alt="table avec des dessert dessus"
                    class="img-fluid imgFavoris"
                >
                <div>
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconFavoris.svg" 
                        alt="icone coeur"
                        class="iconFavoris"
                    >
                    <span class="pRobotoLogin">Favoris</span>
                </div>
            </button>
            <button class="container-fluid btn mt-2 catégorieProfil">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/imgPrivé.jpg" 
                    alt="tablette avec un recette de cuisine affichée"
                    class="img-fluid imgPrivé"
                >
                <div>
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconPrivé.svg" 
                        alt="icone personne seule"
                        class="iconPrivé"
                    >
                    <span class="pRobotoLogin">Privé</span>
                </div>
            </button>
        </div>
    </div>
</div>

<?php get_footer(); ?>