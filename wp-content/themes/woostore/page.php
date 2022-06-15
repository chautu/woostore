<?php get_header(); ?>
<div id="content">
    <div class="product-box glo-page-category">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                    
                    <h1 class="glo-single-title"> <?php the_title(); ?> </h1>
                    <div class="glo-single-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="glo-comment-facebook">
                        <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%"
                            data-numposts="5"></div>
                    </div>
                    <?php endwhile;?>
                    <?php endif; ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                    <?php get_template_part('layout/share/sidebar'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>