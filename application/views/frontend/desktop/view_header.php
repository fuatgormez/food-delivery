<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="<?php echo base_url();?>public/layout/frontend/desktop/assets/images/favicon/4.png" type="image/x-icon">
    <title>On-demand last-mile delivery</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/layout/frontend/desktop/assets/css/vendors/bootstrap.css">

    <!-- wow css -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/layout/frontend/desktop/assets/css/animate.min.css" />

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/layout/frontend/desktop/assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/layout/frontend/desktop/assets/css/vendors/feather-icon.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/layout/frontend/desktop/assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/layout/frontend/desktop/assets/css/vendors/slick/slick-theme.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/layout/frontend/desktop/assets/css/bulk-style.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/layout/frontend/desktop/assets/css/style.css">
</head>

<body class="theme-color-2 bg-effect">
    <!-- Header Start -->
    <header class="header-2">
        <div class="header-notification theme-bg-color overflow-hidden py-2">
            <div class="notification-slider">
                <div>
                    <div class="timer-notification text-center">
                        <h6><strong class="me-1">Welcome to Fastkart!</strong>Wrap new offers/gift
                            every signle day on Weekends.<strong class="ms-1">New Coupon Code: Fast024
                            </strong>
                        </h6>
                    </div>
                </div>

                <div>
                    <div class="timer-notification text-center">
                        <h6>Something you love is now on sale!<a href="shop-left-sidebar.html" class="text-white">Buy
                                Now
                                !</a>
                        </h6>
                    </div>
                </div>
            </div>
            <button class="btn close-notification"><span>Close</span> <i class="fas fa-times"></i></button>
        </div>
        <div class="top-nav top-header sticky-header sticky-header-3">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar-top">
                            <button class="navbar-toggler d-xl-none d-block p-0 me-3" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="iconly-Category icli theme-color"></i>
                                </span>
                            </button>
                            <a href="<?php echo base_url();?>" class="web-logo nav-logo">
                            <?php if($this->session->userdata('store')):?>
                                <img src="<?php echo base_url('public/uploads/store/' . $this->session->userdata('store')['slug'] . '/' . $this->session->userdata('store')['logo']);?>" class="img-fluid blur-up lazyload" alt="">
                            <?php else:?>
                                <img src="<?php echo base_url('public/uploads/' . $setting['logo']);?>" class="img-fluid blur-up lazyload" alt="">
                            <?php endif;?>
                            </a>

                            <div class="search-full">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i data-feather="search" class="font-light"></i>
                                    </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                        <i data-feather="x" class="font-light"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="middle-box">
                                <div class="center-box">
                                    <div class="searchbar-box order-xl-1 d-none d-xl-block">
                                        <input type="search" class="form-control" id="exampleFormControlInput1"
                                            placeholder="search for product, delivered to your door...">
                                        <button class="btn search-button">
                                            <i class="iconly-Search icli"></i>
                                        </button>
                                    </div>
                                    <div class="location-box-2">
                                        <button class="btn location-button" data-bs-toggle="modal"
                                            data-bs-target="#locationModal">
                                            <i class="iconly-Location icli"></i>
                                            <span class="locat-name">Your Location</span>
                                            <i class="fa-solid fa-angle-down down-arrow"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="rightside-menu">
                                <div class="dropdown-dollar">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span>Language</span> <i class="fa-solid fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a id="eng" class="dropdown-item" href="javascript:void(0)">English</a>
                                            </li>
                                            <li>
                                                <a id="hin" class="dropdown-item" href="javascript:void(0)">Hindi</a>
                                            </li>
                                            <li>
                                                <a id="guj" class="dropdown-item" href="javascript:void(0)">Gujarati</a>
                                            </li>
                                            <li>
                                                <a id="arb" class="dropdown-item" href="javascript:void(0)">Arbic</a>
                                            </li>
                                            <li>
                                                <a id="rus" class="dropdown-item" href="javascript:void(0)">Rusia</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0)">Chinese</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="option-list">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)" class="header-icon user-icon search-icon">
                                                <i class="iconly-Profile icli"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="header-icon search-box search-icon">
                                                <i class="iconly-Search icli"></i>
                                            </a>
                                        </li>
                                        <li class="onhover-dropdown">
                                            <a href="javascript:void(0)" class="header-icon swap-icon">
                                                <i class="iconly-Heart icli"></i>
                                            </a>

                                        </li>
                                        <li class="onhover-dropdown">
                                            <a href="cart.html" class="header-icon bag-icon">
                                                <small class="badge-number">0</small>
                                                <i class="iconly-Bag-2 icli"></i>
                                            </a>
                                            <div class="onhover-div">
                                                <ul class="cart-list">
                                                    <li>
                                                        <div class="drop-cart">
                                                            <a href="product-left-thumbnail.html" class="drop-image">
                                                                <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/images/vegetable/product/1.png"
                                                                    class="blur-up lazyload" alt="">
                                                            </a>

                                                            <div class="drop-contain">
                                                                <a href="product-left-thumbnail.html">
                                                                    <h5>Fantasy Crunchy Choco Chip Cookies</h5>
                                                                </a>
                                                                <h6><span>1 x</span> $80.58</h6>
                                                                <button class="close-button">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="drop-cart">
                                                            <a href="product-left-thumbnail.html" class="drop-image">
                                                                <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/images/vegetable/product/2.png"
                                                                    class="blur-up lazyload" alt="">
                                                            </a>

                                                            <div class="drop-contain">
                                                                <a href="product-left-thumbnail.html">
                                                                    <h5>Peanut Butter Bite Premium Butter Cookies 600 g
                                                                    </h5>
                                                                </a>
                                                                <h6><span>1 x</span> $25.68</h6>
                                                                <button class="close-button">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="price-box">
                                                    <h5>Price :</h5>
                                                    <h4 class="theme-color fw-bold">$106.58</h4>
                                                </div>
                                                <div class="button-group">
                                                    <a href="cart.html" class="btn btn-sm cart-button">View Cart</a>
                                                    <a href="checkout.html" class="btn btn-sm cart-button theme-bg-color
                                                    text-white">Checkout</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="onhover-dropdown">
                                            <div class="delivery-login-box">
                                                <div class="delivery-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                                <div class="delivery-detail">
                                                    <h6>Hello,</h6>
                                                    <h5><?php echo $this->session->userdata('customer_session')['firstname'] ?? 'Guest';?></h5>
                                                </div>
                                            </div>
                                            <?php if(!$this->session->userdata('customer_session')):?>
                                            <div class="onhover-div onhover-div-login">
                                                <ul class="user-box-name">
                                                    <li class="product-box-contain">
                                                        <i></i>
                                                        <a href="<?php echo base_url('account/signin');?>">Log In</a>
                                                    </li>
                                                    <li class="product-box-contain">
                                                        <a href="<?php echo base_url('account/signup');?>">Register</a>
                                                    </li>

                                                    <li class="product-box-contain">
                                                        <a href="<?php echo base_url('account/forgot-password');?>">Forgot Password</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php else:?>
                                            <div class="onhover-div onhover-div-login">
                                                <ul class="user-box-name">
                                                    <li class="product-box-contain">
                                                        <i></i>
                                                        <a href="<?php echo base_url('account/dashboard');?>">Dashboard</a>
                                                    </li>
                                                    <li class="product-box-contain">
                                                        <a href="<?php echo base_url('account/logout');?>">Logout</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php endif;?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="main-nav">
                        <div class="header-nav-left">
                            <button class="dropdown-category dropdown-category-2">
                                <i class="iconly-Category icli"></i>
                                <span>All Categories</span>
                            </button>

                            <div class="category-dropdown">
                                <div class="category-title">
                                    <h5>Categories</h5>
                                    <button type="button" class="btn p-0 close-button text-content">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>

                                <ul class="category-list">
                                    <li class="onhover-category-list">
                                        <a href="javascript:void(0)" class="category-name">
                                            <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/svg/1/vegetable.svg" alt="">
                                            <h6>Vegetables & Fruit</h6>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <div class="onhover-category-box">
                                            <div class="list-1">
                                                <div class="category-title-box">
                                                    <h5>Organic Vegetables</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Potato & Tomato</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Cucumber & Capsicum</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Leafy Vegetables</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Root Vegetables</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Beans & Okra</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Cabbage & Cauliflower</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Gourd & Drumstick</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Specialty</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="list-2">
                                                <div class="category-title-box">
                                                    <h5>Fresh Fruit</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Banana & Papaya</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Kiwi, Citrus Fruit</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Apples & Pomegranate</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Seasonal Fruits</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Mangoes</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Fruit Baskets</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="onhover-category-list">
                                        <a href="javascript:void(0)" class="category-name">
                                            <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/svg/1/cup.svg" alt="">
                                            <h6>Beverages</h6>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <div class="onhover-category-box w-100">
                                            <div class="list-1">
                                                <div class="category-title-box">
                                                    <h5>Energy & Soft Drinks</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Soda & Cocktail Mix</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Soda & Cocktail Mix</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Sports & Energy Drinks</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Non Alcoholic Drinks</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Packaged Water</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Spring Water</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Flavoured Water</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="onhover-category-list">
                                        <a href="javascript:void(0)" class="category-name">
                                            <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/svg/1/meats.svg" alt="">
                                            <h6>Meats & Seafood</h6>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <div class="onhover-category-box">
                                            <div class="list-1">
                                                <div class="category-title-box">
                                                    <h5>Meat</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Fresh Meat</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Frozen Meat</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Marinated Meat</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Fresh & Frozen Meat</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="list-2">
                                                <div class="category-title-box">
                                                    <h5>Seafood</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Fresh Water Fish</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Dry Fish</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Frozen Fish & Seafood</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Marine Water Fish</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Canned Seafood</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Prawans & Shrimps</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Other Seafood</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="onhover-category-list">
                                        <a href="javascript:void(0)" class="category-name">
                                            <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/svg/1/breakfast.svg" alt="">
                                            <h6>Breakfast & Dairy</h6>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <div class="onhover-category-box">
                                            <div class="list-1">
                                                <div class="category-title-box">
                                                    <h5>Breakfast Cereals</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Oats & Porridge</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Kids Cereal</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Muesli</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Flakes</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Granola & Cereal Bars</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Instant Noodles</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Pasta & Macaroni</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Frozen Non-Veg Snacks</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="list-2">
                                                <div class="category-title-box">
                                                    <h5>Dairy</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Milk</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Curd</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Paneer, Tofu & Cream</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Butter & Margarine</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Condensed, Powdered Milk</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Buttermilk & Lassi</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Yogurt & Shrikhand</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Flavoured, Soya Milk</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="onhover-category-list">
                                        <a href="javascript:void(0)" class="category-name">
                                            <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/svg/1/frozen.svg" alt="">
                                            <h6>Frozen Foods</h6>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <div class="onhover-category-box w-100">
                                            <div class="list-1">
                                                <div class="category-title-box">
                                                    <h5>Noodle, Pasta</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Instant Noodles</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Hakka Noodles</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Cup Noodles</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Vermicelli</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Instant Pasta</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="onhover-category-list">
                                        <a href="javascript:void(0)" class="category-name">
                                            <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/svg/1/biscuit.svg" alt="">
                                            <h6>Biscuits & Snacks</h6>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <div class="onhover-category-box">
                                            <div class="list-1">
                                                <div class="category-title-box">
                                                    <h5>Biscuits & Cookies</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Salted Biscuits</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Marie, Health, Digestive</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Cream Biscuits & Wafers</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Glucose & Milk Biscuits</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Cookies</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="list-2">
                                                <div class="category-title-box">
                                                    <h5>Bakery Snacks</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Bread Sticks & Lavash</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Cheese & Garlic Bread</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Puffs, Patties, Sandwiches</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Breadcrumbs & Croutons</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="onhover-category-list">
                                        <a href="javascript:void(0)" class="category-name">
                                            <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/svg/1/grocery.svg" alt="">
                                            <h6>Grocery & Staples</h6>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <div class="onhover-category-box">
                                            <div class="list-1">
                                                <div class="category-title-box">
                                                    <h5>Grocery</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Lemon, Ginger & Garlic</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Indian & Exotic Herbs</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Organic Vegetables</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Organic Fruits</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="list-2">
                                                <div class="category-title-box">
                                                    <h5>Organic Staples</h5>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)">Organic Dry Fruits</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Organic Dals & Pulses</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Organic Millet & Flours</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Organic Sugar, Jaggery</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Organic Masalas & Spices</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Organic Rice, Other Rice</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Organic Flours</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Organic Edible Oil, Ghee</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                            <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown dropdown-mega">
                                            <a class="nav-link dropdown-toggle ps-xl-2 ps-0" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Home</a>

                                            <div
                                                class="dropdown-menu dropdown-menu-2 dropdown-image dropdown-menu-left">
                                                <div class="dropdown-column">
                                                    <a class="dropdown-item" href="index.html">
                                                        <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/images/theme/1.jpg" class="img-fluid"
                                                            alt="">
                                                        <span>Kartshop</span>
                                                    </a>

                                                    <a class="dropdown-item" href="index-2.html">
                                                        <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/images/theme/2.jpg" class="img-fluid"
                                                            alt="">
                                                        <span>Sweetshop</span>
                                                    </a>

                                                    <a class="dropdown-item" href="index-3.html">
                                                        <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/images/theme/3.jpg" class="img-fluid"
                                                            alt="">
                                                        <span>Organic</span>
                                                    </a>

                                                    <a class="dropdown-item" href="index-4.html">
                                                        <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/images/theme/4.jpg" class="img-fluid"
                                                            alt="">
                                                        <span>Supershop</span>
                                                    </a>

                                                    <a class="dropdown-item" href="index-5.html">
                                                        <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/images/theme/5.jpg" class="img-fluid"
                                                            alt="">
                                                        <span>Slicktech</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Shop</a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="shop-category-slider.html">Shop
                                                        Category Slider</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-category.html">Shop
                                                        Category Sidebar</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-banner.html">Shop Banner</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-left-sidebar.html">Shop Left
                                                        Sidebar</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-list.html">Shop List</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-right-sidebar.html">Shop
                                                        Right Sidebar</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="shop-top-filter.html">Shop Top
                                                        Filter</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Product</a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="product-4-image.html">Product
                                                        4 Image</a>
                                                </li>
                                                <li class="sub-dropdown-hover">
                                                    <a href="javascript:void(0)" class="dropdown-item">Product
                                                        Thumbnail</a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="product-left-thumbnail.html">Left Thumbnail</a>
                                                        </li>

                                                        <li>
                                                            <a href="product-right-thumbnail.html">Right
                                                                Thumbnail</a>
                                                        </li>

                                                        <li>
                                                            <a href="product-bottom-thumbnail.html">Bottom
                                                                Thumbnail</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="product-bundle.html" class="dropdown-item">Product
                                                        Bottom Thumbnail</a>
                                                </li>
                                                <li>
                                                    <a href="product-left-thumbnail.html" class="dropdown-item">Product
                                                        Left Thumbnail</a>
                                                </li>
                                                <li>
                                                    <a href="product-right-thumbnail.html" class="dropdown-item">Product
                                                        Right Thumbnail</a>
                                                </li>
                                                <li>
                                                    <a href="product-slider.html" class="dropdown-item">Product
                                                        Slider</a>
                                                </li>
                                                <li>
                                                    <a href="product-sticky.html" class="dropdown-item">Product
                                                        Sticky</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown dropdown-mega">
                                            <a class="nav-link dropdown-toggle ps-xl-2 ps-0" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Mega Menu</a>

                                            <div class="dropdown-menu dropdown-menu-2">
                                                <div class="row">
                                                    <div class="dropdown-column col-xl-3">
                                                        <h5 class="dropdown-header">Daily Vegetables</h5>
                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Beans &
                                                            Brinjals</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Broccoli
                                                            & Cauliflower</a>

                                                        <a href="shop-left-sidebar.html" class="dropdown-item">Chilies,
                                                            Garlic</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Vegetables & Salads</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Gourd,
                                                            Cucumber</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Herbs &
                                                            Sprouts</a>

                                                        <a href="demo-personal-portfolio.html"
                                                            class="dropdown-item">Lettuce & Leafy</a>
                                                    </div>

                                                    <div class="dropdown-column col-xl-3">
                                                        <h5 class="dropdown-header">Baby Tender</h5>
                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Beans &
                                                            Brinjals</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Broccoli
                                                            & Cauliflower</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Chilies,
                                                            Garlic</a>

                                                        <a class="dropdown-item"
                                                            href="shop-left-sidebar.html">Vegetables & Salads</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Gourd,
                                                            Cucumber</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Potatoes
                                                            & Tomatoes</a>

                                                        <a href="shop-left-sidebar.html" class="dropdown-item">Peas &
                                                            Corn</a>
                                                    </div>

                                                    <div class="dropdown-column col-xl-3">
                                                        <h5 class="dropdown-header">Exotic Vegetables</h5>
                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Asparagus
                                                            & Artichokes</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Avocados
                                                            & Peppers</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Broccoli
                                                            & Zucchini</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Celery,
                                                            Fennel & Leeks</a>

                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Chilies &
                                                            Lime</a>
                                                    </div>

                                                    <div class="dropdown-column dropdown-column-img col-3"></div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Blog</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="blog-detail.html">Blog Detail</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="blog-grid.html">Blog Grid</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="blog-list.html">Blog List</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown new-nav-item">
                                            <label class="new-dropdown">New</label>
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Pages</a>
                                            <ul class="dropdown-menu">
                                                <li class="sub-dropdown-hover">
                                                    <a class="dropdown-item" href="javascript:void(0)">Email
                                                        Template <span class="new-text"><i
                                                                class="fa-solid fa-bolt-lightning"></i></span></a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a
                                                                href="<?php echo base_url();?>public/layout/frontend/desktop/email-templete/abandonment-email.html">Abandonment</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url();?>public/layout/frontend/desktop/email-templete/offer-template.html">Offer
                                                                Template</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url();?>public/layout/frontend/desktop/email-templete/order-success.html">Order
                                                                Success</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url();?>public/layout/frontend/desktop/email-templete/reset-password.html">Reset
                                                                Password</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo base_url();?>public/layout/frontend/desktop/email-templete/welcome.html">Welcome
                                                                template</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="sub-dropdown-hover">
                                                    <a class="dropdown-item" href="javascript:void(0)">Invoice
                                                        Template <span class="new-text"><i
                                                                class="fa-solid fa-bolt-lightning"></i></span></a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="<?php echo base_url();?>public/layout/frontend/desktop/invoice/invoice-1.html">Invoice 1</a>
                                                        </li>

                                                        <li>
                                                            <a href="<?php echo base_url();?>public/layout/frontend/desktop/invoice/invoice-2.html">Invoice 2</a>
                                                        </li>

                                                        <li>
                                                            <a href="<?php echo base_url();?>public/layout/frontend/desktop/invoice/invoice-3.html">Invoice 3</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="404.html">404</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="about-us.html">About Us</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="cart.html">Cart</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="contact-us.html">Contact</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="checkout.html">Checkout</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="compare.html">Compare</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="faq.html">Faq</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="order-success.html">Order
                                                        Success</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="order-tracking.html">Order
                                                        Tracking</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="otp.html">OTP</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="search.html">Search</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="user-dashboard.html">User
                                                        Dashboard</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                data-bs-toggle="dropdown">Seller</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="seller-become.html">Become a
                                                        Seller</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="seller-dashboard.html">Seller
                                                        Dashboard</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="seller-detail.html">Seller
                                                        Detail</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="seller-detail-2.html">Seller
                                                        Detail 2</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="seller-grid.html">Seller Grid</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="seller-grid-2.html">Seller Grid
                                                        2</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="right-nav">
                            <div class="nav-number">
                                <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/images/icon/music.png" class="img-fluid blur-up lazyload" alt="">
                                <span>(123) 456 7890</span>
                            </div>
                            <a href="javascript:void(0)" class="btn theme-bg-color ms-3 fire-button"
                                data-bs-toggle="modal" data-bs-target="#deal-box">
                                <div class="fire">
                                    <img src="<?php echo base_url();?>public/layout/frontend/desktop/assets/images/icon/hot-sale.png" class="img-fluid" alt="">
                                </div>
                                <span>Hot Deals</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->