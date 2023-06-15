    <!-- Page Content -->
    <div class="page-content">
        <div class="container fb">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <?php if($this->session->flashdata('success')):?>
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
                    <?php if($this->session->flashdata('error')):?>
                        <!-- Error Bar -->
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
                            <h1 class="title">Add new Product Variant</span></h1>
                            <span class="float-end">
                                <a href="<?php echo base_url('backend/product-variant-item/add');?>" class="btn btn-dark card-link">Variant Item Add</a>
                                <a href="<?php echo base_url('backend/product-variant');?>" class="btn btn-dark card-link">View All</a>
                            </span>
                        </div>
                        <div class="card-body">
							<?php echo form_open_multipart(base_url('backend/product-variant/add')) ;?>
                                <fieldset>
                                    <legend>Product Variant Title</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                        <input type="text" class="form-control" name="title" placeholder="z. B. Ihre Zutat" required>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Product Variant Item</legend>
                                    <div class="mb-3 input-group">
                                        <select name="variant_item[]" class="form-control select2" multiple="multiple" required>
                                            <?php foreach($variant_item as $row):?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'] .' - €'.$row['price'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </fieldset>
								<fieldset>
                                    <legend>Variant Type</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                        <select class="form-control" name="type" required>
                                            <option value="1">Selectbox</option>
                                            <option value="0">Checkbox</option>
                                        </select>
                                    </div>
                                </fieldset>
								<button type="submit" name="product_variant_add" class="btn btn-primary mt-3  btn-block">ADD</button>
							<?php echo form_close(); ?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End-->