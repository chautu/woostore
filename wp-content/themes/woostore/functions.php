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
