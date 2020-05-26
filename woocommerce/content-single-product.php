<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
    <?php get_template_part('template-parts/woo/product', 'content'); ?>
    <h2 class="space-up">Comprar Curso</h2>
    <section id="buy" class="course-section">
        
        <?php
        /**
         * Hook: woocommerce_before_single_product_summary.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        do_action('woocommerce_before_single_product_summary');
        ?>

        <div class="summary entry-summary">
            <?php
            /**
             * Hook: woocommerce_single_product_summary.
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40
             * @hooked woocommerce_template_single_sharing - 50
             * @hooked WC_Structured_Data::generate_product_data() - 60
             */
            do_action('woocommerce_single_product_summary');
            ?>
        </div>

        <?php
        /**
         * Hook: woocommerce_after_single_product_summary.
         *
         * @hooked woocommerce_output_product_data_tabs - 10
         * @hooked woocommerce_upsell_display - 15
         * @hooked woocommerce_output_related_products - 20
         */
        do_action('woocommerce_after_single_product_summary');
        ?>
    </section>
    <section class="lower-btns">
        <ul>
            <li data-tab="buy" class="buy">COMPRAR CURSO</li>
            <li data-tab="about">VER TEMARIO</li>
            <li data-tab="who" class="hide">VER PARTICIPANTES</li>
            <li data-tab="others" class="hide"><a href="<?php echo esc_url(home_url('/')); ?>#Courses">VER OTROS CURSOS</a></li>
        </ul>
    </section>
</div>

<?php do_action('woocommerce_after_single_product'); ?>
<div class="wp-block-group green-back">
    <div class="wp-block-group__inner-container">
        <h2 class="has-text-align-center">¿TENÉS ALGUNA CONSULTA?</h2>



        <p class="has-text-align-center"><strong>Contactanos:</strong></p>
        <?php echo do_shortcode('[contact-form-7 id="121" title="Contact form Footer"]'); ?>
    </div>
</div>
<script>
    (function($) {
        $(document).ready(function() {
            $('.tabs ul li, .lower-btns ul li, .faqs .buy').on('click', function() {
                var data = $(this).data('tab');
                console.log(data);
                $('.tabs ul li').removeClass('active');
                $(this).addClass('active');
                $('.course-section').removeClass('active');
                $('#' + data).addClass('active');
                $([document.documentElement, document.body]).animate({
                    scrollTop: $('.main-section').offset().top
                }, 1000);
                if (data === 'who') {
                    $('.main-section').hide();
                    $('.faqs').hide();
                    $('#' + data).css('width', '100%');
                } else {
                    $('.main-section').show();
                    $('.faqs').show();
                }
                if (data === 'buy') {
                    $('.main-section').hide();
                    $('#' + data).addClass('flex');
                    $('.space-up').show();
                } else {
                    $('.main-section').show();
                    $('.space-up').hide();
                }
            })
        });
    })(jQuery);
</script>