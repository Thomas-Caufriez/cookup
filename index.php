<?php get_header(); 

$current_user = wp_get_current_user();

if (get_search_query()!== ''): ?>
    <h2>
        Recherche pour :
        <strong><?php echo get_search_query(); ?></strong>
    </h2>
<?php endif ?>

<div>

<!-- Navbar en version desktop -->
<div class="container-fluid text-center p-0 z-3 sticky-top d-none d-md-block bgLightPerso">
        <div class="d-flex row-cols-3">
            <button
                class="btn col animationBarDesktop"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#filterIngredients"
                aria-expanded="false"
                aria-controls="filterIngredients"
            >
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/iconIngrédients.svg" 
                    alt="Icones carrote steak et feuille" 
                    class="iconIndex"
                >
                <p class="navbar-text hSalsaNav m-0 p-0">Ingrédients <hr class="hrDesktop"></p>
            
            </button>
            <button
                class="btn col animationBarDesktop"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#filterPlats"
                aria-expanded="false"
                aria-controls="filterPlats"
            >
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/iconPlats.svg" 
                    alt="Icones carrote steak et feuille" 
                    class="iconIndex"
                >
                <p class="navbar-text hSalsaNav m-0 p-0">Plats<hr class="hrDesktop"></p>
            </button>
            <a
                class="btn col animationBarDesktop" 
                href="<?php echo home_url('/login'); ?>"
            >
                <p class="navbar-text hSalsaNav m-0 p-0">
                    <?php 
                        if (is_user_logged_in()) {
                            echo get_avatar($current_user->ID, 48, 'identicon', 'photo de profil', array('class' => 'iconIndex  rounded-circle')) . '<br>' . ("Profil"). '<hr class="hrDesktop">';
                            }
                        else {
                            echo get_avatar('', 48, 'mystery', 'photo de profil pas connecté', array('class' => 'iconIndex rounded-circle')) . '<br>' . ("Se connecter"). '<hr class="hrDesktop">';
                            }
                    ?>
                </p>
            </a>
        </div>
    </div>
    <!-- Menus cachés -->
    <div class="row position-absolute p-0 m-0 vw-100 row-cols-1 row-cols-sm-3">

        <!-- Ingredients -->
        <div 
            class="col z-2 collapse bg-white"
            id="filterIngredients"
        >
            
            <form 
                method="GET" 
                action="<?php echo esc_url(home_url()); ?>"
            >
                <div class="text-center d-flex align-items-center justify-content-center w-100">
                    <button 
                        class="btn-close"
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#filterIngredients" 
                        aria-expanded="false" 
                        aria-controls="filterIngredients"
                    >
                    </button>
                    <h2 class="h2Salsa my-4 mx-4">Filtrer par ingrédients</h2>
                </div>
                <div class="allCardsIngredients">
                    <?php
                        $ingredients = [
                            'Prot.animale' => [
                                'background' => 'prot.Animale.webp',
                            ],
                            'Légumineuse' => [
                                'background' => 'légumineuse.webp',
                            ],
                            'Céréale / Grain' => [
                                'background' => 'céréaleGrain.webp',
                            ],
                            'Noix / Graine' => [
                                'background' => 'noixGraine.webp',
                            ],
                            'Fruit' => [
                                'background' => 'fruit.webp',
                            ],
                            'Légume' => [
                                'background' => 'légume.webp',
                            ],
                            'Prot.laitier' => [
                                'background' => 'prod.laitier.webp',
                            ],
                        ];
                        foreach ($ingredients as $ingredient => $ingreVal): 
                    ?>
                        <div>
                            <input 
                                class="btn-check " 
                                type="checkbox" 
                                role="switch" 
                                value="<?php echo $ingredient; ?>" 
                                id="<?php echo $ingredient; ?>"
                                name="ingredients[]"
                            >
                            <label 
                                class="d-flex justify-content-between w-100 btn cardsIngredients cardsIngredientsOff" 
                                for="<?php echo $ingredient; ?>"
                                style="background-image: url('<?php echo get_template_directory_uri() . '/assets/img/' . $ingreVal['background']; ?>'); background-size: cover; object-fit: cover; background-position: center;"
                            >
                                <div class="px-5 d-flex align-items-center justify-content-center">
                                    <p class="pRobotoLogin m-0"><?php echo ucfirst($ingredient); ?></p>
                                </div>
                                <img class="bulletOff-On" src="<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg"> <!-- changer ici pour le bullet !inversé! -->
                            </label>
                        </div> 
                        <?php endforeach; ?>
                </div>
                <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center my-4 mx-auto">Filtrer par ingrédients</button>
            </form>
        </div>

        <!-- Plats -->
        <div 
            class="col offset-sm-4 z-2 collapse bg-white"
            id="filterPlats"
        >
            <form 
                method="GET" 
                action="<?php echo esc_url(home_url()); ?>"
            >
                <div class="text-center d-flex align-items-center justify-content-center w-100">
                    <button 
                        class="btn-close" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#filterPlats" 
                        aria-expanded="false" 
                        aria-controls="filterPlats"
                    >
                    </button>
                    <h2 class="h2Salsa my-4 mx-4">Filtrer par plats</h2>
                </div>
                <div>
                    <?php
                        $dishtypes = [
                            'Entrée' => [
                                'background' => 'entrée.webp',
                            ],
                            'Principal' => [
                                'background' => 'principal.webp',
                            ],
                            'International' => [
                                'background' => 'international.webp',
                            ],
                            'Brunch' => [
                                'background' => 'brunch.webp',
                            ],
                            'Assortiment' => [
                                'background' => 'assortiment.webp',
                            ],
                            'Snack / Enca' => [
                                'background' => 'snackEnca.webp',
                            ],
                            'Déssert' => [
                                'background' => 'dessert.webp',
                            ],
                            'Boisson' => [
                                'background' => 'boisson.webp',
                            ],
                        ];
                        foreach ($dishtypes as $dishtype => $dishVal): 
                    ?>
                    <div> 
                        <input 
                            class="btn-check" 
                            type="radio" 
                            role="switch" 
                            value="<?php echo $dishtype; ?>" 
                            id="<?php echo $dishtype; ?>"
                            name="dishtype"
                        >
                        <label 
                            class="d-flex justify-content-between w-100 btn cardsPlats cardsPlatsOff" 
                            for="<?php echo $dishtype; ?>"
                            style="background-image: url('<?php echo get_template_directory_uri() . '/assets/img/' . $dishVal['background']; ?>'); background-size: cover; object-fit: cover; background-position: center;"
                        >
                            <div class="px-5 d-flex align-items-center justify-content-center">
                                <p class="pRobotoLogin m-0"><?php echo ucfirst($dishtype); ?></p>
                            </div>
                            <!-- L'image pour le bulletOff qui sera modifiée en bulletOn via le CSS -->
                            <img class="bulletOff-On" src="<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg"> 
                        </label>
                    </div>
                        <?php endforeach; ?>
                </div>
                <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center my-4 mx-auto">Filtrer par plats</button>
            </form>
        </div>
    </div>
