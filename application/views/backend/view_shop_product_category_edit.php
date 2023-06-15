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
                                <?php echo form_open_multipart(base_url('backend/product_category/edit/'.$category['id'])) ;?>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Category Information</h5>
                                            </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title" for="parent_id">Product Main Category</label>
                                                    <div class="col-sm-9">
                                                    <select class="form-control" name="parent_id" id="parent_id">
                                                        <option value="0">Main Category</option>
                                                        <?php foreach($categories as $row_category):?>
                                                        <option value="<?php echo $row_category['id'];?>" <?php echo $row_category['id'] == $category['parent_id'] ? 'selected' : null;?>>
                                                            <?php echo $row_category['name'];?>
                                                        </option>
                                                        <?php endforeach;?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="category_name">Category Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="name" type="text" id="category_name" placeholder="Category Name" value="<?php echo $category['name'];?>" required>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="short_description">Short Description</label>
                                                    <div class="col-sm-9">
                                                        <textarea rows="6" class="form-control" name="short_description" id="short_description"><?php echo $category['short_description'];?></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="description">Description</label>
                                                    <div class="col-sm-9">
                                                        <textarea id="editor" name="description" id="description"><?php echo $category['description'];?></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title" for="photo">Category Image</label>
                                                    <div class="form-group col-sm-6">
                                                        <div class="dropzone-wrapper">
                                                            <div class="dropzone-desc">
                                                                <i class="ri-upload-2-line"></i>
                                                                <p>Choose an image file or drag it here.</p>
                                                            </div>
                                                            <input type="file" name="photo" id="photo" class="dropzone" accept="image/*">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-3">
                                                        <img src="<?php echo base_url('public/uploads/product_category_photos/thumbnail/'.$category['photo']);?>" class="img-fluid">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Status</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" name="status" <?php echo $category['status'] == 'Passive' ? '' : 'checked';?>><span class="switch-state"></span>
                                                        </label>
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
                                            <h5>Delivery Time</h5>
                                                <label class="col-sm-3 col-form-label form-label-title">Start & End</label>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="text" class="form-control" name="delivery_time_start" value="<?php echo $category['delivery_time_start'];?>" placeholder="11:00">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="text" class="form-control" name="delivery_time_end" value="<?php echo $category['delivery_time_end'];?>" placeholder="17:00">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-4 row align-items-center">
                                                <div class="form-group col-sm-12">
                                                    <button type="submit" class="btn btn-primary w-100 h-100" name="product_category_edit" title="">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php echo form_close();?>    
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