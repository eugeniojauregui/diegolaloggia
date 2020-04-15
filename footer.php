<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package diegolaloggia
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="social">
		<ul>
			<li>
				<a href="https://www.facebook.com/Diego-La-Loggia-155916145154624/" target="_blank">
					<img src="<?php bloginfo('template_directory'); ?>/img/icon-facebook.svg" alt="Facebook" />
					<div class="social-name">Facebook</div>
				</a>
			</li>
			<li>
				<a href="https://www.instagram.com/diegolaloggia/?hl=es" target="_blank">
					<img src="<?php bloginfo('template_directory'); ?>/img/icon-instagram.svg" alt="Instagram" />
					<div class="social-name">Instagram</div>
				</a>
			</li>
			<li>
				<a href="mailto:diegolaloggia@gmail.com" target="_blank">
					<img src="<?php bloginfo('template_directory'); ?>/img/icon-mailing.svg" alt="Email" />
					<div class="social-name">diegolaloggia@gmail.com</div>
				</a>
			</li>
		</ul>
	</div>
	<div class="site-info">
		Copyright <?= date('Y') ?> © Diego La Loggia
		<span class="sep"> | </span>
		Diseño y Desarrollo por <a href="https://www.graphicmo.com.ar">graphicmo </a>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>