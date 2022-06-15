<nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
    id="navbar-vertical">
    <div class="navbar-nav w-100 overflow-hidden sidebar-nav" style="height: 600px">
        <?php wp_nav_menu( 
                array( 
                    'theme_location' => 'category-product-menu', //id tạo menu
                    'container' => 'false', 
                    'menu_id' => 'category-product-menu', 
                    'menu_class' => 'category-product-menu',
                ) 
            ); ?>

    </div>
</nav>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-home') ) : ?><?php endif; ?>