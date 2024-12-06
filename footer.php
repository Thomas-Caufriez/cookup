    <nav class="nav fixed-bottom">
        <div class="container-fluid">
            <ul class="nav justify-content-evenly accordion accordion-flush" id="accordeon">
                <li class="nav-item text-center accordion-item">
                    <h2 class="accordion-header">
                        <button
                            class="nav-link accordion-button collapsed"
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseOne" 
                            aria-expanded="false" 
                            aria-controls="collapseOne" 
                            type="button"
                        >
                            <img 
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                                alt="Icones carrote steak et feuille" 
                                width="30" 
                                height="24"
                            >
                            <p>Ingrédients</p>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordeon">
                        <div class="accordion-body">
                            Test1
                        </div>
                    </div>
                </li>
                <li class="nav-item text-center accordion-item">
                    <h2 class="accordion-header">
                        <button
                            class="nav-link accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                            type="button" 
                        >
                            <img 
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                                alt="Icone assiettes et cuillère" 
                                width="30" 
                                height="24"
                            >
                            <p>Plats</p>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordeon">
                        <div class="accordion-body">
                            Test2
                        </div>
                    </div>
                </li>
                <li class="nav-item text-center">
                    <a
                        class="nav-link" 
                        href="<?php echo home_url('/connexion'); ?>"
                    >
                        <img 
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                            alt="Icone personne" 
                            width="30" 
                            height="24"
                        >
                        <p>Se connecter</p>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    <?php wp_footer(); ?>
</body>
</html>