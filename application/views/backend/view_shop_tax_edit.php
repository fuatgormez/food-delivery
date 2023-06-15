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
                                                <h5>Tax Update</h5>
                                            </div>
                                            <?php echo form_open_multipart(base_url('backend/shop-tax/edit/'.$tax['id']), array('class' => 'theme-form theme-form-2 mega-form'));?>
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Tax</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" value="<?php echo $tax['value'];?>" name="tax" placeholder="7">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center">
                                                        <label class="col-sm-2 col-form-label form-label-title">Status</label>
                                                        <div class="col-sm-10">
                                                            <label class="switch">
                                                                <input type="checkbox" name="status" <?php echo $tax['status'] === 'Passive' ? '' : 'checked';?>><span class="switch-state"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <div class="col-sm-12">
                                                            <button class="form-control btn-primary" type="submit" name="tax_update">UPDATE</button>
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