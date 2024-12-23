<?php get_header('bis') ?>

<h1 class="text-center mt-3">Détail du plat</h1>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        $ptime = get_post_meta(get_the_ID(), 'temps', true);
        $pdifficulty = get_post_meta(get_the_ID(), 'difficulte', true);
        $pprice = get_post_meta(get_the_ID(), 'prix', true);
        $dishtype = get_post_meta(get_the_ID(), 'dishtype', true);
        $descingredient = get_post_meta(get_the_ID(), 'descingredient', true);
        $nbrperson = get_post_meta(get_the_ID(), 'nbrperson', true);
        $preparation = get_post_meta(get_the_ID(), 'preparation', true);
        $status = get_post_meta(get_the_ID(), 'status', true);
        $proteine = get_post_meta(get_the_ID(), 'proteine', true);
    ?>
        <div class="container-fluid">
            <div class="container-fluid text-center my-3">
                <figure class="figure">
                    <h2 class="text-start">
                        <?php the_title(); ?>
                    </h2>
                    <?php the_post_thumbnail(array(1024, 438), array('class' => 'figure-img img-fluid rounded')); ?>
                    <figcaption 
                        class="figure-caption text-start">Publié par <em class="text-primary"><?php the_author(); ?></em>
                    </figcaption>
                </figure>
            </div>
            <div class="d-flex justify-content-around mb-3">
                <div class="border border-2 border-primary rounded p-2">
                    <?php echo esc_html($ptime); ?>
                </div>
                <div class="border border-2 border-primary rounded p-2">
                    <?php echo esc_html($pdifficulty); ?>
                </div>
                <div class="border border-2 border-primary rounded p-2">
                    <?php echo esc_html($pprice); ?>
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
                        <div class="accordion-body">
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