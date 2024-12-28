<?php get_header('bis') ?>

<div class="d-flex align-items-center justify-content-center mt-3 mb-3">
    <img    
        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconUstensileBlack.svg" 
        alt="icon ustensile"
        class="iconLogin me-2"
    >
    <h1 class="text-center mt-3 mb-3 h2Salsa">Détail du plat</h1>
</div>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        $tags = [
            'temps' => [
                1 => '-30min',
                2 =>  '+30min',
                3 => '+1h'
            ],
            'difficulte' => [
                1 => 'Facile',
                2 => 'Moyen',
                3 => 'Difficile'
            ],
            'prix' => [
                1 => '-15€',
                2 =>  '+15€',
                3 => '+30€'
            ],
        ];
        $ptime = get_post_meta(get_the_ID(), 'temps', true);
        $pdifficulty = get_post_meta(get_the_ID(), 'difficulte', true);
        $pprice = get_post_meta(get_the_ID(), 'prix', true);
        $descingredient = get_post_meta(get_the_ID(), 'descingredient', true);
        $nbrperson = get_post_meta(get_the_ID(), 'nbrperson', true);
        $preparation = get_post_meta(get_the_ID(), 'preparation', true);
    ?>
        <div class="container-fluid">
            <div class="container-fluid text-center my-3 p-0">
                <figure class="figure">
                    <h2 class="text-start" 
                    style="font-weight: medium; font-family: var(--font-salsa); font-size: max(15px, 1.2vw);" >
                        <?php the_title(); ?>
                    </h2>
                    <?php the_post_thumbnail(array(1024, 438), array('class' => 'figure-img img-fluid rounded')); ?>
                    <figcaption 
                        class="figure-caption text-start pRobotoThinLogin" style="font-weight: 400 ;">Publié par <em style= "background: var(--custom-gradient-background-color); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold"><?php the_author(); ?></em>
                    </figcaption>
                </figure>
            </div>
            <div class="d-flex justify-content-around align-items-center mb-4 mb-md-5">
                <div class="py-2 px-2 border-gradient pRobotoLogin" style="font-weight: bold;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconTemps.svg" alt="icon temps" class="iconLogin me-2">
                    <?php echo $tags['temps'][$ptime]; ?>
                </div>
                <div class="py-2 px-2 border-gradient pRobotoLogin" style="font-weight: bold;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconDifficulté.svg" alt="icon difficulte" class="iconLogin me-2">
                    <?php echo $tags['difficulte'][$pdifficulty]; ?>
                </div>
                <div class="py-2 px-2 border-gradient pRobotoLogin" style="font-weight: bold;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconEuro.svg" alt="icon prix" class="iconLogin me-2">
                    <?php echo $tags['prix'][$pprice]; ?>
                </div>
            </div>
            <div class="accordion" id="accordionrecipe">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button 
                            class="accordion-button" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseOne" 
                            aria-expanded="true" 
                            aria-controls="collapseOne"
                        >
                            Description du plat
                        </button>
                    </h2>
                    <div 
                        id="collapseOne" 
                        class="accordion-collapse collapse show" 
                        data-bs-parent="#accordionrecipe"
                    >
                        <div class="accordion-body">
                            <?php nl2br(the_content()); // nl2br pour prendre en compte les balises <br> misent en place car the_content ou esc_html ne les prends pas en compte ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button 
                            class="accordion-button collapsed" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseTwo" 
                            aria-expanded="false" 
                            aria-controls="collapseTwo"
                        >
                            Ingrédients du plat
                        </button>
                    </h2>
                    <div 
                        id="collapseTwo" 
                        class="accordion-collapse collapse" 
                        data-bs-parent="#accordionrecipe"
                    >
                        <div class="accordion-body">
                            <p>Pour <?php echo esc_html($nbrperson); ?> personnes</p>
                            <p><?php echo nl2br(esc_html($descingredient)); ?></p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button 
                            class="accordion-button collapsed" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseThree" 
                            aria-expanded="false" 
                            aria-controls="collapseThree"
                        >
                            Recette à suivre
                        </button>
                    </h2>
                    <div 
                        id="collapseThree" 
                        class="accordion-collapse collapse" 
                        data-bs-parent="#accordionrecipe"
                    >
                        <div class="accordion-body pRobotoLogin">
                            <?php echo nl2br(esc_html($preparation)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endwhile;
endif;
?>

<?php get_footer() ?>