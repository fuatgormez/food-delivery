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
                            <div class="row">
                                <div class="col-sm-8 m-auto">
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
                                <?php echo form_open_multipart(base_url('backend/product/add'), array('class' => 'theme-form theme-form-2 mega-form'));?>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product Information</h5>
                                            </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Product Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text"
                                                            placeholder="Product Name" name="name">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Category</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="category_id">
                                                            <option disabled>Category Menu</option>
                                                            <?php foreach($categories as $row):?>
                                                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Item ID</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="101" name="item_id">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">SKU</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="SKU120254" name="sku">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="tax">Tax</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="tax">
                                                            <?php foreach($tax as $row):?>
                                                                <option value="<?php echo $row['value'];?>"><?php echo $row['value'];?></option>
                                                            <?php endforeach;?>
                                                        </select>
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
                                                        <label class="form-label-title col-sm-3 mb-0">Product
                                                            Description</label>
                                                        <div class="col-sm-9">
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
                                                <h5>Product Images</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label
                                                    class="col-sm-3 col-form-label form-label-title">Images</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control form-choose" name="photo" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product Price</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 form-label-title">price</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="price" type="number" placeholder="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Variant</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Variant</label>
                                                <div class="col-sm-9">
                                                    <select class="js-example-basic-single" multiple name="variant[]">
                                                        <option disabled>Select Variant</option>
                                                        <?php foreach ($variant as $key => $value):?>
                                                            <option value="<?php echo $value['id'];?>"><?php echo $value['title'];?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Tag</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Tags</label>
                                                <div class="col-sm-9">
                                                    <div class="bs-example">
                                                        <input type="text" class="form-control" name="tag" placeholder="Type tag & hit enter" id="#inputTag" data-role="tagsinput">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Allergy</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Allergene</label>
                                                <div class="col-sm-9">
                                                    <div class="bs-example">
                                                        <input type="text" class="form-control" name="allergy" placeholder="A,B,C, 1,2,3">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Delivery Time</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Start & End</label>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="time" class="form-control" name="delivery_time_start" placeholder="11:00">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="time" class="form-control" name="delivery_time_end" placeholder="17:00">
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
                                                <span class="link">https://fastkart.com</span>
                                                <h5>Buy fresh vegetables & Fruits online at best price</h5>
                                                <p>Online Vegetable Store - Buy fresh vegetables & Fruits online at best
                                                    prices. Order online and get free delivery.</p>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-3 mb-0">Page title</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="search" name="seo_title" placeholder="Fresh Fruits">
                                                </div>
                                            </div>
                                            <div class="mb-4 row">
                                                <label class="form-label-title col-sm-3 mb-0">Meta description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="seo_description" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-4 row">
                                                <label class="form-label-title col-sm-3 mb-0">Keyword</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="seo_keyword" type="text" placeholder="fresh,veggies">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="form-label-title col-sm-3 mb-0">URL handle</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="seo_url" type="search" placeholder="https://sushikoo.de/fresh-veggies">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <button type="submit" name="product_add" class="btn btn-primary mt-3  btn-block">ADD</button>
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