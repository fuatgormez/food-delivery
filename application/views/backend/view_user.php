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
                                        <h5>User List</h5>
                                        <div class="right-options">
                                            <ul>
                                                <li><a href="javascript:void(0)">import</a></li>
                                                <li><a href="javascript:void(0)">Export</a></li>
                                                <li><a class="btn btn-solid" href="<?php echo base_url();?>backend/user/add">Add User</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="table-responsive category-table">
                                            <table class="table all-package theme-table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>username</th>
                                                        <th>Role</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($user as $row):?>
                                                    <tr>
                                                        <td><?php echo $row['id'];?></td>
                                                        <td><a href="<?php echo base_url('backend/user/edit/'.$row['id']);?>"><?php echo $row['username'];?></a></td>
                                                        <td><?php echo $row['role'];?></td>
                                                        <td><?php echo $row['status'];?></td>
                                                        <td><a href="<?php echo base_url('backend/user/delete/'.$row['id']);?>"><i class="ri-delete-bin-line"></i></a></td>
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