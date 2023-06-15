    <!-- Page Content -->
    <div class="page-content">
        <div class="container fb">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <?php if($this->session->flashdata('error')):?>
                        <!-- Success Bar -->
                        <div id="session_flashdata">
                            <div class="offcanvas offcanvas-bottom show" tabindex="-1">
                                <div class="container">
                                    <div class="offcanvas-body small text-center">
                                        <i class="fa fa-check-circle fa-4x text-danger"></i>
                                        <h5 class="m-t15 m-b10">Error</h5>
                                        <p class="m-b0"><?php echo $this->session->flashdata('error');?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>

                    <div class="card">
                        <div class="card-header">
                            <h1 class="title">Update Product</span></h1>
                            <span class="float-end">
                                <a href="<?php echo base_url('backend/product/delete/'.$product['id']);?>" class="btn btn-danger card-link">Delete</a>
                                <a href="<?php echo base_url('backend/product/add');?>" class="btn btn-dark card-link">Add</a>
                                <a href="<?php echo base_url('backend/product');?>" class="btn btn-dark card-link">View All</a>
                            </span>
                        </div>
                        <div class="card-body">
							<?php echo form_open_multipart(base_url('backend/product/edit/'.$product['id'])) ;?>
                                <fieldset>
                                    <legend>Product Category</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-filter"></i></span>
                                        <select class="form-control" name="category_id">
                                            <?php foreach($categories as $category):?>
                                                <option value="<?php echo $category['id'];?>" <?php echo $category['id'] == $product['category_id'] ? 'selected' : null;?>><?php echo $category['name'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Product Name</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                        <input type="text" class="form-control" name="name" placeholder="Product Name" value="<?php echo $product['name'];?>">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Product Price</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-euro"></i></span>
                                        <input type="number" step="0.01" min="0" lang="de" class="form-control" name="price" placeholder="Product Price" value="<?php echo $product['price'];?>">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Product Variant</legend>
                                    <div class="mb-3 input-group">
                                        <select name="variant[]" class="form-control select2" multiple="multiple">
                                            <?php foreach($variant as $row):?>
                                                <option value="<?php echo $row['id'];?>" <?php echo in_array($row['id'], $product['variant'] ? json_decode($product['variant']) : []) ? 'selected' : null;?>><?php echo $row['title'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Status</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                        <select class="form-control" name="status">
                                            <option value="1" <?php echo $product['status'] == 'Active' ? 'selected' : null;?> >Active</option>
                                            <option value="0" <?php echo $product['status'] == 'Passive' ? 'selected' : null;?> >Passive</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Image</legend>
                                    <div class="d-flex">
                                        <div class="input-group mb-3 justify-content-between">
                                            <input type="file" class="imageuplodify mt-5" name="photo" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                            <span><img src="<?php echo base_url('public/uploads/product_photos/'.$product['photo']);?>" width="130"></span>
                                        </div>
                                     </div>
                                </fieldset>
								<button type="submit" name="product_edit" class="btn btn-primary mt-3  btn-block">UPDATE</button>
							<?php echo form_close(); ?>
						</div>
                    </div>
                </div>
            </div>    
        </div>   
    </div>
    <!-- Page Content End-->