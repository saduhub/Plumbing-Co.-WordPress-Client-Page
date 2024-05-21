<?php 

    get_header();

    while( have_posts()) {
        the_post(); ?>
        <h1>This is the page template that wil be used.</h1>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <hr>
    <?php }

    get_footer();

?>