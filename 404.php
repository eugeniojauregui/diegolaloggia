<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package diegolaloggia
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title" style="text-align: center;">Mmm, algún ejercicio salió mal y no encontramos lo que buscas...</h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p  style="text-align: center;">¡Pero no hay problema, tenemos estas opciones para recomendarte!</p>
				<?php get_template_part('template-parts/home', 'courses'); ?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
