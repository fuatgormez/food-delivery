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
                            <h1 class="title">Edit Category</span></h1>
                            <span class="float-end">
                                <a href="<?php echo base_url('backend/product_category/edit/'.$category['id']);?>" class="btn btn-danger card-link">Delete</a>
                                <a href="<?php echo base_url('backend/product_category/add');?>" class="btn btn-dark card-link">Add</a>
                                <a href="<?php echo base_url('backend/product_category');?>" class="btn btn-dark card-link">View All</a>
                            </span>
                        </div>
                        <div class="card-body">
							<?php echo form_open_multipart(base_url('backend/product_category/edit/'.$category['id'])) ;?>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa fa-filter"></i></span>
									<select class="form-control" name="parent_id">
                                        <option value="0">Main Category</option>
                                        <?php foreach($categories as $row_category):?>
                                        <option value="<?php echo $row_category['id'];?>" <?php echo $row_category['id'] == $category['parent_id'] ? 'selected' : null;?> >
                                             <?php echo $row_category['name'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
								</div>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa fa-edit"></i></span>
									<input type="text" class="form-control" name="name" placeholder="Category Name" value="<?php echo $category['name'];?>">
								</div>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa fa-edit"></i></span>
									<select class="form-control" name="status">
                                        <option value="1" <?php echo $category['status'] == 'Active' ? 'selected' : null;?> >Active</option>
                                        <option value="0" <?php echo $category['status'] == 'Passive' ? 'selected' : null;?> >Passive</option>
                                    </select>
								</div>
								<div class="input-group mb-3 justify-content-between">
								    <input type="file" class="imageuplodify mt-5" name="photo" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                    <span class=""><img src="<?php echo base_url('public/uploads/product_category_photos/'.$category['photo']);?>" width="130" /></span>
								</div>
								<button type="submit" name="product_category_edit" class="btn btn-primary mt-3  btn-block">UPDATE</button>
							<?php echo form_close(); ?>
						</div>
                    </div>
                </div>
            </div>    
        </div>   
    </div>
    <!-- Page Content End-->