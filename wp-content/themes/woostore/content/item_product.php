<?php global $product; ?>


<div class="card product-item border-0 mb-4">
    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
        <a href="<?php the_permalink(); ?>">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'thumnail', array( 'class' =>'thumnail') ); ?>
        </a>
    </div>
    <!-- sale product -->
        <?php if($product->is_on_sale()){?>
        <span class="sale">Giảm
            <?php echo percentSale($product->get_regular_price(), $product->get_sale_price()); ?>%</span>
        <?php } ?>
    <!-- end sale product -->
    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
        <h6 class="text-truncate mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
        <div class="d-flex justify-content-center">
            <h6><?php echo $product->get_sale_price(); ?></h6>
            <h6 class="text-muted ml-2"><del><?php echo $product->get_regular_price(); ?></del></h6> 
        </div>
    </div>
    <div class="card-footer d-flex justify-content-between bg-light border">
        <a href="<?php the_permalink(); ?>" class="btn btn-sm text-dark p-0"><i
                class="fas fa-eye text-primary mr-1"></i></a>
        <a href="?add-to-cart=<?php the_ID(); ?>" class="btn btn-sm text-dark p-0"><i
                class="fas fa-shopping-cart text-primary mr-1"></i></a>
    </div>
</div>
