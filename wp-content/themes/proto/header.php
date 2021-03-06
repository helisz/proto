<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link href="https://fonts.googleapis.com/css?family=Dosis:400,600|Lato:300,400,700" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
     <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
     <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
         <header class="site-header navbar-static-top <?php echo wp_bootstrap_starter_header_class(); ?>" role="banner">
            <div class="container">
                <nav class="navbar navbar-expand-sm p-0">
                    <div class="navbar-brand">
                       <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                            <a href="<?php echo esc_url( home_url( '/' )); ?>">
                                <img src="<?php echo esc_attr(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                            </a>
                        <?php else : ?>
                            <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                        <?php endif; ?> 
                        <!--
                        <a class="brand-logo" href="<?php echo esc_url( home_url( '/' )); ?>">
                            <div class="square">
                                <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/02/logo_shape1.svg">
                            </div>
                            <div class="logo">
                                <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/02/logo_shape2.svg">
                            </div>
                            <div class="desc-wrapper">
                                <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/02/logo_shape3.svg">
                            </div>
                        </a>
                        -->

                    </div>
                    <button class="navbar-toggler" style="background:transparent;" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/02/bread.svg" style="width:40px;"></span>
                    </button>

                    <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'primary',
                        'container'       => 'div',
                        'container_id'    => '',
                        'container_class' => 'collapse navbar-collapse justify-content-end',
                        'menu_id'         => false,
                        'menu_class'      => 'navbar-nav',
                        'depth'           => 3,
                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                        'walker'          => new wp_bootstrap_navwalker()
                    ));
                    ?>

                </nav>
            </div>
        </header><!-- #masthead -->
        <?php if(is_front_page()): ?>
            <!-- is home page -->
        <?php endif; ?>
        <div id="content" class="site-content">
          <div class="container">
           <div class="row justify-content-md-center">
           <?php endif; ?>
