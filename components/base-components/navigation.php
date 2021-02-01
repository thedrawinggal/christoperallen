<?php
$display_banner = get_field('display_banner');
?>

<header class="site-header<?php if($display_banner || is_front_page()): echo '-banner'; endif; ?> fade-reveal">
  <div class="site-header-bar <?php if(is_front_page()): echo 'home'; endif; ?>"></div>
  <div class="site-header-content <?php if(is_front_page()): echo 'home'; endif; ?>">
  <div class="site-header-content-info">
    <div class="page-title <?php if(is_front_page()): echo 'home'; endif; ?>">
      <?php //the_title(); ?>
      <?php
         if($post->post_parent) {
            $parent_title = get_the_title($post->post_parent);
            echo $parent_title;
         }
         else {
            echo get_the_title($post->ID);
         }
      ?>
    </div>
    <div class="logo <?php if(is_front_page()): echo 'home'; endif; ?>">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-nav<?php if($display_banner): echo '-white'; endif; ?>.png"  />
      </a>
    </div>
  </div>
  <div class="site-header-content-menu-icon menu-trigger">
    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/menu<?php if($display_banner): echo '-white'; endif; ?>.svg" />
  </div>
</header>

<nav class="site-header-menu">
  <div class="site-header-menu-nav-items">
    <div class="site-header-menu-nav-items-content">
      <div class="close menu-trigger">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/close.svg" />
      </div>
      <div class="logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-nav.png" />
        </a>
      </div>
      <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
    </div>
  </div>
  <div class="site-header-menu-image menu-trigger">
    <div class="site-header-menu-image-content">
      <div class="close">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/close.svg" />
      </div>
    </div>
  </div>
</nav>
