    <!-- Page Content -->
    <div class="page-content">
        <div class="container fb">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <?php if($this->session->flashdata('error')):?>
                        <!-- Success Bar -->
                        <div id="session_flashdata">
                            <div class="offcanvas offcanvas-bottom show" tabindex="-1">
                                <div class="container">
                                    <div class="offcanvas-body small text-center">
                                        <i class="fa fa-check-circle fa-4x text-danger"></i>
                                        <h5 class="m-t15 m-b10">Error</h5>
                                        <p class="m-b0"><?php echo $this->session->flashdata('error');?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Hi, <?php echo $profile['username'];?> <span class="text-danger">[<?php echo $profile['role'];?>]</span></h5>
                        </div>
                        <div class="card-body">
							<?php echo form_open_multipart(base_url('backend/account/profile_edit/'.$profile['id'])) ;?>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo $profile['firstname'];?>">
								</div>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo $profile['lastname'];?>">
								</div>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa fa-at"></i></span>
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $profile['email'];?>">
								</div>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa fa-phone"></i></span>
									<input type="phone" class="form-control" name="phone" placeholder="Phone" value="<?php echo $profile['phone'];?>">
								</div>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa fa-lock"></i></span>
									<input type="password" class="form-control dz-password" name="password" placeholder="******">
									<span class="input-group-text show-pass">
										<i class="fa fa-eye-slash"></i>
										<i class="fa fa-eye"></i>
									</span>
								</div>
								<div class="mb-3 input-group">
									<span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
									<input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $profile['address'];?>">
								</div>
								<div class="d-flex">
									<div class="input-group mb-3 justify-content-between">
										<input type="file" class="imageuplodify mt-5" name="photo" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
										<span class=""><img src="<?php echo base_url('public/uploads/user/'.$profile['photo']);?>" width="130" /></span>
									</div>
								</div>
								<button type="submit" class="btn btn-primary mt-3  btn-block">UPDATE</button>
							<?php echo form_close(); ?>
						</div>
                    </div>
                </div>
            </div>    
        </div>   
    </div>
    <!-- Page Content End-->