<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="<?php echo site_url() ?>"><strong>Fictional</strong> University</a>
        </h1>
        <!-- <a href="<?php echo esc_url(site_url('/search')); ?>" class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a> -->
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <?php 
                wp_nav_menu(array(
                    'theme_location' => 'headerMenuLocation'
                ));
            ?>
            <!-- Dynamic menu created on admin page. Hardcoding will be done for custom projects however, not themes uploaded to wordpress theme repository. -->
            <!-- Can insert php into a tag to dynamically insert classes that correspond to highlighting text -->
            <!-- <ul>
              <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
              <li><a href="<?php echo get_post_type_archive_link('/programs')?>">Programs</a></li>
              <li><a href="<?php echo get_post_type_archive_link('/events')?>">Events</a></li>
              <li><a href="#">Campuses</a></li>
              <li><a href="<?php echo get_post_type_archive_link('/blog')?>">Blog</a></li>
              <li><a href="<?php echo get_post_type_archive_link('/campuses')?>">Blog</a></li>
            </ul> -->
          </nav>
          <div class="site-header__util">
            <?php if(is_user_logged_in()) { ?>

            <a href="<?php echo wp_logout_url();  ?>" class="btn btn--small  btn--dark-orange float-left btn--with-photo">
            <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span>
            <span class="btn__text">Log Out</span>
            </a>

            <?php } else { ?>

            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="<?php echo esc_url(site_url('/wp-signup.php')); ?>" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>

            <?php } ?>
            <!-- <a href="<?php echo esc_url(site_url('/search')); ?>" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a> -->
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </header>
