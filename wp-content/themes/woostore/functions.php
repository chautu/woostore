<<<<<<< .mine
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

    
    //xoa widget moi
    remove_theme_support('widgets-block-editor');
    //dang ky widget ----- //dky sidebar
    // if (function_exists('register_sidebar')){
    //     register_sidebar(array(
    //         'name'  => __('Trang chủ', 'text_domain'), // Ten sidebar hien thi trong admin
    //         'id' => 'sidebar-home', // ID cua sidebar khong duoc trung, dung de hien thi SB
    //         'before_widget' => '<div class="widget">', // Ban co the them Class cho SB vao day
    //         'after_widget'  => '</div>',
    //         'before_title'  => '<h3><i class="fa fa-bars"></i>', // The mo de tao tieu de chung cho tat ca cac Widget nam trong Sidebar nay
    //         'after_title'   => '</h3>', // Dong the tieu de
    //     ));
    //     register_sidebar(array(
    //         'name'  => __('Cột bên trên', 'text_domain'), // Ten sidebar hien thi trong admin
    //         'id' => 'sidebar-top', // ID cua sidebar khong duoc trung, dung de hien thi SB
    //         'before_widget' => '<div class="widget">', // Ban co the them Class cho SB vao day
    //         'after_widget'  => '</div>',
    //         'before_title'  => '<h3><i class="fa fa-bars"></i>', // The mo de tao tieu de chung cho tat ca cac Widget nam trong Sidebar nay
    //         'after_title'   => '</h3>', // Dong the tieu de
    //     ));
    // }

    
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
=======
<?php 
    //sử dụng woocommerce làm themer chính
    function my_custom_wc_theme_support() {
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
    add_action( 'after_setup_theme', 'my_custom_wc_theme_support' );

    function initTheme(){
        //xóa widget mới
        remove_theme_support('widgets-block-editor');
        // chuyển trình soạn thảo về phiên bản cũ
        add_filter('use_block_editor_for_post', '__return_false');
        // đăng ký menu 
        register_nav_menu('menu-top',__( 'Menu header' ));
        register_nav_menu('menu-main',__( 'Menu body' ));
        register_nav_menu('menu-footer',__( 'Menu footer' ));
    
        // đăng ký sidebar ( kiểm tra coi có chưa, chưa có mới đăng ký)
        if (function_exists('register_sidebar')){
            register_sidebar(array(
                'name'=> 'Cột bên',
                'id' => 'sidebar',
                'before_widget' => '<div class="widget">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3> <i class="fa fa-bars"></i>',
                'after_title'   => '</h3>',
            ));
    
            register_sidebar(array(
                'name'=> 'Cột bên TOP',
                'id' => 'sidebar-top',
                'before_widget' => '<div class="widget">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3> <i class="fa fa-bars"></i>',
                'after_title'   => '</h3>',
            ));
        }
    
        // tính lượt view bài viết
        function setpostview($postID){
            $count_key = 'views';
            $count = get_post_meta($postID, $count_key, true);
            if($count == ''){
                $count = 0;
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, '0');
            }else{
                $count ++;
                update_post_meta($postID, $count_key, $count);
            }
        }
        function getpostview($postID){
            $count_key = 'views';
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

    function wpdocs_theme_setup() {
        add_image_size( 'home-thumb', 270, 250); 
        add_image_size( 'cat-thumb', 300, 150);
    }  
    
    add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
    
?>










>>>>>>> .theirs
