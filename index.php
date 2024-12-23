<?php get_header(); 

if (get_search_query()!== ''): ?>
    <h2>
        Recherche pour :
        <strong><?php echo get_search_query(); ?></strong>
    </h2>
<?php endif ?>

<div class="container-fluid px-2 px-md-4">
	<div class="container">
    	<form method="get" class="d-flex align-items-center" id="filterform">
			<div class="dropdown my-3"> <!-- Bouton de filtre -->
				<button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
					<img src="" alt="Icône Filtre" width="20px" height="20px">
				</button>
				<div class="dropdown-menu" aria-labelledby="filterDropdown">
					<div>
						<input type="radio" class="btn-check" name="filterval" id="filterradio1" value=1 autocomplete="off" <?php echo (isset($_GET['filterval']) && $_GET['filterval'] == 1) ? 'checked' : ''; ?>>
						<label class="btn w-100 rounded-0" for="filterradio1">Date descendant</label>
					</div>
					<div>
						<input type="radio" class="btn-check" name="filterval" id="filterradio2" value=2 autocomplete="off" <?php echo (isset($_GET['filterval']) && $_GET['filterval'] == 2) ? 'checked' : ''; ?>>
						<label class="btn w-100 rounded-0" for="filterradio2">Date ascendant</label>
					</div>
					<div>
						<input type="radio" class="btn-check" name="filterval" id="filterradio3" value=3 autocomplete="off" <?php echo (isset($_GET['filterval']) && $_GET['filterval'] == 3) ? 'checked' : ''; ?>>
						<label class="btn w-100 rounded-0" for="filterradio3">Difficulté</label>
					</div>
					<div>
						<input type="radio" class="btn-check" name="filterval" id="filterradio4" value=4 autocomplete="off" <?php echo (isset($_GET['filterval']) && $_GET['filterval'] == 4) ? 'checked' : ''; ?>>
						<label class="btn w-100 rounded-0" for="filterradio4">Prix</label>
					</div>
				</div>
			</div>
		</form>
  	</div>
  	<div class="row row-cols-2 row-cols-md-4 g-2 g-md-4">
	  <?php 

        $filterval = isset($_GET['filterval']) ? intval($_GET['filterval']) : 1;

        $args = [
            'post_type' => 'creation_recette',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
			'posts_per_page' => -1,
        ];

        switch ($filterval) {
            case 1:
                $args['orderby'] = 'date';
                $args['order'] = 'DESC';
                break;

            case 2:
                $args['orderby'] = 'date';
                $args['order'] = 'ASC';
                break;

            case 3:
                $args['meta_key'] = 'difficulte_recette';
                $args['orderby'] = 'meta_value';
                $args['order'] = 'ASC';
                break;

            case 4:
                $args['meta_key'] = 'prix';
                $args['orderby'] = 'meta_value_num';
                $args['order'] = 'ASC';
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
<script>
	document.addEventListener('DOMContentLoaded', function () {
  const dropdown = document.getElementById('filterDropdown');
  const form = document.getElementById('filterform');

  dropdown.addEventListener('hide.bs.dropdown', function () {
  if (document.querySelector('input[name="filterval"]:checked')) {
    form.submit();
  }
});
});
</script>
<?php 
get_footer(); 
?>