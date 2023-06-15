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
                                    <!-- Details Start -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="title-header option-title">
                                                <h5>Profile Setting</h5>
                                            </div>
                                            <?php echo form_open_multipart(base_url('backend/account/profile-edit/'.$profile['id']), array('class' => 'theme-form theme-form-2 mega-form'));?>
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">First Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $profile['firstname'];?>" name="firstname" placeholder="Enter Your First Name">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Last Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $profile['lastname'];?>" name="lastname" placeholder="Enter Your Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Your Phone Number</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="number" value="<?php echo $profile['phone'];?>" name="phone" placeholder="Enter Your Number">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Enter Email Address</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="email" value="<?php echo $profile['email'];?>" name="email" placeholder="Enter Your Email Address">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Photo</label>
                                                        <div class="col-sm-8">
                                                            <input type="file" class="form-control form-choose" name="photo" accept="image/*">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <img src="<?php echo base_url();?>public/uploads/user/thumbnail/<?php echo $profile['photo'].'?v='.time();?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Password</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="password" name="password" placeholder="Enter Your Password">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Confirm Password</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="password" name="confirm_password" placeholder="Enter Your Confirm Passowrd">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <div class="col-sm-12">
                                                            <button class="form-control btn-primary" type="submit" name="profile_update">UPDATE</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>
                                    <!-- Details End -->
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