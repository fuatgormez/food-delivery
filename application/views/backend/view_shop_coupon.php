    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <?php echo $page_header;?>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php echo $sidebar;?>
            <!-- Page Sidebar Ends-->

            <!-- Container-fluid starts-->
            <div class="page-body">
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
                                    <div class="title-header option-title d-sm-flex d-block">
                                        <h5>Coupon List</h5>
                                        <div class="right-options">
                                            <ul>
                                                <li><a href="javascript:void(0)">import</a></li>
                                                <li><a href="javascript:void(0)">Export</a></li>
                                                <li><a class="btn btn-solid" href="<?php echo base_url();?>backend/shop-coupon/add">Add Coupon</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table all-package theme-table table-product" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Coupon Image</th>
                                                        <th>Code</th>
                                                        <th>Status</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach($coupon as $value):?>
                                                    <tr>
                                                        <td>
                                                            <div class="table-image">
                                                                <img src="<?php echo base_url();?>public/uploads/coupon/thumbnail/<?php echo $value['photo'];?>" class="img-fluid"
                                                                    alt="">
                                                            </div>
                                                        </td>
                                                        <td><?php echo $value['code'];?></td>
                                                        <td class="status-<?php echo $value['status'] === "Active" ? 'close' : 'danger';?>">
                                                            <span><?php echo $value['status'] === "Active" ? 'Active' : 'Passive';?></span>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="<?php echo base_url();?>backend/shop-coupon/edit/<?php echo $value['id'];?>">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo base_url();?>backend/shop-coupon/delete/<?php echo $value['id'];?>">
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
                <!-- Container-fluid Ends-->
            </div>
        </div>
    </div>
    <!-- page-wrapper End-->