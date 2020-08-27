<?php

/**
 * diegolaloggia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package diegolaloggia
 */

if (!function_exists('dll_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dll_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on diegolaloggia, use a find and replace
		 * to change 'dll' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('dll', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'menu-1' => esc_html__('Primary', 'dll'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('dll_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'dll_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dll_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('dll_content_width', 640);
}
add_action('after_setup_theme', 'dll_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dll_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'dll'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'dll'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'dll_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function dll_scripts()
{
	wp_enqueue_style('dll-style', get_stylesheet_uri());

	wp_enqueue_script('dll-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

	wp_enqueue_script('dll-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'dll_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load CSS & JS scripts.
 */
require get_template_directory() . '/inc/scripts.php';

/**
 * Load CSS & JS scripts.
 */
require get_template_directory() . '/inc/landings.php';


/**
 * Sensei.
 */
add_action('after_setup_theme', 'declare_sensei_support');
function declare_sensei_support()
{
	add_theme_support('sensei');
}
function buy_now_submit_form()
{
?>
	<script>
		jQuery(document).ready(function() {
			// listen if someone clicks 'Buy Now' button
			jQuery('#buy_now_button').click(function() {
				// set value to 1
				jQuery('#is_buy_now').val('1');
				//submit the form
				jQuery('form.cart').submit();
			});
		});
	</script>
<?php
}
add_action('woocommerce_after_add_to_cart_form', 'buy_now_submit_form');
// add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');
// function redirect_to_checkout($redirect_url)
// {
// 	if (isset($_REQUEST['is_buy_now']) && $_REQUEST['is_buy_now']) {
// 		global $woocommerce;
// 		$redirect_url = wc_get_checkout_url();
// 	}
// 	return $redirect_url;
// }
add_filter('woocommerce_product_tabs', 'misha_remove_description_tab', 11);

function misha_remove_description_tab($tabs)
{

	unset($tabs['description']);
	unset($tabs['additional_information']);
	unset($tabs['reviews']);
	return $tabs;
}
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

function woocommerce_template_single_title_custom()
{
	$additional_text = '';
	the_title('<h2 class="product_title entry-title">', $additional_text . '</h2>');
}
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title_custom', 5);


function woocommerce_products_payments()
{
	get_template_part('template-parts/woo/product', 'payments');
}
add_action('woocommerce_before_add_to_cart_button', 'woocommerce_products_payments', 5);

function woocommerce_products_intro()
{
	echo 'Un curso de Diego La Loggia <br/>';
	the_field('docentes');
}
add_action('woocommerce_single_product_summary', 'woocommerce_products_intro', 5);

/**
 * Remove related products output
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/**
 * Inner menu
 */
function register_my_menu()
{
	register_nav_menu('inner', __('Inner Menu'));
}

add_action('init', 'register_my_menu');

add_filter('auto_update_plugin', '__return_false');

// add_filter( 'woocommerce_cart_item_quantity', 'wc_cart_item_quantity', 10, 3 );
// function wc_cart_item_quantity( $product_quantity, $cart_item_key, $cart_item ){
//     if( is_cart() ){
//         $product_quantity = sprintf( '%2$s <input type="hidden" name="cart[%1$s][qty]" value="%2$s" />', $cart_item_key, $cart_item['quantity'] );
//     }
//     return $product_quantity;
// }
// function woocommerce_quantity_input_max_callback( $max, $product ) {
// 	$max = 1;  
// 	return $max;
// }
// add_filter( 'woocommerce_quantity_input_max', 'woocommerce_quantity_input_max_callback', 10, 2 );
// function wc_qty_add_product_field() {

// 	echo '<div class="options_group">';
// 	woocommerce_wp_text_input( 
// 		array( 
// 			'id'          => '_wc_min_qty_product', 
// 			'label'       => __( 'Minimum Quantity', 'woocommerce-max-quantity' ), 
// 			'placeholder' => '',
// 			'desc_tip'    => 'true',
// 			'description' => __( 'Optional. Set a minimum quantity limit allowed per order. Enter a number, 1 or greater.', 'woocommerce-max-quantity' ) 
// 		)
// 	);
// 	echo '</div>';

// 	echo '<div class="options_group">';
// 	woocommerce_wp_text_input( 
// 		array( 
// 			'id'          => '_wc_max_qty_product', 
// 			'label'       => __( 'Maximum Quantity', 'woocommerce-max-quantity' ), 
// 			'placeholder' => '',
// 			'desc_tip'    => 'true',
// 			'description' => __( 'Optional. Set a maximum quantity limit allowed per order. Enter a number, 1 or greater.', 'woocommerce-max-quantity' ) 
// 		)
// 	);
// 	echo '</div>';	
// }
// add_action( 'woocommerce_product_options_inventory_product_data', 'wc_qty_add_product_field' );
add_filter('woocommerce_endpoint_orders_title', 'change_my_account_edit_account_title', 10, 2);
function change_my_account_edit_account_title($title, $endpoint)
{
	$title = __("Cursos adquiridos", "woocommerce");

	return $title;
}
function wpb_woo_my_account_order()
{
	$myorder = array(
		'my-courses' => __('Mis cursos', 'sensei'),
		'edit-account'       => __('Modificar mi cuenta', 'woocommerce'),
		'orders'             => __('Cursos adquiridos', 'woocommerce'),
		// 'payment-methods'    => __('Medios de pago', 'woocommerce'),
		'customer-logout'    => __('Logout', 'woocommerce'),
	);

	return $myorder;
}
add_filter('woocommerce_account_menu_items', 'wpb_woo_my_account_order');

// add_filter('woocommerce_checkout_coupon_message', 'bbloomer_have_coupon_message');

// function bbloomer_have_coupon_message()
// {
// 	return '<i class="fa fa-ticket" aria-hidden="true"></i> ¿Tienes un cupón? <a href="#" class="showcoupon">Click here to enter your discount code</a>';
// }

// function bt_rename_coupon_field_on_cart( $translated_text, $text, $text_domain ) {
// 	// bail if not modifying frontend woocommerce text
// 	if ( is_admin() || 'woocommerce' !== $text_domain ) {
// 		return $translated_text;
// 	}
// 	if ( 'Coupon:' === $text ) {
// 		$translated_text = 'Por favor, si tenés más de un cupón ingresalos de a uno y luego hacé click en "Aplicar cupón". De esta manera se aplicará el descuento correspondiente por cupón:';
// 	}

// 	return $translated_text;
// }
// add_filter( 'gettext', 'bt_rename_coupon_field_on_cart', 10, 3 );
// add_filter( 'woocommerce_coupon_error', 'bt_rename_coupon_label', 10, 3 );
// add_filter( 'woocommerce_coupon_message', 'bt_rename_coupon_label', 10, 3 );
// add_filter( 'woocommerce_cart_totals_coupon_label', 'bt_rename_coupon_label',10, 1 );
// add_filter( 'woocommerce_checkout_coupon_message', 'bt_rename_coupon_message_on_checkout' );