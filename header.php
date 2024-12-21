<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0"
    >
    <?php wp_head(); ?>

    <!-- pour changer le logo devant l'url sans avoir besoin d'installer de plugin wordpress (ne fonctionne pas sur tous les navigateurs) -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/logo_dark.png" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/logo_light.png" media="(prefers-color-scheme: light)">
</head>

<body 
    class="d-flex flex-column min-vh-100 overflow-x-hidden" 
    <?php body_class(); ?>
>
    <?php wp_body_open(); ?>
    
    <header class="header sticky-top">
        <nav class="navbar navbar-expand h-100">
            <div class="container-fluid d-flex align-items-center justify-content-center h-100">
                <div class="row d-flex align-items-center justify-content-between w-100">
                    <div class="col-2 col-sm-2 col-md-2 d-flex align-items-center justify-content-center">
                        <a 
                            class="navbar-brand d-flex align-items-center justify-content-center"
                            href="<?php echo home_url('/'); ?>"
                        >   
                            <img 
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/logoMobile.svg" 
                                alt="Logo" 
                                class="logoMobile"
                            >
                            <img 
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/logoDeskop.svg" 
                                alt="Logo" 
                                class="logoDesktop"
                            >
                        </a>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 d-flex align-items-center justify-content-center">
                        <?php echo get_search_form(); ?>
                    </div>
                    <div class="col-2 col-sm-1 col-md-2 d-flex align-items-center justify-content-center">
                        <button class="btn btnRecette btn-light btn-sm  blockBtnRecetteDesktop">
                            <a 
                                class="nav-link" 
                                href="<?php echo home_url('/create-recipe'); ?>"
                            >
                            <div class="d-flex align-items-center ">
                                <img 
                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/iconRecetteGradient.svg" 
                                    alt="Icone créer" 
                                    class="iconRecetteDesktop"
                                >
                                <p class="pRecette m-0">Créer une recette</p> 
                            </div>

                            </a>
                        </button>
                        <a 
                            class="nav-link blockBtnRecetteMobile" 
                            href="<?php echo home_url('/create-recipe'); ?>"
                        >
                        <img 
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/iconRecette.svg" 
                                alt="Icone créer"
                                class="iconRecetteMobile"
                            >
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</body>