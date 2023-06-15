    <!-- footer start-->
    <div class="container-fluid">
        <footer class="footer">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">Copyright 2023 © Sushikoo</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- footer End-->
    <!-- Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="button-box">
                        <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn  btn--yes btn-primary" onclick="location.href='<?php echo base_url();?>backend/account/logout'">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <!-- Delete Modal Box Start -->
    <div class="modal fade theme-modal remove-coupon" id="deleteRowWithModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-block text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box">
                        <p></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                    <a type="button" class="btn btn-animation btn-md fw-bold btn-confirm">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal Box End -->
    <!-- latest js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- scrollbar simplebar js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/scrollbar/simplebar.js"></script>
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/scrollbar/custom.js"></script>

    <!-- Sidebar jquery -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/config.js"></script>

    <!-- tooltip init js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/tooltip-init.js"></script>

    <!-- Plugins JS -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/sidebar-menu.js"></script>
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/notify/index.js"></script>

    <!-- Apexchar js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/chart/apex-chart/apex-chart1.js"></script>
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/chart/apex-chart/moment.min.js"></script>
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/chart/apex-chart/chart-custom1.js"></script>

    <!-- slick slider js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/slick.min.js"></script>
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/custom-slick.js"></script>

    <!-- customizer js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/customizer.js"></script>

    <!-- ratio js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/ratio.js"></script>

    <!-- ck editor js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/ckeditor.js"></script>
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/ckeditor-custom.js"></script>

    <!-- select2 js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/select2.min.js"></script>
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/select2-custom.js"></script>

    <!-- sidebar effect -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/sidebareffect.js"></script>

    <!-- Theme js -->
    <script src="<?php echo base_url();?>/public/layout/backend/assets/js/script.js"></script>

    <script>
    $("#select2_position").select2({
    allowClear:true,
    placeholder: 'variant',
    tags: true
    });
    </script>
</body>
</html>