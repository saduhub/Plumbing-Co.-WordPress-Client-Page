<?php 
  get_header(); 
  pageBanner(array(
    'title' => 'All Events',
    'subtitle' => 'Checkout all of the events!'
  ));
?>

<div class="container container--narrow page-section">
  <?php
    while(have_posts()) {
      the_post();
      get_template_part('template-parts/content', 'event');
    }
  ?>
  <?php echo paginate_links(); ?>
  <hr class="section-break">
  <!-- Highlighting events tab when navigating to past events can be done by altering code in header.php. (Global 36) -->
  <p>Past events <a href="<?php echo site_url('/past-events');?>">here</a>.</p>
</div>

<?php get_footer(); ?>