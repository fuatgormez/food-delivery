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
                            <h1 class="title">Add New Product Variant Item</span></h1>
                            <span class="float-end">
                                <a href="<?php echo base_url('backend/product-variant/add');?>" class="btn btn-dark card-link">Product Variant Add</a>
                                <a href="<?php echo base_url('backend/product-variant-item');?>" class="btn btn-dark card-link">View All</a>
                            </span>
                        </div>
                        <div class="card-body">
							<?php echo form_open_multipart(base_url('backend/product-variant-item/add')) ;?>
                                <fieldset>
                                    <legend>Product Variant Name</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                        <input type="text" class="form-control" name="name" placeholder="z.B Extra Soße">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Product Variant Price</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-euro"></i></span>
                                        <input type="number" step="0.01" min="0" lang="de" class="form-control" name="price" placeholder="1.99">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Variant Billing Design</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                        <select class="form-control" name="design">
                                            <option value="1">Top</option>
                                            <option value="0">Bottom</option>
                                        </select>
                                    </div>
                                </fieldset>
								<button type="submit" name="product_variant_item_add" class="btn btn-primary mt-3  btn-block">ADD</button>
							<?php echo form_close(); ?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End-->