</div>

<!-- Bouton de filtre -->
<div class="container-fluid px-2 px-md-4">
    <form 
        method="get" 
        class="my-3"
    >
        <div class="btn-group">
            <button 
                type="submit" 
                class="btn btn-primary"
            >
                Filtrer
            </button>
            <button 
                type="button" 
                class="btn btn-primary dropdown-toggle dropdown-toggle-split" 
                data-bs-toggle="dropdown" 
                aria-expanded="false"
            >
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" >
                <div>
                    <input 
                        type="radio" 
                        class="btn-check" 
                        name="filterval" 
                        id="filterradio1" 
                        value=1 
                        autocomplete="off" 
                        <?php echo (isset($_GET['filterval']) && $_GET['filterval'] == 1) ? 'checked' : ''; ?>
                    >
                    <label 
                        class="btn w-100 rounded-0" 
                        for="filterradio1"
                    >
                        Date
                    </label>
                </div>
                <div>
                    <input 
                        type="radio" 
                        class="btn-check" 
                        name="filterval" 
                        id="filterradio2" 
                        value=2 
                        autocomplete="off" 
                        <?php echo (isset($_GET['filterval']) && $_GET['filterval'] == 2) ? 'checked' : ''; ?>
                    >
                    <label 
                        class="btn w-100 rounded-0" 
                        for="filterradio2"
                    >
                        Temps
                    </label>
                </div>
                <div>
                    <input 
                        type="radio" 
                        class="btn-check" 
                        name="filterval" 
                        id="filterradio3" 
                        value=3 
                        autocomplete="off" 
                        <?php echo (isset($_GET['filterval']) && $_GET['filterval'] == 3) ? 'checked' : ''; ?>
                    >
                    <label 
                        class="btn w-100 rounded-0" 
                        for="filterradio3"
                    >
                        Difficulté
                    </label>
                </div>
                <div>
                    <input 
                        type="radio" 
                        class="btn-check" 
                        name="filterval" 
                        id="filterradio4" 
                        value=4 
                        autocomplete="off" 
                        <?php echo (isset($_GET['filterval']) && $_GET['filterval'] == 4) ? 'checked' : ''; ?>
                    >
                    <label 
                        class="btn w-100 rounded-0" 
                        for="filterradio4"
                    >
                        Prix
                    </label>
                </div>
                <hr class="dropdown-divider">
                <div>
                    <input 
                        type="radio" 
                        class="btn-check" 
                        name="filterAscDesc" 
                        id="filterAscDesc1" 
                        value ="DESC" 
                        autocomplete="off" 
                        <?php echo (isset($_GET['filterAscDesc']) && $_GET['filterAscDesc'] == 'DESC') ? 'checked' : ''; ?>
                    >
                    <label 
                        class="btn w-100 rounded-0" 
                        for="filterAscDesc1"
                    >
                        Décroissant
                    </label> <!-- descendant = DESC = plus grand au plus petit (plus récent au plus vieux) -->
                </div>
                <div>
                    <input 
                        type="radio" 
                        class="btn-check" 
                        name="filterAscDesc" 
                        id="filterAscDesc2" 
                        value="ASC" 
                        autocomplete="off" 
                        <?php echo (isset($_GET['filterAscDesc']) && $_GET['filterAscDesc'] == 'ASC') ? 'checked' : ''; ?>
                    >
                    <label 
                        class="btn w-100 rounded-0" 
                        for="filterAscDesc2"
                    >
                        Croissant
                    </label> <!-- inverse note au dessus -->
                </div>
            </div>
        </div>
    </form>
  	<div class="row row-cols-2 row-cols-md-4 g-2 g-md-4 allCardsIndex">
	  <?php 

        $filterval = isset($_GET['filterval']) ? intval($_GET['filterval']) : 1;
        $filterAscDesc = isset($_GET['filterAscDesc']) ? sanitize_text_field($_GET['filterAscDesc']) : 'DESC';
        $dishtype = isset($_GET['dishtype']) ? sanitize_text_field($_GET['dishtype']) : '';
        $ingredients = isset($_GET['ingredients']) ? array_map('sanitize_text_field', $_GET['ingredients']) : [];

        // Arguments par défaut
        $args = [
            'post_type' => 'creation_recette',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => -1,
        ];

        // Premier filtre (date, temps, prix, difficulté)
        switch ($filterval) {
            case 1:
                $args['orderby'] = 'date';
                $args['order'] = $filterAscDesc;
                break;
            case 2:
                $args['meta_key'] = 'temps';
                $args['orderby'] = 'meta_value_num';
                $args['order'] = $filterAscDesc;
                break;
            case 3:
                $args['meta_key'] = 'difficulte';
                $args['orderby'] = 'meta_value_num';
                $args['order'] = $filterAscDesc;
                break;
            case 4:
                $args['meta_key'] = 'prix';
                $args['orderby'] = 'meta_value_num';
                $args['order'] = $filterAscDesc;
                break;
            default:
                break;
        }

        if (!empty($ingredients) || !empty($dishtype)) {
            $args['meta_query'] = [];
        }

        // Filtre par ingrédients
        if (!empty($ingredients)) {
            $meta_query_ingredients = [];
            foreach ($ingredients as $ingredient) { // crée un tableau avec pour chaque ingrédient, une clé, une valeur et un comparatif
                $meta_query_ingredients[] = [
                    'key' => 'ingredients',
                    'value' => $ingredient,
                    'compare' => 'LIKE', // fait que si un post a un élément compris dans le tableau, il ne sera pas affiché
                ];
            }
            $args['meta_query'][] = [
                'relation' => 'OR',
                ...$meta_query_ingredients, // '...' permet de décomposer le tableau
            ];
        }

        // Filtre par type de plat
        if (!empty($dishtype)) {
            $args['meta_query'][] = [
                'key' => 'dishtype',
                'value' => $dishtype,
                'compare' => '=',
            ];
        }

        // Exécuter la requête
        $recettes = new WP_Query($args);

        // Boucle des recettes
        if ($recettes->have_posts()) :
            while ($recettes->have_posts()) : $recettes->the_post(); ?>
                <div class="col containerCard">
                    <div class="card">
                        <a href="<?php the_permalink(); ?>" class="text-body text-decoration-none">
                            <?php the_post_thumbnail([512, 219], ['class' => 'card-img-top']); ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                                <img 
                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/iconFavoris.svg" 
                                    alt="Coeur like"
                                >
                                <p class="text-end">0 likes</p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endwhile;
        else :
            echo "<h1 class='text-center w-100 h2Salsa'>Aucune recette trouvée.<h1>";
        endif;
        ?>
    </div>
