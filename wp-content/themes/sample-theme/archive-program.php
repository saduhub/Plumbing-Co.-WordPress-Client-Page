<?php get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg')?>)"></div>
    <div class="page-banner__content container container--narrow">
        <!-- WP function that handles archive information: <?php the_archive_title(); ?> -->
        <!-- Granular conrol over archive information displayed is below -->
        <h1 class="page-banner__title">All Programs</h1>
        <div class="page-banner__intro">
        <p>Checkout all of the programs!</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
  <ul class="link-list min-list">
    <?php
      while(have_posts()) {
        the_post();
    ?>
    <li>
      <a href="<?php the_permalink();?>"><?php the_title();?></a>
    </li>
    <?php
      }
    ?>
  </ul>
  <?php echo paginate_links(); ?>
</div>

<?php get_footer(); ?>