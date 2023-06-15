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
                                <?php echo form_open_multipart(base_url('backend/product-category/add')) ;?>
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
                                                        <?php foreach($categories as $category):?>
                                                        <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="category_name">Category Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="name" id="category_name" type="text" placeholder="Category Name" required>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="short_description">Short Description</label>
                                                    <div class="col-sm-9">
                                                        <textarea rows="6" class="form-control" name="short_description" id="short_description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="description">Description</label>
                                                    <div class="col-sm-9">
                                                        <textarea height="500px" id="editor" name="description" id="description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title" for="photo">Category Image</label>
                                                    <div class="form-group col-sm-9">
                                                        <div class="dropzone-wrapper">
                                                            <div class="dropzone-desc">
                                                                <i class="ri-upload-2-line"></i>
                                                                <p>Choose an image file or drag it here.</p>
                                                            </div>
                                                            <input type="file" class="dropzone" name="photo" id="photo" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Status</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" name="status" checked=""><span class="switch-state"></span>
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
                                                <label class="col-sm-3 col-form-label form-label-title">Start & End</label>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="text" class="form-control" name="delivery_time_start" placeholder="11:00">
                                                    </div>
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    <div class="bs-example">
                                                        <input type="text" class="form-control" name="delivery_time_end" placeholder="17:00">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-4 row align-items-center">
                                                <div class="form-group col-sm-12">
                                                    <button type="submit" class="btn btn-primary w-100 h-100" name="product_category_add" title="">Add</button>
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