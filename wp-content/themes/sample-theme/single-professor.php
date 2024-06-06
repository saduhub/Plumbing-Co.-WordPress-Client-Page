<?php
  
  get_header();
  while(have_posts()) {
    the_post();

?>
<div class="container container--narrow page-section">

  <?php
    $relatedPrograms = get_field('related_programs');
    if ($relatedPrograms) {
      echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium">Subject(s) Taught</h2>';
      echo '<ul class="link-list min-list">';
      foreach($relatedPrograms as $program) { ?>
        <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
      <?php }
      echo '</ul>';
    }
  ?>

</div>
    
<?php 
  }
  get_footer();
?>