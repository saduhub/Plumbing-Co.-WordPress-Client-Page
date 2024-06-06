<?php 

    get_header();

    while( have_posts()) {
        the_post(); ?>
        <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg')?>)"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title(); ?></h1>
                <div class="page-banner__intro">
                <p>Learn how the school of your dreams got started.</p>
                </div>
            </div>
        </div>

        <div class="container container--narrow page-section">
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Programs</a><span class="metabox__main"><?php the_title(); ?></span></p>
            </div>
            <div class="generic-content"><?php the_content(); ?></div>

            <?php
                // Query for professors.
                $relatedProfessors = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'professor',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'related_programs',
                            'compare' => 'LIKE',
                            'value' => '"' . get_the_ID() . '"'
                        )
                    )
                ));
        
                if ($relatedProfessors->have_posts()) {
                    echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">' . get_the_title() . ' Professors</h2>';
        
                while($relatedProfessors->have_posts()) {
                    $relatedProfessors->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php }
                }
        
                wp_reset_postdata();
                // Query for events.
                $today = date('Ymd');
                $homePageEvents = new WP_Query (array(
                    'posts_per_page' => 2,
                    'post_type' => 'event',
                    'meta_key' => 'event_date',
                    'orderby' => 'event_value_num',
                    'order' => 'DESC',
                    'meta_query' => array(
                      array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                      ),
                      array(
                        'key' => 'related_programs',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                      ),
                    )
                ));

                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">Upcoming Related Events</h2>';

                while ($homePageEvents->have_posts()) {
                    $homePageEvents->the_post();
            ?>
                <div class="event-summary">
                    <a class="event-summary__date event-summary__date t-center" href="<?php the_permalink();?>">
                    <span class="event-summary__month">
                      <?php 
                        $eventDate = new DateTime(get_field('event_date'));
                        echo $eventDate->format('M');
                      ?>
                    </span>
                    <span class="event-summary__day"><?php echo $eventDate->format('d');?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                        <!-- By adding an excerpt to the WP admin page and the corresponding PHP, the blogs and events in the main page can show a desired description instead of the first 4 words. Trim remains a fallback.(31 global) -->
                        <!-- Excerpt support must be added to custom post types. -->
                        <p><?php echo wp_trim_words(get_the_content(), 4); ?><a href="<?php the_permalink();?>" class="nu gray">Learn more</a></p>
                    </div>
                </div>
            <?php
            
                }
                // Reset after making custom query.
                // wp_reset_postdata();

            ?>

        </div>
    <?php }

    get_footer();

?>