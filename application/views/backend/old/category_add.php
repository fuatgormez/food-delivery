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
                            <h5 class="title">Add new Category</span></h5>
                        </div>
                        <div class="card-body">
							<?php echo form_open_multipart(base_url('backend/product/category')) ;?>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa fa-filter"></i></span>
									<select class="form-control" name="parent_id">
                                        <option value="1">Select Category</option>
                                    </select>
								</div>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa fa-edit"></i></span>
									<input type="text" class="form-control" name="name" placeholder="Product Name">
								</div>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa fa-euro"></i></span>
									<input type="number" step="0.01" min="0" lang="de" class="form-control" name="price" placeholder="Product Price">
								</div>
								<div class="input-group mb-3">
								    <input type="file" class="imageuplodify mt-5" name="photo" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
								</div>
								<button type="submit" name="product_add" class="btn btn-primary mt-3  btn-block">ADD</button>
							<?php echo form_close(); ?>
						</div>
                    </div>
                </div>
            </div>    
        </div>   
    </div>
    <!-- Page Content End-->