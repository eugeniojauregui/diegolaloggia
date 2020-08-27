<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package diegolaloggia
 */

get_header();
get_template_part('template-parts/home', 'slider');
get_template_part('template-parts/home', 'axis');
get_template_part('template-parts/home', 'aboutme');
get_template_part('template-parts/home', 'courses');
get_template_part('template-parts/home', 'testimonials');
get_template_part('template-parts/home', 'contact');
get_sidebar();
get_footer();
