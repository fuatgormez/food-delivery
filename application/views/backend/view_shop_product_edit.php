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
                                <?php echo form_open_multipart(base_url('backend/product/edit/'.$product['id']), array('class' => 'theme-form theme-form-2 mega-form'));?>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product Information</h5>
                                            </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="name">Product Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="<?php echo $product['name'];?>" placeholder="Product Name" name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title" for="category_id">Category</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="category_id" id="category_id">
                                                            <option disabled>Category Menu</option>
                                                            <?php foreach($categories as $row):?>
                                                            <option value="<?php echo $row['id'];?>" <?php echo $product['category_id'] == $row['id'] ? 'selected' : null;?>><?php echo $row['name'];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="item_id">Item ID</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="101" name="item_id" value="<?php echo $product['item_id'];?>" id="item_id">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="sku">SKU</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="SKU120254" name="sku" value="<?php echo $product['sku'];?>" id="sku">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="tax">Tax</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="tax">
                                                            <?php foreach($tax as $row):?>
                                                                <option value="<?php echo $row['value'];?>" <?php echo $product['tax'] == $row['value'] ? 'selected' : null;?>><?php echo $row['value'];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Status</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" name="status" <?php echo $product['status'] == 'Passive' ? '' : 'checked';?>><span class="switch-state"></span>
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
                                                        <label class="form-label-title col-sm-3 mb-0" for="editor">Product Description</label>
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
                                                    class="col-sm-3 col-form-label form-label-title" for="image">Images</label>
                                                <div class="col-sm-6">
                                                    <input type="file" class="form-control form-choose" name="photo" accept="image/*" id="image">
                                                </div>
                                                <div class="col-sm-3">
                                                    <img src="<?php echo base_url();?>public/uploads/product_photos/thumbnail/<?php echo $product['photo'];?>">
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
                                                <label class="col-sm-3 form-label-title" for="price">price</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="price" type="number" value="<?php echo $product['price'];?>" placeholder="0" id="price">
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
                                                            <option value="<?php echo $value['id'];?>" <?php echo in_array($value['id'], json_decode($product['variant'])) ? 'selected' : null ;?>><?php echo $value['title'];?></option>
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
                                                        <input type="text" class="form-control" name="tag" value="<?php echo $product['tag'];?>" placeholder="Type tag & hit enter" id="#inputTag" data-role="tagsinput">
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
                                                <label class="col-sm-3 col-form-label form-label-title" for="allergy">Allergene</label>
                                                <div class="col-sm-9">
                                                    <div class="bs-example">
                                                        <input type="text" class="form-control" name="allergy" value="<?php echo $product['allergy'];?>" placeholder="A,B,C, 1,2,3" id="allergy">
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
                                                <label class="col-sm-3 col-form-label form-label-title" for="time_start">Start & End</label>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="time" class="form-control" name="delivery_time_start" value="<?php echo $product['delivery_time_start'];?>" placeholder="11:00" id="time_start">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="time" class="form-control" name="delivery_time_end" value="<?php echo $product['delivery_time_end'];?>" placeholder="17:00" id="time_end">
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
                                                <span class="link"><?php echo $product['seo_url'] ?? 'https://fastkart.com';?></span>
                                                <h5><?php echo $product['seo_title'] ?? 'Buy fresh vegetables & Fruits online at best price';?></h5>
                                                <p><?php echo $product['seo_description'] ?? 'Online Vegetable Store - Buy fresh vegetables & Fruits online at best prices. Order online and get free delivery.';?></p>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-3 mb-0" for="seo_title">Page title</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="search" name="seo_title" value="<?php echo $product['seo_title'];?>" placeholder="Fresh Fruits" id="seo_title">
                                                </div>
                                            </div>
                                            <div class="mb-4 row">
                                                <label class="form-label-title col-sm-3 mb-0" for="seo_description">Meta description</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="seo_description" rows="3" id="seo_description"><?php echo $product['seo_description'];?></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-4 row">
                                                <label class="form-label-title col-sm-3 mb-0" for="seo_keyword">Keyword</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="seo_keyword" type="text" value="<?php echo $product['seo_keyword'];?>" placeholder="fresh,veggies" id="seo_keyword">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="form-label-title col-sm-3 mb-0" for="seo_url">URL handle</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="seo_url" type="search" value="<?php echo $product['seo_url'];?>" placeholder="https://sushikoo.de/fresh-veggies" id="seo_url">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <button type="submit" name="product_update" class="btn btn-primary mt-3  btn-block">UPDATE</button>
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