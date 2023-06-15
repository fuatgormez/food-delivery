    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <?php echo $page_header;?>
        <!-- Page Header Ends-->

        <!-- Page Body Start -->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php echo $sidebar;?>
            <!-- Page Sidebar Ends-->

            <!-- Container-fluid starts-->
            <div class="page-body">
                <!-- All Product Category Table Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
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
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>All Category</h5>
                                        <form class="d-inline-flex">
                                            <a href="<?php echo base_url();?>backend/product-category/add"
                                                class="align-items-center btn btn-theme d-flex">
                                                <i data-feather="plus-square"></i>Add New
                                            </a>
                                        </form>
                                    </div>

                                    <div class="table-responsive category-table">
                                        <div>
                                            <table class="table all-package theme-table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Category Name</th>
                                                        <th>Image</th>
                                                        <th>Status</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($categories as $row):?>
                                                    <tr>
                                                        <td><?php echo $row['name'];?></td>
                                                        <td>
                                                            <div class="table-image">
                                                                <img src="<?php echo base_url();?>public/uploads/product_category_photos/thumbnail/<?php echo $row['photo'];?>" class="img-fluid"
                                                                    alt="">
                                                            </div>
                                                        </td>
                                                        <td><?php echo $row['status'];?></td>
                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="<?php echo base_url();?>backend/product-category/edit/<?php echo $row['id'];?>">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="javascript:void(0)" data-href="<?php echo base_url('backend/product-category/delete/'.$row['id']);?>" class="deleteConfirm" data-bs-toggle="modal"
                                                                        data-bs-target="#deleteRowWithModal">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
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
                </div>
                <!-- All Product Category Table Ends-->
            </div>
            <!-- Container-fluid end -->
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End-->