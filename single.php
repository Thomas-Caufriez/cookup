<?php get_header('bis') ?>

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
        
        <h1><?php the_title(); ?></h1>
        <div><?php the_post_thumbnail(); ?></div>
        <div><?php the_content(); ?></div>
        <p>Temps de préparation : <?php echo esc_html($ptime); ?> minutes</p>
        <p>Difficulté : <?php echo esc_html($pdifficulty); ?></p>
        <?php echo esc_html($ptime); ?><br>
        <?php echo esc_html($pdifficulty); ?><br>
        <?php echo esc_html($pprice); ?><br>
        <?php echo esc_html($dishtype); ?><br>
        <?php echo esc_html($nbrperson); ?><br>
        <?php echo esc_html($preparation); ?><br>
        <?php echo esc_html($status); ?><br>
        <?php
    endwhile;
endif;
?>

<?php get_footer() ?>