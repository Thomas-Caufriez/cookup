<?php get_header(); 

if (get_search_query()!== ''): ?>
    <h2>
        Recherche pour :
        <strong><?php echo get_search_query(); ?></strong>
    </h2>
<?php endif ?>

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
                        Descendant
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
                        Ascendant
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
<?php $current_user = wp_get_current_user(); ?>
<div class="container-fluid sticky-bottom text-center p-0 bg-primary">
    <div class="d-flex row-cols-3">
        <button
            class="btn btn-primary col"
            type="button"
        >
            <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_light.svg" 
                alt="Icones carrote steak et feuille" 
                width="60px"
                height="48px"
            >
            <p class="navbar-text">Ingrédients</p>
        </button>
        <button
            class="btn btn-primary col"
            type="button"
        >
            <img 
                src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_dark.svg" 
                alt="Icones carrote steak et feuille" 
                width="60px"
                height="48px"
            >
            <p class="navbar-text">Plats</p>
        </button>
        <a
            class="btn btn-primary col" 
            href="<?php echo home_url('/login'); ?>"
        >
            <p class="navbar-text">
                <?php 
                    if (is_user_logged_in()) {
                        echo get_avatar($current_user->ID, 48, 'identicon', 'photo de profil', array('class' => 'rounded-circle')) . '<br>' . ("profil");
                        }
                    else {
                        echo get_avatar('', 48, 'mystery', 'photo de profil pas connecté', array('class' => 'rounded-circle')) . '<br>' . ("Se connecter");
                        }
                ?>
            </p>
        </a>
    </div>
</div>
<?php 
get_footer(); 
?>