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
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title d-sm-flex d-block">
                                        <h5>Variant List</h5>
                                        <div class="right-options">
                                            <ul>
                                                <li><a href="javascript:void(0)">import</a></li>
                                                <li><a href="javascript:void(0)">Export</a></li>
                                                <li><a class="btn btn-solid" href="<?php echo base_url();?>backend/shop-variant/add">Add Shop Variant</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="table-responsive category-table">
                                            <table class="table all-package theme-table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Product Variant Name</th>
                                                        <th>Type</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($variant as $row):?>
                                                    <tr>
                                                        <td><a href="<?php echo base_url('backend/shop-variant/edit/'.$row['id']);?>"><?php echo $row['title'];?></a></td>
                                                        <td><?php echo $row['type'];?></td>
                                                        <td><?php echo $row['status'];?></td>
                                                        <td><a href="<?php echo base_url('backend/shop-variant/delete/'.$row['id']);?>"><i class="ri-delete-bin-line"></i></a></td>
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