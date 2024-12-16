<div class="container-fluid sticky-bottom text-center p-0 bg-primary">
    <div class="d-flex row-cols-3">
        <button
            class="btn btn-primary col"
            type="button"
        >
            <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_light.svg" 
                alt="Icones carrote steak et feuille" 
                width="60px"
                height="48px"
            >
            <p class="navbar-text">Ingrédients</p>
        </button>
        <button
            class="btn btn-primary col"
            type="button"
        >
            <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_dark.svg" 
                alt="Icones carrote steak et feuille" 
                width="60px"
                height="48px"
            >
            <p class="navbar-text">Plats</p>
        </button>
        <a
            class="btn btn-primary col" 
            href="<?php echo home_url('/login'); ?>"
        >
            <p class="navbar-text">
                <?php 
                    if (is_user_logged_in()) {
                        echo get_avatar($current_user->ID, 48, 'identicon', 'photo de profil', array('class' => 'rounded-circle')) . nl2br("\nprofil");
                        }
                    else {
                        echo get_avatar('', 48, 'mystery', 'photo de profil pas connecté', array('class' => 'rounded-circle')) . nl2br("\nSe connecter");
                        }
                ?>
            </p>
        </a>
    </div>
</div>