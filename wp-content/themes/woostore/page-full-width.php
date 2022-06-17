<?php 
    /* Template Name: Page full width */
?>


<?php get_header(); ?>
<<<<<<< .mine
<div id="content" class=" ">
    <div class="product-box  glo-page-category pt-5 px-xl-5">
=======
<div id="content" class="shop-content-card">
    <div class="product-box glo-page-category pt-5 px-xl-5">
>>>>>>> .theirs
        <div class="container glo-container">
            <div class="row px-xl-5">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <?php setpostview(get_the_ID()); ?>
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
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>