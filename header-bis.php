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

    <header class="header-bis sticky-top bg-primary">
        <nav class="navbar navbar-expand">
            <div class="container-fluid">
                <div class="col-1">
                    <a 
                        class="navbar-brand" 
                        href="<?php echo home_url('/'); ?>"
                    >
                        <img 
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/logoMobile.svg" 
                            alt="Logo" 
                            class="img-fluid"
                        >
                    </a>
                </div>
            </div>
        </nav>
    </header>