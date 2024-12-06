<?php get_header(); ?>

<h1>Index</h1>

<?php if (get_search_query()!== ''): ?>
    <h2>
        Recherche pour :
        <strong><?php echo get_search_query(); ?></strong>
    </h2>
<?php endif ?>

<?php get_footer(); ?>