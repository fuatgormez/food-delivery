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

            <!-- Settings Section Start -->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Details Start -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="title-header option-title">
                                                <h5>Customer</h5>
                                            </div>
                                            <?php echo form_open_multipart(base_url('backend/customer/edit/'.$customer['id']), array('class' => 'theme-form theme-form-2 mega-form'));?>
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">First Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $customer['firstname'];?>" name="firstname" placeholder="Enter Your First Name">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Last Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $customer['lastname'];?>" name="lastname" placeholder="Enter Your Last Name">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Your Phone Number</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="number" value="<?php echo $customer['phone'];?>" name="phone" placeholder="Enter Your Number">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Enter Email Address</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="email" value="<?php echo $customer['email'];?>" name="email" placeholder="Enter Your Email Address">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-2 col-form-label form-label-title">Photo</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control form-choose" type="file" name="photo" id="formFileMultiple">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <img src="<?php echo base_url();?>public/uploads/customer/thumbnail/<?php echo $customer['photo'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center">
                                                    <label class="col-sm-2 col-form-label form-label-title">Status</label>
                                                        <div class="col-sm-10">
                                                            <label class="switch">
                                                                <input type="checkbox" name="status" <?php echo $customer['status'] == 'Passive' ? '' : 'checked';?>><span class="switch-state"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <div class="col-sm-12">
                                                            <button class="form-control btn-primary" type="submit" name="customer_update">UPDATE</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>
                                    <!-- Details End -->

                                    <!-- Address Start -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2 mb-3 d-flex justify-content-between">
                                                <h5>Address</h5>
                                                <span class="right"><a href="<?php echo base_url();?>backend/customer/customer-address-add/<?php echo $customer['id'];?>">+ Add New Address</a></span>
                                            </div>
                                            <div class="save-details-box">
                                                <div class="row g-4">
                                                    <?php foreach($customer_address as $row):?>
                                                    <div class="col-xl-4 col-md-6">
                                                        <div class="save-details">
                                                            <div class="save-name">
                                                                <h5><?php echo $row['firstname'] .' '.$row['lastname'];?></h5>
                                                            </div>
                                                            <div class="save-position">
                                                                <h6><?php echo $row['title'];?></h6>
                                                            </div>
                                                            <div class="save-address">
                                                                <p><?php echo $row['street'] .', '.$row['street_no'] ;?></p>
                                                                <p><?php echo $row['postcode'];?></p>
                                                                <p><?php echo $row['city'] .' / '. $row['country'];?></p>
                                                            </div>
                                                            <div class="mobile">
                                                                <p class="mobile">Mobile No. +49<?php echo $row['phone'];?></p>
                                                            </div>
                                                            <div class="button">
                                                                <a href="<?php echo base_url();?>backend/customer/customer-address/<?php echo $row['id'].'/'.$customer['id'];?>" class="btn btn-sm">Edit</a>
                                                                <a href="<?php echo base_url();?>backend/customer/customer-address-delete/<?php echo $row['id'].'/'.$customer['id'];?>" class="btn btn-sm">Remove</a>
                                                                <?php echo $row['status'] === 'Active' ? '<i class="fa fa-circle me-2 font-primary" title="active"></i>' : '<i class="fa fa-circle me-2 font-danger" title="passive"></i>' ;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Address End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Settings Section End -->
        </div>
        <!-- Page Body End-->
    </div>
    <!-- page-wrapper End-->