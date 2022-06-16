<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Glotech JSC</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php bloginfo('stylesheet_directory'); ?>/lib/owlcarousel/assets/owl.carousel.min.css"
        rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css" rel="stylesheet">

    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/child.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
    <!-- Topbar Start -->
    <div class="header-top">
        <div class="container glo-container px-xl-5">
            <div class="row align-items-center py-3">
                <div class="col-lg-3 d-none d-lg-block header-logo">
                    <a href="<?php bloginfo('url'); ?>" class="text-decoration-none">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/Logo-retina.png"
                            alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
                <div class="col-lg-5 col-6 text-left">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for products">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-6 text-right">
                    <a href="" class="btn text-while header-top-right">
                        <i class="fas fa-user"></i>
                        <span class="badge">Sign in</span>
                    </a>
                    <a href="" class="btn text-while header-top-right">
                        <i class="fas fa-heart"></i>
                        <span class="badge">Wishlist</span>
                    </a>
                    <a href="" class="btn text-while header-top-right header-button-cart">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="badge">Cart $0.00</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Topbar End -->

    <div class="header-under">
        <div class="container px-xl-5">
            <div class="row border-top  ">
                <div class="col-lg-3 d-none d-lg-block">
                    <a class="btn shadow-none d-flex align-items-center justify-content-between text-white w-100"
                        data-toggle="collapse" href="#navbar-vertical" id="test-ca"
                        style="height: 65px; margin-top: -1px; padding: 0 30px;">
                        <h6 class="m-0">ALL DEPARTMENTS</h6>
                        <i class="fa fa-angle-down text-dark"></i>
                    </a>
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

                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                        <a href="" class="text-decoration-none d-block d-lg-none">
                            <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                    class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <div class="main-menu">
                                    <?php wp_nav_menu( 
                                    array( 
                                        'theme_location' => 'header-menu', //id tạo menu
                                        'container' => 'false', 
                                        'menu_id' => 'header-menu', 
                                        'menu_class' => 'header-menu'
                                    ) 
                                    ); ?>
                                </div>
                            </div>
                            <div class="navbar-nav ml-auto py-0">
                                <a class="text-dark px-2" href="">
                                    <i class="fas fa-phone-volume"></i> Call +0123456789 <span>|</span>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="text-dark pl-2" href="">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>