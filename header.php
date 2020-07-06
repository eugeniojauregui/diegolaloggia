<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package diegolaloggia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'dll'); ?></a>

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if (is_front_page() && is_home()) :
				?>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php bloginfo('template_directory'); ?>/img/logo-dll.svg" alt="<?php bloginfo('name'); ?>" /></a></h1>
				<?php
				else :
				?>
					<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php bloginfo('template_directory'); ?>/img/logo-dll.svg" alt="<?php bloginfo('name'); ?>" /></a></p>
				<?php
				endif;
				?>
			</div><!-- .site-branding -->
			<div class="users">
				<?php $current_user = wp_get_current_user(); ?>
				<?php if (is_user_logged_in()) { ?>
					<div class="user-name"><?php echo 'Bienvenid@ ' . $current_user->user_firstname; ?> </div> |
					<a href="<?php echo esc_url(home_url('/')); ?>my-courses">
						<div>Mis cursos</div>
					</a> |
					<a href="<?php echo esc_url(home_url('/')); ?>my-account">
						<div>Mi cuenta</div>
					</a> |
					<a href="<?php echo wp_logout_url(home_url()); ?>">
						<div>Cerrar sesión</div>
					</a>
				<?php } else { ?>
					<div class="user-name"><a href="<?php echo esc_url(home_url('/')); ?>my-account">INGRESAR <img src="<?php bloginfo('template_directory'); ?>/img/icon-enter.svg" alt="Ingresar" /></a></div>
				<?php } ?>
			</div>
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'dll'); ?></button>
				<?php
				if (is_front_page()) {
					wp_nav_menu(array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					));
				} else {
					wp_nav_menu(array(
						'theme_location' => 'inner',
						'menu_id' => 'primary-menu',
					));
				}
				?>
				<?php ?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">