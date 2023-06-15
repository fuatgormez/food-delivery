<!DOCTYPE html>
<html lang="en">
  <!-- Head Start -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Sushikoo" />
    <meta name="keywords" content="Sushikoo" />
    <meta name="author" content="Sushikoo" />
    <link rel="manifest" href="./manifest.json" />
    <title>Sushikoo PWA App</title>
    <link rel="icon" href="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/favicon.png" />
    <meta name="theme-color" content="#0baf9a" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Sushikoo" />
    <meta name="msapplication-TileImage" content="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/favicon.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="<?php echo base_url();?>public/layout/frontend/mobile/assets/css/vendors/bootstrap.css" />

    <!-- Iconly Icon css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/layout/frontend/mobile/assets/css/iconly.css" />

    <!-- Slick css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/layout/frontend/mobile/assets/css/vendors/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/layout/frontend/mobile/assets/css/vendors/slick-theme.css" />

    <!-- Style css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="<?php echo base_url();?>public/layout/frontend/mobile/assets/css/style.css" />
  </head>
  <!-- Head End -->

  <!-- Body Start -->
  <body>
    <!-- Skeleton loader Start -->
    <div class="skeleton-loader">
      <!-- Header Start -->
      <header class="header">
        <div class="logo-wrap">
          <i class="iconly-Category icli"></i>
          <a href="index.html"> <img class="logo logo-w" src="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/logo/logo-w.png" alt="logo" /></a
          ><a href="index.html"> <img class="logo" src="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/logo/logo.png" alt="logo" /></a>
        </div>
        <div class="avatar-wrap">
          <span class="font-sm"><i class="iconly-Location icli font-xl"></i> Los Angeles</span>
          <a href="account.html"> <img class="avatar" src="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/avatar/avatar.jpg" alt="avatar" /></a>
        </div>
      </header>
      <!-- Header End -->

      <!--Main Start -->
      <div class="main-wrap index-page mb-xxl">
        <!-- Search Box Start -->
        <div class="search-box">
          <input class="form-control" disabled type="search" />
        </div>
        <!-- Search Box End -->

        <!-- Banner Section Start -->
        <div class="banner-section section-p-t ratio2_1">
          <div class="h-banner-slider">
            <div>
              <div class="banner-box">
                <div class="bg-img"></div>
              </div>
            </div>
            <div>
              <div class="banner-box">
                <div class="bg-img"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Banner Section End -->

        <!-- Buy from Recently Bought Start -->
        <div class="recently section-p-t">
          <div class="recently-wrap">
            <h3 class="font-md sk-hed"></h3>
            <img class="corner" src="<?php echo base_url();?>public/layout/frontend/mobile/assets/svg/corner-sk.svg" alt="corner" />
            <ul class="recently-list">
              <li class="item">
                <div class="img"></div>
              </li>
              <li class="item"><div class="img"></div></li>
              <li class="item"><div class="img"></div></li>
              <li class="item"><div class="img"></div></li>
              <li class="item"><div class="img"></div></li>
              <li class="item"><div class="img"></div></li>
            </ul>
          </div>
        </div>
        <!-- Buy from Recently Bought End -->

        <!-- Shop By Category Start -->
        <div class="category section-p-t">
          <h3 class="font-sm"><span></span><span class="line"></span></h3>
          <div class="row gy-sm-4 gy-2">
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"></span>
              </div>
            </div>
            <div class="col-3">
              <div class="category-wrap">
                <div class="bg-shape"></div>
                <span class="font-xs title-color"> </span>
              </div>
            </div>
          </div>
        </div>
        <!-- Shop By Category End -->

        <!-- Say hello to Offers! Start -->
        <div class="offer-section section-p-t">
          <div class="offer">
            <div class="top-content">
              <div>
                <h4 class="title-color">Say hello to Offers!</h4>
                <p class="content-color">Best price ever of all the time</p>
              </div>
              <a href="javascript(0)" class="font-xs font-theme">See all</a>
            </div>

            <div class="offer-wrap">
              <div class="product-list media">
                <a href="javascript(0)"><img src="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/product/8.png" alt="offer" /></a>
                <div class="media-body">
                  <a href="javascript(0)" class="font-sm"> Assorted Capsicum Combo </a>
                  <span class="content-color font-xs">500g</span>
                  <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
                  <div class="plus-minus d-xs-none">
                    <i class="sub" data-feather="minus"></i>
                    <input type="number" value="1" min="0" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </div>
                </div>
              </div>

              <div class="product-list media">
                <a href="javascript(0)"><img src="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/product/6.png" alt="offer" /></a>
                <div class="media-body">
                  <a href="javascript(0)" class="font-sm"> Assorted Capsicum Combo </a>
                  <span class="content-color font-xs">500g</span>
                  <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
                  <div class="plus-minus d-xs-none">
                    <i class="sub" data-feather="minus"></i>
                    <input type="number" value="1" min="0" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </div>
                </div>
              </div>

              <div class="product-list media">
                <a href="javascript(0)"><img src="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/product/7.png" alt="offer" /></a>
                <div class="media-body">
                  <a href="javascript(0)" class="font-sm"> Assorted Capsicum Combo </a>
                  <span class="content-color font-xs">500g</span>
                  <span class="title-color font-sm">$25.00 <span class="badges-round bg-theme-theme font-xs">50% off</span></span>
                  <div class="plus-minus d-xs-none">
                    <i class="sub" data-feather="minus"></i>
                    <input type="number" value="1" min="0" max="10" />
                    <i class="add" data-feather="plus"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Say hello to Offers! End -->
      </div>
      <!--Main End -->
    </div>
    <!-- Skeleton loader End -->

    <!-- Header Start -->
    <header class="header">
      <div class="logo-wrap">
        <i class="iconly-Category icli nav-bar"></i>
        <a href="index.html"> <img class="logo logo-w" src="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/logo/logo-w.png" alt="logo" /></a><a href="index.html"> <img class="logo" src="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/logo/logo.png" alt="logo" /></a>
      </div>
      <div class="avatar-wrap">
        <span class="font-sm"><i class="iconly-Location icli font-xl"></i> Los Angeles</span>
        <a href="account.html"> <img class="avatar" src="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/avatar/avatar.jpg" alt="avatar" /></a>
      </div>
    </header>
    <!-- Header End -->

    <!-- Sidebar Start -->
    <a href="javascript:void(0)" class="overlay-sidebar"></a>
    <aside class="header-sidebar">
      <div class="wrap">
        <div class="user-panel">
          <div class="media">
            <a href="account.html"> <img src="<?php echo base_url();?>public/layout/frontend/mobile/assets/images/avatar/avatar.jpg" alt="avatar" /></a>
            <div class="media-body">
              <a href="account.html" class="title-color font-sm"
                >Andrea Joanne
                <span class="content-color font-xs">andreajoanne@gmail.com</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Navigation Start -->
        <nav class="navigation">
          <ul>
            <li>
              <a href="index.html" class="nav-link title-color font-sm">
                <i class="iconly-Home icli"></i>
                <span>Home</span>
              </a>
              <a class="arrow" href="index.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="pages-list.html" class="nav-link title-color font-sm">
                <i class="iconly-Paper icli"></i>
                <span>Sushikoo Pages list</span>
              </a>
              <a class="arrow" href="pages-list.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="category-wide.html" class="nav-link title-color font-sm">
                <i class="iconly-Category icli"></i>
                <span>Shop by Category</span>
              </a>
              <a class="arrow" href="category-wide.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="order-history.html" class="nav-link title-color font-sm">
                <i class="iconly-Document icli"></i>
                <span>Orders</span>
              </a>
              <a class="arrow" href="order-history.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="wishlist.html" class="nav-link title-color font-sm">
                <i class="iconly-Heart icli"></i>
                <span>Your Wishlist</span>
              </a>
              <a class="arrow" href="wishlist.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#language" aria-controls="language" class="nav-link title-color font-sm">
                <img src="<?php echo base_url();?>public/layout/frontend/mobile/assets/icons/png/flags.png" alt="flag" />
                <span>Langauge</span>
              </a>
              <a class="arrow" href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="account.html" class="nav-link title-color font-sm">
                <i class="iconly-Add-User icli"></i>
                <span>Your Account</span>
              </a>
              <a class="arrow" href="account.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="notification.html" class="nav-link title-color font-sm">
                <i class="iconly-Notification icli"></i>
                <span>Notification</span>
              </a>
              <a class="arrow" href="notification.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="setting.html" class="nav-link title-color font-sm">
                <i class="iconly-Setting icli"></i>
                <span>Settings</span>
              </a>
              <a class="arrow" href="setting.html"><i data-feather="chevron-right"></i></a>
            </li>

            <li>
              <a href="javascript:void(0)" class="nav-link title-color font-sm">
                <i class="iconly-Graph icli"></i>
                <span>Dark</span>
              </a>

              <div class="dark-switch">
                <input id="darkButton" type="checkbox" />
                <span></span>
              </div>
            </li>

            <li>
              <a href="javascript:void(0)" class="nav-link title-color font-sm">
                <i class="iconly-Filter icli"></i>
                <span>RTL</span>
              </a>

              <div class="dark-switch">
                <input id="rtlButton" type="checkbox" />
                <span class="before-none"></span>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Navigation End -->
      </div>

      <div class="contact-us">
        <span class="title-color">Contact Support</span>
        <p class="content-color font-xs">If you have any problem,queries or questions feel free to reach out</p>
        <a href="javascript:void(0)" class="btn-solid"> Contact Us </a>
      </div>
    </aside>
    <!-- Sidebar End -->