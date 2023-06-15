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
                                            <?php echo form_open_multipart(base_url('backend/setting/update'), array('class' => 'theme-form theme-form-2 mega-form'));?>
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Sitename</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $setting['site_name'];?>" name="site_name" placeholder="Sushikoo">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Site URL</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $setting['site_url'];?>" name="site_url" placeholder="https://www.sushikoo.de">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-2 col-form-label form-label-title">Logo</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-choose" type="file" name="logo" id="formFileMultiple">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input class="form-control" type="number" name="logo_width" value="200">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input class="form-control" type="number" name="logo_height" value="100">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <img src="<?php echo base_url();?>public/uploads/<?php echo $setting['logo'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-2 col-form-label form-label-title">Favicon</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-choose" type="file" name="favicon" id="formFileMultiple">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input class="form-control" type="number" name="favicon_width" value="32">
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <input class="form-control" type="number" name="favicon_height" value="32">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <img src="<?php echo base_url();?>public/uploads/<?php echo $setting['favicon'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center">
                                                        <label class="col-sm-2 col-form-label form-label-title">Mobile Status</label>
                                                        <div class="col-sm-10">
                                                            <label class="switch">
                                                                <input type="checkbox" name="mobile_status" <?php echo $setting['mobile_status'] === 'Passive' ? '' : 'checked';?>><span class="switch-state"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center">
                                                        <label class="col-sm-2 col-form-label form-label-title">Frontend Status</label>
                                                        <div class="col-sm-10">
                                                            <label class="switch">
                                                                <input type="checkbox" name="frontend_status" <?php echo $setting['frontend_status'] === 'Passive' ? '' : 'checked';?>><span class="switch-state"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center">
                                                        <label class="col-sm-2 col-form-label form-label-title">Backend Status</label>
                                                        <div class="col-sm-10">
                                                            <label class="switch">
                                                                <input type="checkbox" name="backend_status" <?php echo $setting['backend_status'] === 'Passive' ? '' : 'checked';?>><span class="switch-state"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <div class="col-sm-12">
                                                            <button class="form-control btn-primary" type="submit" name="setting_update">UPDATE</button>
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