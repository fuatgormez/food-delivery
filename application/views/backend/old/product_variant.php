    <!-- Page Content -->
    <div class="page-content">
        <div class="container fb">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <?php if($this->session->flashdata('success')):?>
                        <!-- Success Bar -->
                        <div class="alert alert-success light alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                            <strong>Success!</strong> Message has been sent.
                            <button class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
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
                            <h1 class="title">Product Variant List</h1>
                            <span class="float-end">
                                <a href="<?php echo base_url('backend/product-variant/add');?>" class="btn btn-dark card-link">Variant Add</a>
                                <a href="<?php echo base_url('backend/product-variant-item/add');?>" class="btn btn-dark card-link">Variant Item Add</a>
                                <a href="<?php echo base_url('backend/product/add');?>" class="btn btn-dark card-link">Product Add</a>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Variant Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($product_variants as $row):?>
                                        <tr>
                                            <th scope="row"><?php echo $row['id'];?></th>
                                            <td><a href="<?php echo base_url('backend/product-variant/edit/'.$row['id']);?>"><?php echo $row['title'];?></a></td>
                                            <td><?php echo $row['type'];?></td>
                                            <td><?php echo $row['status'];?></td>
                                            <td><a href="<?php echo base_url('backend/product-variant/delete/'.$row['id']);?>" class="btn btn-danger btn-sm">Delete</a></td>
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