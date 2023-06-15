    <!-- Page Content -->
    <div class="page-content">
        <div class="container fb">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="title">Update Product Variant</span></h1>
                            <span class="float-end">
                                <a href="<?php echo base_url('backend/product-variant/delete/'.$variant['id']);?>" class="btn btn-danger card-link">Delete</a>
                                <a href="<?php echo base_url('backend/product-variant/add');?>" class="btn btn-dark card-link">Variant Add</a>
                                <a href="<?php echo base_url('backend/product-variant-item/add');?>" class="btn btn-dark card-link">Variant Item Add</a>
                                <a href="<?php echo base_url('backend/product-variant');?>" class="btn btn-dark card-link">View All</a>
                            </span>
                        </div>
                        <div class="card-body">
							<?php echo form_open_multipart(base_url('backend/product-variant/edit/'.$variant['id'])) ;?>
                                <fieldset>
                                    <legend>Product Variant Title</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                        <input type="text" class="form-control" name="title" placeholder="Product Variant Title" value="<?php echo $variant['title'];?>" required>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Product Variant Item</legend>
                                    <div class="mb-3 input-group">
                                        <select name="variant_item[]" class="form-control select2" multiple="multiple" required>
                                            <?php foreach($variant_item as $row):?>
                                                <option value="<?php echo $row['id'];?>" <?php echo in_array($row['id'], json_decode($variant['variant_item'])) ? 'selected' : null;?>><?php echo $row['name'] .' - €'.$row['price'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Variant Type</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                        <select class="form-control" name="type" required>
                                            <option value="1" <?php echo $variant['type'] == 'Selectbox' ? 'selected' : null;?> >Selectbox</option>
                                            <option value="0" <?php echo $variant['type'] == 'Checkbox' ? 'selected' : null;?> >Checkbox</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Status</legend>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text"><i class="fa fa-edit"></i></span>
                                        <select class="form-control" name="status" required>
                                            <option value="1" <?php echo $variant['status'] == 'Active' ? 'selected' : null;?> >Active</option>
                                            <option value="0" <?php echo $variant['status'] == 'Passive' ? 'selected' : null;?> >Passive</option>
                                        </select>
                                    </div>
                                </fieldset>
								<button type="submit" name="product_variant_edit" class="btn btn-primary mt-3  btn-block">UPDATE</button>
							<?php echo form_close(); ?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End-->