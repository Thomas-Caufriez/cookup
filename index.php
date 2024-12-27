<?php get_header(); 

$current_user = wp_get_current_user();

if (get_search_query()!== ''): ?>
    <h2>
        Recherche pour :
        <strong><?php echo get_search_query(); ?></strong>
    </h2>
<?php endif ?>
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
            <p class="navbar-text h2Salsa m-0 p-0">Ingrédients <hr class="hrDesktop"></p>
           
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
            <p class="navbar-text h2Salsa m-0 p-0">Plats<hr class="hrDesktop"></p>
        </button>
        <a
            class="btn col animationBarDesktop" 
            href="<?php echo home_url('/login'); ?>"
        >
            <p class="navbar-text h2Salsa m-0 p-0">
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
  	<div class="row row-cols-2 row-cols-md-4 g-2 g-md-4">
	  <?php 

        $filterval = isset($_GET['filterval']) ? intval($_GET['filterval']) : 1;
        $filterAscDesc = isset($_GET['filterAscDesc']) ? $_GET['filterAscDesc'] : 'DESC';

        $args = [   // arguments par défaut
            'post_type' => 'creation_recette',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
			'posts_per_page' => -1,
        ];

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

        // Exécuter la requête WP_Query
        $recettes = new WP_Query($args);

      		if ($recettes->have_posts()) :
    			 while ($recettes->have_posts()) : $recettes->the_post(); ?>
          			<div class="col">
					  <div class="card">
						<a href="<?php the_permalink(); ?>" class="text-body text-decoration-none">
							<?php the_post_thumbnail(array(512, 219), array('class' => 'card-img-top')); ?>
							<div class="card-body">
								<h5 class="card-title"><?php the_title(); ?></h5>
								<p class="card-text"><?php the_excerpt() ?></p>
							</div>
						</a>
					  </div>
					</div>
        		<?php endwhile;?>
      		<?php endif; ?>
  	</div>
</div>

<!-- Deuxième barre de navigation -->

