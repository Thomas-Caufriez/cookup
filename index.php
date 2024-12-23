<?php get_header(); 

if (get_search_query()!== ''): ?>
    <h2>
        Recherche pour :
        <strong><?php echo get_search_query(); ?></strong>
    </h2>
<?php endif ?>

<div class="container-fluid px-2 px-md-4">
	<div class="dropdown my-3"> <!-- Bouton de filtre -->
    	<button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        	<img src="" alt="Icône Filtre" width="20px" height="20px">
    	</button>
    	<ul class="dropdown-menu" aria-labelledby="filterDropdown">
    		<li><a class="dropdown-item filter" href="#" data-value="filterdate">Date de publication</a></li>
        	<li><a class="dropdown-item filter" href="#" data-value="filtertime">Temps</a></li>
        	<li><a class="dropdown-item filter" href="#" data-value="filterdifficulty">Difficulté</a></li>
        	<li><a class="dropdown-item filter" href="#" data-value="filterprice">Prix</a></li>
    	</ul>
  	</div>
  	<div class="row row-cols-2 row-cols-md-4 g-2 g-md-4">
    	<?php $recettes = new WP_Query([
        	'post_type' => 'creation_recette',
        	'post_status' => 'publish'
      		]);

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
<script> // je met une balise script car mon javascript n'est pas pris en compte dans le fichier js pour une raison obscure. Permet de sortir la valeur choisie dans le filtre
  	document.querySelectorAll('.filter').forEach(function(item) {
  		item.addEventListener('click', function(event) {
      		event.preventDefault();
      		const selectedValue = this.getAttribute('data-value');
      		console.log('Option sélectionnée :', selectedValue);
    	});
  	});
</script>
<?php 
get_footer(); 
?>