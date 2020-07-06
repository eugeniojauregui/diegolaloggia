<?php

function wp_scripts_destinemos()
{
    /** CSS * */
    wp_enqueue_style('proxima', get_template_directory_uri() . '/fonts/fonts.css');

    /** JS * */
    wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.js', array(), '1.8.0', true);
    wp_enqueue_script('scroller', get_template_directory_uri() . '/js/scroller.js', array(), '1.0.0', true);
    wp_enqueue_script('fontawesome', '//use.fontawesome.com/83616f5206.js', array(), '1.0.0', true);

    if (is_front_page()) {
        // /** CSS * */
        wp_enqueue_style('lightslider', get_template_directory_uri() . '/js/lightslider.css');

        // /** JS * */
        // wp_enqueue_script('drslider', get_template_directory_uri() . '/js/drslider.js', array(), '0.9.4', true);
        wp_enqueue_script('lightslider', get_template_directory_uri() . '/js/lightslider.js', array(), '0.9.4', true);
        wp_enqueue_script('homejs', get_template_directory_uri() . '/js/home-scripts.js', array(), '0.9.4', true);
    }
    if (wp_is_mobile()) {
    } else {
    }
    if (is_sensei()) {
        wp_enqueue_style( 'dll-sensei-style', get_template_directory_uri() . '/sensei.css' );
    } else {
    }

    // }

}
add_action('wp_enqueue_scripts', 'wp_scripts_destinemos');
