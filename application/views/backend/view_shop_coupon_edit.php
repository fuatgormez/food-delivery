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
                                <?php echo form_open_multipart(base_url('backend/shop-coupon/edit/'.$coupon['id']), array('class' => 'theme-form theme-form-2 mega-form'));?>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Coupon Information</h5>
                                            </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="coupon_code">Code</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" type="text" placeholder="x102154" value="<?php echo $coupon['code'];?>" name="coupon_code" id="coupon_code">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button class="btn btn-primary ajax_generate_code">Generate Coupon Code</button>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Discount Type</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="discount_type" id="discount_type">
                                                            <option value="fixed_cart" <?php echo $coupon['discount_type'] === 'fixed_cart' ? 'selected' : null;?>>Fixed Cart</option>
                                                            <option value="percentage" <?php echo $coupon['discount_type'] === 'percentage' ? 'selected' : null;?>>Percentage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center" id="amount_" <?php echo $coupon['discount_type'] !== 'fixed_cart' ? 'style="display:none"' : null;?>>
                                                    <label class="form-label-title col-sm-3 mb-0">Amount</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="10.99" value="<?php echo $coupon['amount'];?>" name="amount" id="amount">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center" id="percent_" <?php echo $coupon['discount_type'] !== 'percentage' ? 'style="display:none"' : null;?>>
                                                    <label class="form-label-title col-sm-3 mb-0">Percent</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="20" value="<?php echo $coupon['percent'];?>" name="percent" id="percent">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Maximum Limit</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="<?php echo $coupon['max_limit'];?>" placeholder="1000" name="max_limit">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Store</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2" id="select2_position" name="store_id[]" multiple="multiple">
                                                            <?php foreach($store as $row):?>
                                                                <option value="<?php echo $row['id'];?>" <?php echo in_array($row['id'], json_decode($coupon['store_id'])) ? 'selected' : null;?>><?php echo $row['name'];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Status</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" name="status" <?php echo $coupon['status'] == 'Passive' ? '' : 'checked';?>><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Title & Description</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row mb-4">
                                                        <label class="form-label-title col-sm-3 mb-0" for="title">Title</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" value="<?php echo $coupon['title'];?>" name="title" id="title">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="form-label-title col-sm-3 mb-0" for="editor">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" name="description" id="editor" rows="3"><?php echo $coupon['description'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Image</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <div class="col-sm-7">
                                                    <input type="file" class="form-control form-choose" name="photo" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                </div>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name="photo_px">
                                                        <option value="0">415x320</option>
                                                        <option value="1">1155x670</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <img src="<?php echo base_url('public/uploads/coupon/thumbnail/'.$coupon['photo']);?>" class="img-fluid">
                                                    <i class="ri-delete-bin-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Min & Max Spend</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title" for="min_spend">Min Spend</label>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="text" class="form-control" value="<?php echo $coupon['min_spend'];?>" name="min_spend" id="min_spend">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="text" class="form-control" value="<?php echo $coupon['max_spend'];?>" name="max_spend">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Expire Date</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Start & End</label>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="date" class="form-control" name="valid_date_from" value="<?php echo $coupon['valid_date_from'];?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="date" class="form-control" name="valid_date_to" value="<?php echo $coupon['valid_date_to'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <button type="submit" name="coupon_update" class="btn btn-primary mt-3  btn-block">UPDATE</button>
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