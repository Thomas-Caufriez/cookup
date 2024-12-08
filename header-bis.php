<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0"
    >
    <?php wp_head(); ?>

    <!-- pour changer le logo devant l'url sans avoir besoin d'installer de plugin wordpress -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/logo_light.png" media="(prefers-color-scheme: light)">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/logo_dark.png" media="(prefers-color-scheme: dark)">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="sticky-top bg-secondary">
        <nav class="navbar navbar-expand">
            <div class="container-fluid">
                <div class="col-1">
                    <a 
                        class="nav-link active" 
                        href="<?php echo home_url('/'); ?>"
                    >
                        <img 
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                            alt="Retour" 
                            class="img-fluid"
                        >
                        Retour
                    </a>
                </div>
                <div class="col-1">
                    <a 
                        class="navbar-brand" 
                        href="<?php echo home_url('/'); ?>"
                    >
                        <img 
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_light.svg" 
                            alt="Logo" 
                            class="img-fluid"
                        >
                    </a>
                </div>
            </div>
        </nav>
    </header>