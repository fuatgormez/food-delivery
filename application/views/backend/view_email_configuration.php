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
            <!-- postcodes Section Start -->
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
                                                <h5>Email Configuration</h5>
                                            </div>
                                            <?php echo form_open_multipart(base_url('backend/email-configuration'), array('class' => 'theme-form theme-form-2 mega-form'));?>
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Email</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $email_configuration['email'];?>" name="email" placeholder="info@sushikoo.de">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Host</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $email_configuration['host'];?>" name="host" placeholder="sandbox.smtp.mailtrap.io">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Username</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $email_configuration['username'];?>" name="username" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Password</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $email_configuration['password'];?>" name="password" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Port</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $email_configuration['port'];?>" name="port" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Encryption</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="encryption">
                                                                <option value="TLS" <?php echo $email_configuration['encryption'] === "TLS" ? 'selected' : null;?>>TLS</option>
                                                                <option value="SSL" <?php echo $email_configuration['encryption'] === "SSL" ? 'selected' : null;?>>SSL</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <div class="col-sm-12">
                                                            <button class="form-control btn-primary" type="submit" name="update">UPDATE</button>
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
            <!-- postcodes Section End -->
        </div>
        <!-- Page Body End-->
    </div>
    <!-- page-wrapper End-->