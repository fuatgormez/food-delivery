    <!-- login section start -->
    <section class="log-in-section section-b-space">
        <a href="" class="logo-login"><img src="<?php echo base_url();?>/public/layout/backend/assets/images/logo/1.png" class="img-fluid"></a>
        <div class="container w-100">
            <div class="row">
                <div class="col-xl-5 col-lg-6 me-auto">
                    <div class="log-in-box">
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
                        <div class="log-in-title">
                            <h3>Welcome To Sushikoo <?php echo $this->session->flashdata('error');?></h3>
                            <h4>Log In Your Account</h4>
                        </div>
                        <div class="input-box">
                            <?php echo form_open(base_url('backend/account/login'), array('class' => 'row g-4')); ?>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                        <label for="username">Username</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                        </div>
                                        <a href="forgot.html" class="forgot-password">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" name="login" type="submit">Log In</button>
                                </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login section end -->