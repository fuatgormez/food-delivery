        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
                <div id="sidebarEffect"></div>
                <div>
                    <div class="logo-wrapper logo-wrapper-center">
                        <a href="<?php echo base_url();?>backend" data-bs-original-title="" title="">
                            <img class="img-fluid for-white" src="<?php echo base_url('public/uploads/'.$setting['logo']);?>" alt="logo">
                        </a>
                        <div class="back-btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="toggle-sidebar">
                            <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="<?php echo base_url();?>backend">
                            <img class="img-fluid main-logo main-white" src="<?php echo base_url();?>public/layout/backend/assets/images/logo/logo.png" alt="logo">
                            <img class="img-fluid main-logo main-dark" src="<?php echo base_url();?>public/layout/backend/assets/images/logo/logo-white.png"
                                alt="logo">
                        </a>
                    </div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow">
                            <i data-feather="arrow-left"></i>
                        </div>
                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"></li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url();?>backend/dashboard">
                                        <i class="ri-home-line"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-store-3-line"></i>
                                        <span>Product</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="<?php echo base_url();?>backend/product">Prodcts</a></li>
                                        <li><a href="<?php echo base_url();?>backend/product/add">Add New Products</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-list-check-2"></i>
                                        <span>Product Category</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="<?php echo base_url();?>backend/product-category">Category List</a></li>
                                        <li><a href="<?php echo base_url();?>backend/product-category/add">Add New Category</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-list-settings-line"></i>
                                        <span>Variant</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="<?php echo base_url();?>backend/shop-variant">Variant</a></li>
                                        <li><a href="<?php echo base_url();?>backend/shop-variant/add">Add Variant</a></li>
                                        <li><a href="<?php echo base_url();?>backend/shop-variant-item">Variant Item</a></li>
                                        <li><a href="<?php echo base_url();?>backend/shop-variant-item/add">Variant Add</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Coupons</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="<?php echo base_url();?>backend/shop-coupon">Coupon List</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>backend/shop-coupon/add">Create Coupon</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-archive-line"></i>
                                        <span>Order</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="<?php echo base_url();?>backend/shop-order">All Order</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Customers</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="<?php echo base_url();?>backend/customer">All customer</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-focus-3-line"></i>
                                        <span>Postcode</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="<?php echo base_url();?>backend/shop-postcode">All Postcode</a></li>
                                        <li><a href="<?php echo base_url();?>backend/shop-postcode/add">Add Postcode</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Users</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="<?php echo base_url();?>backend/user">All users</a></li>
                                        <li><a href="<?php echo base_url();?>backend/user/add">Add new user</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Roles</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="role.html">All roles</a>
                                        </li>
                                        <li>
                                            <a href="create-role.html">Create Role</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="media.html">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Media</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url();?>backend/shop-tax">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Tax</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="product-review.html">
                                        <i class="ri-star-line"></i>
                                        <span>Product Review</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="support-ticket.html">
                                        <i class="ri-phone-line"></i>
                                        <span>Support Ticket</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-settings-line"></i>
                                        <span>Store</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="<?php echo base_url();?>backend/shop-store">All Store</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="reports.html">
                                        <i class="ri-file-chart-line"></i>
                                        <span>Reports</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="list-page.html">
                                        <i class="ri-list-check"></i>
                                        <span>List Page</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow">
                            <i data-feather="arrow-right"></i>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->