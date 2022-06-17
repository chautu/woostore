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

        if (function_exists('register_sidebar')){
            register_sidebar(array(
                'name'=> 'Cột bên',
                'id' => 'sidebar',
                'before_widget' => '<div class="widget">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3> <i class="fa fa-bars"></i>',
                'after_title'   => '</h3>',
            ));
        }

        function setpostview($postID){
            $count_key ='views';
            $count = get_post_meta($postID, $count_key, true);
            if($count == ''){
                $count = 0;
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, '0');
            } else {
                $count++;
                update_post_meta($postID, $count_key, $count);
            }
        }
        
        function getpostviews($postID){
            $count_key ='views';
            $count = get_post_meta($postID, $count_key, true);
            if($count == ''){
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, '0');
                return "0";
            }
            return $count;
        }
        
    }
    add_action('init', 'initTheme');

    add_action('widgets_init', 'wplearning_widget_init');
    function wplearning_widget_init()
    {
        register_sidebar(array(
            'name'  => __('Shop', 'text_domain'), // Ten sidebar hien thi trong admin
            'id' => 'sidebar-shop', // ID cua sidebar khong duoc trung, dung de hien thi SB
            'description' => __('Thêm các widget *[Shop] ở đây', 'text_domain'), // Mo ta cho SB nay
            'before_widget' => '<section id="%1$s" class="widget %2$s">', // Ban co the them Class cho SB vao day
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">', // The mo de tao tieu de chung cho tat ca cac Widget nam trong Sidebar nay
            'after_title'   => '</h2>', // Dong the tieu de
        ));
    }
    
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

//tính giá sale
function percentSale($price, $price_sale){
    $sale =  ($price_sale*100)/$price;
    $percent = 100% - $sale;
    return number_format($percent, 1);
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_company']);
return $fields;
}

// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// add_action( 'init', 'wpcb_remove_default_sorting_storefront' );
  
// function wpcb_remove_default_sorting_storefront() {
//    remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
//    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
// }