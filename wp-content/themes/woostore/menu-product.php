<nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border-top-0 border-bottom-0 sidebar-contain"
    id="navbar-vertical">
    <div class="navbar-nav w-100 overflow-hidden sidebar-nav" style="height: 630px;">
        <div class="menu-category">
            <?php wp_nav_menu( 
                array( 
                    'theme_location' => 'category-product-menu', //id tạo menu
                    'container' => 'false', 
                    'menu_id' => 'category-product-menu', 
                    'menu_class' => 'category-product-menu',
                ) 
            ); ?>
        </div>
    </div>
</nav>