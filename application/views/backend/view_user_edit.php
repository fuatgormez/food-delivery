        <!-- page-wrapper start -->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <?php echo $page_header;?>
        <!-- Page Header Ends-->

        <!-- Page Body start -->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php echo $sidebar;?>
            <!-- Page Sidebar Ends-->

            <div class="page-body">
                <!-- New Product Category Add Start -->
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
                                <div class="col-sm-8 m-auto">
                                <?php echo form_open_multipart(base_url('backend/user/edit/'.$user['id']), array('class' => 'theme-form theme-form-2 mega-form'));?>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>User Update</h5>
                                            </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="username">Username</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="nickname" name="username" value="<?php echo $user['username'];?>" id="username">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="password">Password</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="*****" name="password" id="password">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="email">Email</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="info@sushikoo.de" name="email" id="email" value="<?php echo $user['email'];?>">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="firstname">Firstname</label>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="text" placeholder="Albert" name="firstname" id="firstname" value="<?php echo $user['firstname'];?>">
                                                    </div>
                                                    <div class="col-sm-1"></div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="text" placeholder="Einstein" name="lastname" value="<?php echo $user['lastname'];?>">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0" for="phone">Phone</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="+4903066666666" name="phone" id="phone" value="<?php echo $user['phone'];?>">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Role</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="role">
                                                            <option value="User" <?php echo $user['role'] === 'User' ? 'selected' : null;?>>User</option>
                                                            <option value="Superadmin" <?php echo $user['role'] === 'Superadmin' ? 'selected' : null;?>>Superadmin</option>
                                                            <option value="Administrator" <?php echo $user['role'] === 'Administrator' ? 'selected' : null;?>>Administrator</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Status</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" name="status" <?php echo $user['status'] == 'Passive' ? '' : 'checked';?>><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Description</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-23">
                                                            <textarea class="form-control" name="description" id="editor" rows="3"><?php echo $user['description'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Store Images</h5>
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-3 col-form-label form-label-title">Photo 500x500</label>
                                                <div class="col-sm-7">
                                                    <input type="file" class="form-control form-choose" name="photo" accept="image/*">
                                                </div>
                                                <div class="col-sm-2">
                                                   <img src="<?php echo base_url('public/uploads/user/thumbnail/'.$user['photo'].'?v='.time());?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <button type="submit" name="user_update" class="btn btn-primary mt-3  btn-block">UPDATE</button>
                                    </div>
                                <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Product Add End -->
            </div>
            <!-- Container-fluid End -->
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End -->