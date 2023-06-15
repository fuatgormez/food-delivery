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
                            <h1 class="title">Product List</h1>
                            <span class="float-end">
                                <a href="<?php echo base_url('backend/product-category/add');?>" class="btn btn-dark card-link">Product Category Add</a>
                                <a href="<?php echo base_url('backend/product/add');?>" class="btn btn-dark card-link">Product Add</a>
                                <a href="<?php echo base_url('backend/product-variant/add');?>" class="btn btn-dark card-link">Variant Add</a>
                                <a href="<?php echo base_url('backend/product-variant-item/add');?>" class="btn btn-dark card-link">Variant Item Add</a>
                            </span>
                        </div>
                        <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $product):?>
                                <tr>
                                <th scope="row"><?php echo $product['id'];?></th>
                                <td><a href="<?php echo base_url('backend/product/edit/'.$product['id']);?>"><?php echo $product['name'];?></a></td>
                                <td><?php echo $product['status'];?></td>
                                <td><a href="<?php echo base_url('backend/product/delete/'.$product['id']);?>" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                            </table>
						</div>
                    </div>
                </div>
            </div>    
        </div>   
    </div>
    <!-- Page Content End-->