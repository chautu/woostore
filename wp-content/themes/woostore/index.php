<?php get_header(); ?>
<?php get_template_part('header-content'); ?>

<div class="container glo-container  pt-5 px-xl-5">
    <div class="swiper mySwiper ">
        <div class="swiper-wrapper glo-swiper-container">
            <?php
				$args = array(
                    'type'      => 'product',
                    'child_of'  => 0,
                    'parent'    => 41,
                    'hide_empty' => 0,
                    'taxonomy'	=> 'product_cat',
                    // 'number'	=> 5
                );
                $categories = get_categories( $args );
                
                foreach ( $categories as $category ) { ?>
            <?php 
                    $thumbnail_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                ?>
            <div class="swiper-slide">
                <a href="<?php echo get_term_link($category->slug, 'product_cat'); ?>">
                    <img src="<?php echo $image; ?>" alt="<?php echo $category->name; ?>">
                    <h4 class="glo-swiper-text"><?php echo $category->name; ?></h4>
                </a>
            </div>
            <?php } ?>
        </div>
        <div class="swiper-button-next"> ></div>
        <div class="swiper-button-prev"><</div>
    </div>




    <div class=" pt-5">
        <div class="row pb-3">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 order-lg-0 order-1 pb-1">
                <div class="cat-item d-flex flex-column mb-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-1 order-0">
                <div class="cat-item d-flex flex-column mb-4" style="padding-left: 20px;">
                    <div class="glo-text-center">
                        <span class="glo-text-tile">WE LOVE THEM</span>
                        <h2 class="glo-h2-title">Top selling products</h2>
                    </div>
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#all">Show All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#new">New Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#trending">Trending</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-xl-5">
                            <div class="tab-pane active" id="all">
                                <div class="content-product-box">
                                    <div class="row">
                                        <?php $args = array( 
                                            'post_type' => 'product',
                                            'posts_per_page' => -1,); ?>
                                        <?php $getposts = new WP_query( $args);?>
                                        <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                                        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                        <?php global $product; ?>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                            <?php get_template_part('content/item_product'); ?>
                                        </div>
                                        <?php endwhile;  wp_reset_postdata(); ?>
                                    </div>
                                    <?php if(paginate_links()!='') {?>
                                    <div class="quatrang">
                                        <?php
                                                        global $wp_query;
                                                        $big = 999999999;
                                                        echo paginate_links( array(
                                                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                                            'format' => '?paged=%#%',
                                                            'prev_text'    => __('«'),
                                                            'next_text'    => __('»'),
                                                            'current' => max( 1, get_query_var('paged') ),
                                                            'total' => $wp_query->max_num_pages
                                                            ) );
                                                        ?>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="tab-pane fade" id="new">
                                <div class="row">
                                    <?php $args = array( 
                                            'post_type' => 'product',
                                            'posts_per_page' => 10,); ?>
                                    <?php $getposts = new WP_query( $args);?>
                                    <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                    <?php global $product; ?>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <?php get_template_part('content/item_product'); ?>
                                    </div>
                                    <?php endwhile;  wp_reset_postdata(); ?>
                                </div>
                                <?php if(paginate_links()!='') {?>
                                <div class="quatrang">
                                    <?php
                                                        global $wp_query;
                                                        $big = 999999999;
                                                        echo paginate_links( array(
                                                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                                            'format' => '?paged=%#%',
                                                            'prev_text'    => __('«'),
                                                            'next_text'    => __('»'),
                                                            'current' => max( 1, get_query_var('paged') ),
                                                            'total' => $wp_query->max_num_pages
                                                            ) );
                                                        ?>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="trending">
                                <div class="row">
                                    <?php $tax_query[] = array(
                                                    'taxonomy' => 'product_visibility',
                                                    'field'    => 'name',
                                                    'terms'    => 'featured',
                                                    'operator' => 'IN',
                                                );
                                            ?>
                                    <?php $args = array( 'post_type' => 'product','posts_per_page' => 8,'ignore_sticky_posts' => 1, 'tax_query' => $tax_query); ?>
                                    <?php $getposts = new WP_query( $args);?>
                                    <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <?php get_template_part('content/item_product'); ?>
                                    </div>
                                    <?php endwhile;  wp_reset_postdata(); ?>
                                </div>
                                <?php if(paginate_links()!='') {?>
                                <div class="quatrang">
                                    <?php
                                                            global $wp_query;
                                                            $big = 999999999;
                                                            echo paginate_links( array(
                                                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                                                'format' => '?paged=%#%',
                                                                'prev_text'    => __('«'),
                                                                'next_text'    => __('»'),
                                                                'current' => max( 1, get_query_var('paged') ),
                                                                'total' => $wp_query->max_num_pages
                                                                ) );
                                                            ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="glo-banner-img"
                    style="background-image: url('<?php bloginfo('stylesheet_directory'); ?>/img/Banner.jpeg')">
                    <div class="glo-banner">
                        <p class="glo-banner-text">Start your day with tasty organic veggies</p>
                        <button type="button" class="glo-button">Start Shopping Now!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <?php get_footer(); ?>