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
                <!-- New Variant Item Add Start -->
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
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Shop Variant Item Edit</h5>
                                            </div>
                                            <?php echo form_open_multipart(base_url('backend/shop-variant-item/edit/'.$variant_item['id'])) ;?>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="variant_item_name">Variant Item Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="name" id="variant_item_name" type="text" value="<?php echo $variant_item['name'];?>" placeholder="Variant Item Name" required>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title" for="design">Variant Billing Design</label>
                                                    <div class="col-sm-9">
                                                    <select class="form-control" name="design" id="design">
                                                        <option value="1" <?php echo $variant_item['design'] === 'Top' ? 'selected' : null;?>>Top</option>
                                                        <option value="0" <?php echo $variant_item['design'] === 'Bottom' ? 'selected' : null;?>>Bottom</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="short_description">Price</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" step="0.01" min="0" lang="de" class="form-control" value="<?php echo $variant_item['price'];?>" name="price" placeholder="1.99">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Status</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" name="status" <?php echo $variant_item['status'] == 'Passive' ? '' : 'checked';?>><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <div class="form-group col-sm-12">
                                                        <button type="submit" class="btn btn-primary w-100 h-100" name="variant_item_edit" title="">Add</button>
                                                    </div>
                                                </div>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Product Category Add End -->
            </div>
            <!-- Container-fluid End -->
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End -->