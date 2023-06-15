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
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Update shop variant</h5>
                                            </div>
                                            <?php echo form_open_multipart(base_url('backend/shop-variant/edit/'.$variant['id'])) ;?>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="category_name">Title</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="title" value="<?php echo $variant['title'];?>" placeholder="z. B. Ihre Zutat" required>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title" for="parent_id">Variant Item</label>
                                                    <div class="col-sm-9">
                                                    <select name="variant_item[]" class="js-example-basic-single select2" multiple="multiple" required>
                                                        <?php foreach($variant_item as $row):?>
                                                            <option value="<?php echo $row['id'];?>" <?php echo in_array($row['id'], json_decode($variant['variant_item'])) ? 'selected' : null;?>><?php echo $row['name'] .' - €'.$row['price'];?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title" for="parent_id">Type</label>
                                                    <div class="col-sm-9">
                                                    <select class="form-control" name="type" required>
                                                        <option value="3" <?php echo $variant['type'] == 'Option' ? 'selected' : null;?> >Option</option>
                                                        <option value="2" <?php echo $variant['type'] == 'Radio' ? 'selected' : null;?> >Radio</option>
                                                        <option value="1" <?php echo $variant['type'] == 'Selectbox' ? 'selected' : null;?> >Selectbox</option>
                                                        <option value="0" <?php echo $variant['type'] == 'Checkbox' ? 'selected' : null;?> >Checkbox</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title" for="parent_id">Type</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                                <input type="checkbox" name="status" <?php echo $variant['status'] == 'Passive' ? '' : 'checked';?>><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <div class="form-group col-sm-12">
                                                        <button type="submit" name="shop_variant_edit" class="btn btn-primary w-100 h-100">ADD</button>
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