<!-- Ingredients -->
<div class="row position-absolute p-0 m-0 vw-100 filtreDesktop">
    <div 
        class="collapse z-2 bg-white col-md-4 col-12"
        id="filterIngredients"
    >
        <div class="container text-center d-flex justify-content-start align-items-center w-100 my-3 mx-md-0 ">
            <button
                class="btn pRobotoLogin bg-light"
                style="border: none; background: var(--custom-gradient-background-color);
                background-size: 150%; 
                background-position: 30% 70%;
                color: white;
                font-weight: bold;
                opacity: 0.8;"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#filterIngredients"
                aria-expanded="false"
                aria-controls="filterIngredients"
            >
                Fermer
            </button>
            <h2 class="h2Salsa mx-4 my-auto">Filtrer par ingrédients</h2>
        </div>
        <div class="col container-fluid allCardsIngredients">
            <?php
            $buttonsIngredients = [
                ['id' => 'bulletToggleBtnIngredients', 'img' => 'prot.Animale.webp', 'label' => 'Prot.animale'],
                ['id' => 'bulletToggleBtnIngredients2', 'img' => 'Végétarien.webp', 'label' => 'Végétarien'],
                ['id' => 'bulletToggleBtnIngredients3', 'img' => 'légumineuse.webp', 'label' => 'Légumineuse'],
                ['id' => 'bulletToggleBtnIngredients4', 'img' => 'céréaleGrain.webp', 'label' => 'Céréale / Grain'],
                ['id' => 'bulletToggleBtnIngredients5', 'img' => 'noixGraine.webp', 'label' => 'Noix / Graine'],
                ['id' => 'bulletToggleBtnIngredients6', 'img' => 'fruit.webp', 'label' => 'Fruit'],
                ['id' => 'bulletToggleBtnIngredients7', 'img' => 'légume.webp', 'label' => 'Légume'],
                ['id' => 'bulletToggleBtnIngredients8', 'img' => 'prod.laitier.webp', 'label' => 'Prot.laitier']
            ];

            foreach ($buttonsIngredients as $indexIngredients => $button) {
                $toggleIdIngredients = 'toggleBullet' . ($indexIngredients + 1);
            ?>
            <input type="checkbox" id="<?php echo $toggleIdIngredients; ?>" style="display:none;">
            <button class="container-fluid btn cardsIngredients cardsIngredientsOff" id="<?php echo $button['id']; ?>">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $button['img']; ?>" 
                    alt=<?php echo $button['label']; ?>
                    class="img-fluid imgIngredients"
                >
                <div class="px-5 d-flex align-items-center justify-content-center">
                    <span class="pRobotoLogin"><?php echo $button['label']; ?></span>
                </div>

                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg" 
                    alt="bullet"
                    class="bulletOff-On"
                >
            </button>
            <?php } ?>
        </div>
    </div>

    <!-- Plats -->
    <div 
        class="collapse z-2 bg-white col-md-4 col-12 mx-auto"
        id="filterPlats"
    >
        <div class="container text-center d-flex justify-content-start align-items-center w-100 my-3 mx-md-0 ">
            <button
                class="btn pRobotoLogin bg-light"
                style="border: none; background: var(--custom-gradient-background-color);
                background-size: 150%; 
                background-position: 30% 70%;
                color: white;
                font-weight: bold;
                opacity: 0.8;"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#filterPlats"
                aria-expanded="false"
                aria-controls="filterPlats"
            >
                Fermer
            </button>
            <h2 class="h2Salsa mx-4 my-auto">Filtrer par plats</h2>
        </div>
        <div class="col container-fluid allCardsPlats">
            <?php
            $buttonsPlats = [
                ['id' => 'bulletToggleBtnPlats', 'img' => 'entrée.webp', 'label' => 'Entrée'],
                ['id' => 'bulletToggleBtnPlats2', 'img' => 'principal.webp', 'label' => 'Principal'],
                ['id' => 'bulletToggleBtnPlats3', 'img' => 'international.webp', 'label' => 'International'],
                ['id' => 'bulletToggleBtnPlats4', 'img' => 'brunch.webp', 'label' => 'Brunch'],
                ['id' => 'bulletToggleBtnPlats5', 'img' => 'assortiment.webp', 'label' => 'Assortiment'],
                ['id' => 'bulletToggleBtnPlats6', 'img' => 'snackEnca.webp', 'label' => 'Snack / Enca'],
                ['id' => 'bulletToggleBtnPlats7', 'img' => 'déssert.webp', 'label' => 'Déssert'],
                ['id' => 'bulletToggleBtnPlats8', 'img' => 'boisson.webp', 'label' => 'Boisson']
            ];

            foreach ($buttonsPlats as $indexPlats => $button) {
                $toggleIdPlats = 'toggleBullet' . ($indexPlats + 1);
            ?>
            <input type="checkbox" id="<?php echo $toggleIdPlats; ?>" style="display:none;">
            <button class="container-fluid btn cardsPlats cardsPlatsOff" id="<?php echo $button['id']; ?>">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $button['img']; ?>" 
                    alt=<?php echo $button['label']; ?>
                    class="img-fluid imgPlats"
                >
                <div class="px-5 d-flex align-items-center justify-content-center">
                    <span class="pRobotoLogin"><?php echo $button['label']; ?></span>
                </div>

                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg" 
                    alt="bullet"
                    class="bulletOff-On"
                >
            </button>
            <?php } ?>
        </div>
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