</div>

<!-- Navbar en version mobile -->
<div class="container-fluid text-center mt-auto sticky-bottom p-0 z-3 d-md-none bgLightPerso">
    <div class="d-flex row-cols-3">
        <button
            class="btn col animationBarMobile"
            type="button "
            data-bs-toggle="collapse"
            data-bs-target="#filterIngredients"
            aria-expanded="false"
            aria-controls="filterIngredients"
        >
        <hr class="hrMobile">
            <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/img/iconIngrédients.svg" 
                alt="Icones carrote steak et feuille" 
                class="iconIndex"
            >
            <p class="navbar-text h2Salsa m-0 p-0">Ingrédients</p>
        </button>
        <button
            class="btn col animationBarMobile"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#filterPlats"
            aria-expanded="false"
            aria-controls="filterPlats"
        >
        <hr class="hrMobile">
            <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/img/iconPlats.svg" 
                alt="Icones carrote steak et feuille" 
                class="iconIndex"
            >
            <p class="navbar-text h2Salsa m-0 p-0">Plats</p>
        </button>
        <a
            class="btn col animationBarMobile" 
            href="<?php echo home_url('/login'); ?>"
        >
        <hr class="hrMobile">
            <p class="navbar-text h2Salsa m-0 p-0">
                <?php 
                    if (is_user_logged_in()) {
                        echo get_avatar($current_user->ID, 48, 'identicon', 'photo de profil', array('class' => 'iconIndex rounded-circle')) . '<br>' . ("Profil");
                        }
                    else {
                        echo get_avatar('', 48, 'mystery', 'photo de profil pas connecté', array('class' => 'iconIndex rounded-circle')) . '<br>' . ("Se connecter");
                        }
                ?>
            </p>
        </a>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>