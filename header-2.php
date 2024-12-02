<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0"
    >
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a 
                class="navbar-brand" 
                href="<?php echo home_url('/'); ?>"
            >
                <div class="container text-center">
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                        alt="Retour" 
                        width="30" 
                        height="24"
                    >
                    <p>
                        Retour
                    </p>
                </div>
            </a>
            <a 
                class="navbar-brand" 
                href="<?php echo home_url('/'); ?>"
            >
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
                    alt="Cookup" 
                    width="30" 
                    height="24"
                >
            </a>
        </div>
    </nav>