<!-- script js pour faire fonctionner les boutons + img des filtres -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fonction générique pour gérer les boutons
    function setupButtonGroup(buttonGroupConfig) {
        const {
            buttons, 
            exclusiveButtons = {}, 
            maxSelections = null,
            onlyOneGroup = false
        } = buttonGroupConfig;

        buttons.forEach(function(item) {
            const toggleCheckbox = document.getElementById(item.toggleId);
            const bulletImage = item.btn.querySelector('.bulletOff-On');

            item.btn.addEventListener('click', function() {
                // Gestion des boutons exclusifs
                if (exclusiveButtons[item.btn.id]) {
                    const exclusiveButtonId = exclusiveButtons[item.btn.id];
                    const exclusiveButton = buttons.find(b => b.btn.id === exclusiveButtonId);
                    const exclusiveCheckbox = document.getElementById(exclusiveButton.toggleId);
                    const exclusiveBulletImage = exclusiveButton.btn.querySelector('.bulletOff-On');

                    // Désactiver le bouton exclusif si actif, indépendamment de l'état actuel
                    if (exclusiveCheckbox.checked) {
                        exclusiveCheckbox.checked = false;
                        exclusiveBulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg';
                        exclusiveButton.btn.classList.remove('cardsIngredientsOn');
                        exclusiveButton.btn.classList.add('cardsIngredientsOff');
                    }
                }

                // Gestion de la sélection unique par groupe
                if (onlyOneGroup) {
                    buttons.forEach(otherItem => {
                        if (otherItem !== item) {
                            const otherCheckbox = document.getElementById(otherItem.toggleId);
                            const otherBulletImage = otherItem.btn.querySelector('.bulletOff-On');
                            otherCheckbox.checked = false;
                            otherBulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg';
                            otherItem.btn.classList.remove('cardsPlatsOn');
                            otherItem.btn.classList.add('cardsPlatsOff');
                        }
                    });
                }

                // Gestion du nombre maximum de sélections
                if (maxSelections !== null) {
                    const activeButtons = buttons.filter(b => 
                        document.getElementById(b.toggleId).checked
                    );

                    if (activeButtons.length >= maxSelections && !toggleCheckbox.checked) {
                        // Désactiver le bouton le plus ancien si la limite est atteinte
                        const oldestActiveButton = activeButtons[0];
                        const oldestCheckbox = document.getElementById(oldestActiveButton.toggleId);
                        const oldestBulletImage = oldestActiveButton.btn.querySelector('.bulletOff-On');
                        oldestCheckbox.checked = false;
                        oldestBulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg';
                        oldestActiveButton.btn.classList.remove('cardsIngredientsOn');
                        oldestActiveButton.btn.classList.add('cardsIngredientsOff');
                    }
                }

                // Basculement de l'état du bouton
                toggleCheckbox.checked = !toggleCheckbox.checked;

                // Mise à jour visuelle
                if (toggleCheckbox.checked) {
                    bulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOn.svg';
                    item.btn.classList.add(onlyOneGroup ? 'cardsPlatsOn' : 'cardsIngredientsOn');
                    item.btn.classList.remove(onlyOneGroup ? 'cardsPlatsOff' : 'cardsIngredientsOff');
                } else {
                    bulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg';
                    item.btn.classList.remove(onlyOneGroup ? 'cardsPlatsOn' : 'cardsIngredientsOn');
                    item.btn.classList.add(onlyOneGroup ? 'cardsPlatsOff' : 'cardsIngredientsOff');
                }
            });
        });
    }

    // Configuration pour les ingrédients
    setupButtonGroup({
        buttons: [
            <?php foreach ($buttonsIngredients as $indexIngredients => $button) { ?>
            { 
                btn: document.getElementById('<?php echo $button['id']; ?>'), 
                toggleId: 'toggleBullet<?php echo ($indexIngredients + 1); ?>'
            }<?php echo ($indexIngredients < count($buttonsIngredients) - 1 ? ',' : ''); ?>
            <?php } ?>
        ],
        exclusiveButtons: {
            'bulletToggleBtnIngredients': 'bulletToggleBtnIngredients2',
            'bulletToggleBtnIngredients2': 'bulletToggleBtnIngredients'
        },
        maxSelections: null  // Pas de limite de sélection
    });

    // Configuration pour les plats
    setupButtonGroup({
        buttons: [
            <?php foreach ($buttonsPlats as $indexPlats => $button) { ?>
            { 
                btn: document.getElementById('<?php echo $button['id']; ?>'), 
                toggleId: 'toggleBullet<?php echo ($indexPlats + 1); ?>'
            }<?php echo ($indexPlats < count($buttonsPlats) - 1 ? ',' : ''); ?>
            <?php } ?>
        ],
        onlyOneGroup: true  // Un seul bouton actif à la fois
    });
});

// permet de cacher un des deux menus de la navbar si l'autre est ouvert
const collapseIngredients = document.getElementById('filterIngredients');
const collapsePlats = document.getElementById('filterPlats');

const btnIngredients = document.querySelector('[data-bs-target="#filterIngredients"]');
const btnPlats = document.querySelector('[data-bs-target="#filterPlats"]');

btnIngredients.addEventListener('click', function () {
    if (collapsePlats.classList.contains('show')) {
        collapsePlats.classList.remove('show');
    }
  });

  btnPlats.addEventListener('click', function () {
    if (collapseIngredients.classList.contains('show')) {
        collapseIngredients.classList.remove('show');
    }
  });
</script>

    <?php wp_footer(); ?>
</body>
</html>