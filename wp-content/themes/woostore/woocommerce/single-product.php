<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


//  Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. 

get_header( 'shop' ); ?>
<div id="content" class="shop-content">
    <div class="product-box category-product-page">
        <div class="container glo-container glo-swiper-container px-xl-5">
            <div class="row m-0">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 shop-title">
                    <?php
						/**
						 * woocommerce_before_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
						 * @hooked woocommerce_breadcrumb - 20
						 */
						do_action( 'woocommerce_before_main_content' );
					?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                    <div class="shop-sidebar glo-shop-sidebar">
                        <?php
							/**
							 * woocommerce_sidebar hook.
							 *
							 * @hooked woocommerce_get_sidebar - 10
							 */
							do_action( 'woocommerce_sidebar' );
						?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <?php while ( have_posts() ) : ?>
                    <?php the_post(); ?>

                    <?php wc_get_template_part( 'content', 'single-product' ); ?>

                    <?php endwhile; // end of the loop. ?>

                    <?php
							/**
							 * woocommerce_after_main_content hook.
							 *
							 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
							 */
							do_action( 'woocommerce_after_main_content' );
						?>
                </div>

            </div>
        </div>

    </div>
</div>
</div>
<?php get_footer( 'shop' ); ?>