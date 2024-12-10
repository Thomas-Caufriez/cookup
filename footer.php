    <div class="container-fluid sticky-bottom text-center bg-primary">
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
                href="<?php echo home_url('/connexion'); ?>"
            >
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_light.svg" 
                    alt="Icone personne" 
                    width="60px"
                    height="48px"
                >
                <p class="navbar-text">Se connecter</p>
            </a>
        </div>
    </div>

    
    <?php wp_footer(); ?>
</body>
</html>