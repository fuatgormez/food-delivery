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
                                        <h5>Variant Item List</h5>
                                        <div class="right-options">
                                            <ul>
                                                <li><a href="javascript:void(0)">import</a></li>
                                                <li><a href="javascript:void(0)">Export</a></li>
                                                <li><a class="btn btn-solid" href="<?php echo base_url();?>backend/shop-variant-item/add">Add Shop Variant Item</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="table-responsive category-table">
                                            <table class="table all-package theme-table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Variant Item Name</th>
                                                        <th>Design</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($variant_item as $row):?>
                                                    <tr>
                                                        <td><a href="<?php echo base_url('backend/shop-variant-item/edit/'.$row['id']);?>"><?php echo $row['name'];?></a></td>
                                                        <td><?php echo $row['design'];?></td>
                                                        <td><?php echo $row['status'];?></td>
                                                        <td><a href="<?php echo base_url('backend/shop-variant-item/delete/'.$row['id']);?>"><i class="ri-delete-bin-line"></i></a></td>
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