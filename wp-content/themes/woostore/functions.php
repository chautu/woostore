 <?php
    //support theme woocommerce
    function my_custom_wc_theme_support() {
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
    add_action( 'after_setup_theme', 'my_custom_wc_theme_support' );
    

    function initTheme(){
        //chuyen trinh soan thao wordpress phien ban cu
        add_filter('use_block_editor_for_post', '__return_false');

        //dky menu
        register_nav_menu('header-menu', __('Menu main'));
        register_nav_menu('category-product-menu', __('Menu category product'));
        register_nav_menu('left-menu', __('Menu left'));

        //xoa widget moi
        remove_theme_support('widgets-block-editor');
        
    }
    add_action('init', 'initTheme');
    
    //custom-post-type-trong-wordpress-dung-toolset.html
    function slider_post_type(){
        /*
         * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
         */
        $label = array(
            'name' => 'Ảnh slider', //Tên post type dạng số nhiều
            'singular_name' => 'Ảnh slider' //Tên post type dạng số ít
        );
     
        /*
         * Biến $args là những tham số quan trọng trong Post Type
         */
        $args = array(
            'labels' => $label, //Gọi các label trong biến $label ở trên
            'description' => 'Ảnh slider', //Mô tả của post type
            'supports' => array(
                'title',
                'thumbnail'
            ), //Các tính năng được hỗ trợ trong post type
            'taxonomies' => array( 'category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
            'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
            'public' => true, //Kích hoạt post type
            'show_ui' => true, //Hiển thị khung quản trị như Post/Page
            'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
            'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
            'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
            'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
            'menu_icon' => 'dashicons-slides', //Đường dẫn tới icon sẽ hiển thị
            'can_export' => true, //Có thể export nội dung bằng Tools -> Export
            'has_archive' => true, //Cho phép lưu trữ (month, date, year)
            'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
            'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
            'capability_type' => 'post' //
        );
     
        register_post_type('slider', $args); //Tạo post type với slug tên là slider và các tham số trong biến $args ở trên
     
    }
    add_action('init', 'slider_post_type');