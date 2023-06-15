    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Select Store</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All Store</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Grid Section Start -->
    <section class="seller-grid-section">
        <div class="container-fluid-lg">
            <div class="row g-4">
                <?php foreach($store as $row):?>
                <div class="col-xxl-4 col-md-6">
                    <a href="<?php echo base_url('select-store/' . $row['id']);?>" class="seller-grid-box">
                        <div class="grid-contain">
                            <div class="seller-contact-details">
                                <div class="saller-contact">
                                    <div class="seller-icon">
                                        <i class="fa-solid fa-map-pin"></i>
                                    </div>
                                    <div class="contact-detail">
                                        <h5><span> <?php echo $row['street'] .' '. $row['street_number'] .', '. $row['postcode'] .' '. $row['city'] .' '. $row['country'];?></span></h5>
                                    </div>
                                </div>
                                <div class="saller-contact">
                                    <div class="seller-icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="contact-detail">
                                        <h5><span><?php echo $row['phone'];?></span></h5>
                                    </div>
                                </div>
                                <div class="saller-contact">
                                    <div class="seller-icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="contact-detail">
                                        <h5><span><?php echo $row['email'];?></span></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="contain-name">
                                <div>
                                    <h6>Since 2022</h6>
                                    <h3><?php echo $row['name'];?></h3>
                                </div>

                                <div class="grid-image">
                                    <img src="<?php echo base_url('public/uploads/store/'.$row['slug'].'/'.$row['logo']);?>" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach;?>
            </div>

            <nav class="custome-pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1">
                            <i class="fa-solid fa-angles-left"></i>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="javascript:void(0)">1</a>
                    </li>
                    <li class="page-item" aria-current="page">
                        <a class="page-link" href="javascript:void(0)">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- Grid Section End -->