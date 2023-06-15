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
                                                <h5>Add new shop variant</h5>
                                            </div>
                                            <?php echo form_open_multipart(base_url('backend/shop-variant/add')) ;?>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="category_name">Title</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="title" placeholder="z. B. Ihre Zutat" required>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title" for="parent_id">Variant Item 11</label>
                                                    <div class="col-sm-9">
                                                    <select class="form-control select2" id="select2_position" name="variant_item[]" multiple="multiple"  required>
                                                        <?php foreach($variant_item as $row):?>
                                                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'] .' - €'.$row['price'];?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title" for="parent_id">Type</label>
                                                    <div class="col-sm-9">
                                                    <select class="form-control" name="type" required>
                                                        <option value="3">Option</option>
                                                        <option value="2">Radio</option>
                                                        <option value="1">Selectbox</option>
                                                        <option value="0">Checkbox</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <div class="form-group col-sm-12">
                                                        <button type="submit" name="shop_variant_add" class="btn btn-primary w-100 h-100">ADD</button>
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