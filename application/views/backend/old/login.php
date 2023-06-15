    <!-- Page Content -->
    <div class="page-content">

        <!-- Banner -->
        <div class="banner-wrapper">
            <div class="circle-1"></div>
            <div class="container inner-wrapper">
                <h1 class="dz-title">Sushikoo</h1>
                <p class="mb-0">Restaurant App</p>
            </div>
        </div>
        <!-- Banner End -->
        <div class="account-box">
            <!-- Alert End -->
            <div class="container">
                <div class="account-area">
                    <h3 class="title">Herzlich Willkommen</h3>
                    <p></p>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                <?php if ($this->session->flashdata('susccess')) : ?>
                                    <div class="alert alert-success light alert-dismissible fade show">
                                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                                        <strong>Success!</strong> Message has been sent.
                                        <button class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('error')) : ?>
                                    <div class="alert alert-danger light alert-dismissible fade show">
                                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                        <strong>Error!</strong> Message sending failed.
                                        <button class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Alert End -->
					<?php echo form_open(base_url('backend/account/login')); ?>
						<div class="input-group input-mini mb-3">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
							<input type="text" class="form-control" name="username" placeholder="Name">
						</div>
						<div class="mb-3 input-group input-mini">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
							<input type="password" class="form-control dz-password" name="password" placeholder="Password">
							<span class="input-group-text show-pass">
								<i class="fa fa-eye-slash"></i>
								<i class="fa fa-eye"></i>
							</span>
						</div>
						<div class="input-group">
                            <input type="submit" class="btn mt-2 btn-primary w-100 btn-rounded" name="form1" value="SIGN IN">
						</div>
						<div class="d-flex justify-content-between align-items-center">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" value="" id="flexCheckChecked" checked>
								<label class="form-check-label" for="flexCheckChecked">
									Keep Sign In
								</label>
							</div>
							<a href="forgot-password.html" class="btn-link">Forgot password?</a>
						</div>
                    <?php echo form_close(); ?>
                    <div class="text-center mb-auto p-tb20">
                        <a href="signup.html" class="saprate">Don’t have an account?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->