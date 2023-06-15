    <!-- Page Content -->
    <div class="page-content bottom-content ">
        <div class="container profile-area">
            <div class="profile">
                <div class="media media-100">
                    <img src="<?php echo base_url('public/uploads/user/'.$profile['photo']);?>" alt="/">
                    <svg class="progress-style" height="100" width="100">
                        <circle id="round-1" cx="60" cy="60" r="50" stroke="#E8EFF3" stroke-width="7" fill="none" />
                        <circle id="round-2" cx="60" cy="60" r="50" stroke="#C3AC58" stroke-width="7" fill="none" />
                    </svg>
                </div>
                <div class="mb-2">
                    <h4><?php echo $profile['firstname']." ".$profile['lastname'];?> </h4>
                    <h6 class="detail"><?php echo $profile['role'];?></h6>
                </div>
            </div>
            <div class="contact-section">
                <?php if($this->session->flashdata('success')):?>
                    <!-- Success Bar -->
                    <div id="session_flashdata">
                        <div class="offcanvas offcanvas-bottom show" tabindex="-1">
                            <div class="container">
                                <div class="offcanvas-body small text-center">
                                    <i class="fa fa-check-circle fa-4x text-success"></i>
                                    <h5 class="m-t15 m-b10">Success</h5>
                                    <p class="m-b0"><?php echo $this->session->flashdata('success');?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
                <div class="d-flex justify-content-between align-item-center">
                    <h5 class="title">Contacts</h5>
                    <a href="<?php echo base_url('backend/account/profile_edit/'.$profile['id']);?>" class="btn-link">Edit</a>
                </div>
                <ul>
                    <li>
						<a href="messages.html">
							<div class="icon-box">
								<i class="fa-solid fa-phone"></i>
							</div> 
							<div class="ms-3">
								<div class="light-text">Mobile Phone</div>
								<p class="mb-0"><?php echo $profile['phone'] ;?></p>
							</div>
						</a>
					</li>
					<li>
						<a href="messages.html">
							<div class="icon-box">
								<i class="fa-solid fa-envelope"></i>
							</div> 
							<div class="ms-3">
								<div class="light-text">Email Address</div>
								<p class="mb-0"><?php echo $profile['email'];?></p>
							</div>
						</a>
					</li>
					<li>
						<a href="messages.html">
							<div class="icon-box">
								<i class="fa-solid fa-location-dot"></i>
							</div> 
							<div class="ms-3">
								<div class="light-text">Address</div>
								<p class="mb-0"><?php echo $profile['address'];?></p>
							</div>
						</a>
					</li>
				</ul>
                <div class="d-flex justify-content-between align-item-center">
                    <h5 class="title">Your Reward 🏆</h5>
                    <a href="javascript:void(0);" class="btn-link">History</a>
                </div>
                <div class="swiper-btn-center-lr">
                    <div class="swiper-container mt-4 offer-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="offer-bx">
                                    <div class="offer-content">
                                        <h6>Order 10 packs French Fries Deluxe</h6>
                                        <small>4 days ago</small>
                                    </div>
                                    <div class="point">
                                        <h5 class="title">150</h5>
                                        <small class="d-block">Pts</small>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="offer-bx">
                                    <div class="offer-content">
                                        <h6>Order 10 packs French Fries Deluxe</h6>
                                        <small>4 days ago</small>
                                    </div>
                                    <div class="point">
                                        <h5 class="title">150</h5>
                                        <small class="d-block">Pts</small>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="offer-bx">
                                    <div class="offer-content">
                                        <h6>Order 10 packs French Fries Deluxe</h6>
                                        <small>4 days ago</small>
                                    </div>
                                    <div class="point">
                                        <h5 class="title">150</h5>
                                        <small class="d-block">Pts</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End-->