    <div class="container-fluid sticky-bottom text-center bg-secondary ">
        <nav class="navbar navbar-expand">
            <div class="container-fluid">
                <ul class="navbar-nav row m-0 w-100 row-cols-3">
                    <li class="nav-item col align-center">
                        <button
                            class="btn"
                            type="button"
                        >
                            <img 
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                                alt="Icones carrote steak et feuille" 
                                class="img-fluid"
                            >
                            <p class="navbar-text">Ingrédients</p>
                        </button>
                    </li>
                    <li class="nav-item col">
                        <button
                            class="btn"
                            type="button" 
                        >
                            <img 
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                                alt="Icone assiettes et cuillère" 
                                class="img-fluid"
                            >
                            <p class="navbar-text">Plats</p>
                        </button>
                    </li>
                    <li class="nav-item col">
                        <a
                            class="btn" 
                            href="<?php echo home_url('/connexion'); ?>"
                        >
                            <img 
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                                alt="Icone personne" 
                                class="img-fluid"
                            >
                            <p class="navbar-text">Se connecter</p>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    
    <?php wp_footer(); ?>
</body>
</html>