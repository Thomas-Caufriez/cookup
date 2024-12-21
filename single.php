<?php get_header('bis') ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        $ptime = get_post_meta(get_the_ID(), 'ptime', true);
        $pdifficulty = get_post_meta(get_the_ID(), 'pdifficulty', true);
        ?>
        
        <h1><?php the_title(); ?></h1>
        <div><?php the_post_thumbnail(); ?></div>
        <div><?php the_content(); ?></div>
        <p>Temps de préparation : <?php echo esc_html($ptime); ?> minutes</p>
        <p>Difficulté : <?php echo esc_html($pdifficulty); ?></p>
        <?php
    endwhile;
endif;
?>

<?php get_footer() ?>