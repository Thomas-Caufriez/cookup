<?php get_header(); ?>

<h1>Index</h1>

<?php if (get_search_query()!== ''): ?>
    <h2>
        Recherche pour :
        <strong><?php echo get_search_query(); ?></strong>
    </h2>
<?php endif ?>

<div class="container">
    <?php
    $recettes = new WP_Query([
      'post_type' => 'creation_recette',
      'post_status' => 'publish'
    ]);

    if ($recettes->have_posts()) :
    ?>
        <?php while ($recettes->have_posts()) : $recettes->the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <a href="<?php the_permalink(); ?>">voir la recette</a>
        <?php
          endwhile;
        ?>
      </div>
    <?php endif; ?>
</div>

<?php 
get_footer('bis');
get_footer(); 
?>