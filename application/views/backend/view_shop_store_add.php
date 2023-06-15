        <!-- page-wrapper start -->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <?php echo $page_header;?>
        <!-- Page Header Ends-->

        <!-- Page Body start -->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php echo $sidebar;?>
            <!-- Page Sidebar Ends-->

            <div class="page-body">
                <!-- New Product Category Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Flashdata Start-->
                            <?php if($this->session->flashdata('success')):?>
                                <div class="card">
                                    <div class="card-body">
                                        <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
                                    </div>
                                </div>
                            <?php endif;?>
                            <?php if($this->session->flashdata('error')):?>
                                <div class="card">
                                    <div class="card-body">
                                        <span class="text-danger"><?php echo $this->session->flashdata('error');?></span>
                                    </div>
                                </div>
                            <?php endif;?>
                            <!-- Flashdata End-->
                            <div class="row">
                                <div class="col-sm-8 m-auto">
                                <?php echo form_open_multipart(base_url('backend/shop-store/add'), array('class' => 'theme-form theme-form-2 mega-form'));?>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <div class="title-header option-title d-sm-flex d-block">
                                                    <h5>Store Add</h5>
                                                    <div class="right-options">
                                                        <ul>
                                                            <li><a href="<?php echo base_url();?>backend/shop-store">All Store</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="name">Store Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="Sushikoo" name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="email">Store Email</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="info@sushikoo.de" name="email" id="email">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="phone">Store Phone</label>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="text" placeholder="+490302666666" name="phone" id="phone">
                                                    </div>
                                                    <div class="col-sm-1"></div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="text" placeholder="Fax" name="fax">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="street">Street</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="text" placeholder="Josef-orlopp str" name="street" id="street">
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input class="form-control" type="text" placeholder="14" name="street_number">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="postcode">Postcode</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="10365" name="postcode" id="postcode">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="city">City</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="text" placeholder="Berlin" name="city" id="city">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="text" placeholder="Deutschland" name="country">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Status</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" name="status" checked="checked"><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Description</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-23">
                                                            <textarea class="form-control" name="description" id="editor" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Store Images</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Logo 415x320</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control form-choose" name="logo" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Favicon 32x32</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control form-choose" name="favicon" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Images 415x320</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control form-choose" name="photo" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Working Hours</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <div class="col-sm-12">
                                                    <div class="bs-example">
                                                        <textarea class="form-control" name="working_hours" id="working_hours"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Store Theme</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <div class="col-sm-12">
                                                    <div class="bs-example">
                                                        <select name="theme" id="theme" class="form-control">
                                                            <option>Default</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Search engine listing</h5>
                                            </div>
                                            <div class="seo-view">
                                                <span class="link">https://www.sushikoo.de</span>
                                                <h5>Buy fresh vegetables & Fruits online at best price</h5>
                                                <p>Online Vegetable Store - Buy fresh vegetables & Fruits online at best
                                                    prices. Order online and get free delivery.</p>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-3 mb-0" for="seo_title">Page title</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="search" name="seo_title" id="seo_title" placeholder="Fresh Fruits">
                                                </div>
                                            </div>
                                            <div class="mb-4 row">
                                                <label class="form-label-title col-sm-3 mb-0" for="seo_description">Meta description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="seo_description" rows="3" id="seo_description"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-4 row">
                                                <label class="form-label-title col-sm-3 mb-0" for="seo_keyword">Keyword</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="seo_keyword" type="text" id="seo_keyword" placeholder="fresh,veggies">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="form-label-title col-sm-3 mb-0" for="seo_url">URL handle</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="seo_url" type="search" id="seo_url" placeholder="https://sushikoo.de/fresh-veggies">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <button type="submit" name="store_add" class="btn btn-primary mt-3  btn-block">ADD</button>
                                    </div>
                                <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Product Add End -->
            </div>
            <!-- Container-fluid End -->
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End -->