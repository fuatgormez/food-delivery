    <!-- SETTING -->
    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="setting">
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
			<i class="fa-solid fa-xmark"></i>
		</button>
        <div class="offcanvas-body container">
			<div class="mb-3">
                <h5 class="title my-3">Settings</h5>
                <select class="form-control custom-image-select-2 image-select">
					<option data-thumbnail="assets/images/svg/ramen.svg">Ramen</option>
					<option data-thumbnail="assets/images/svg/pizza.svg">pizza</option>
					<option data-thumbnail="assets/images/svg/burger.svg">Burger</option>
					<option data-thumbnail="assets/images/svg/french-fries.svg">French Fries</option>
					<option data-thumbnail="assets/images/svg/food.svg">Fast Food</option>
				</select>
            </div>
			<div class="mb-3">
                <h5 class="title my-3">Cooking Time</h5>
                <div class="short-tag style-2" role="group" aria-label="radio toggle button">
					<div class="clearfix">
						<input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked="">
						<label class="btn-outline-primary tag-btn" for="btnradio1">Under 15 mins</label>
					</div>

					<div class="clearfix">
						<input type="radio" class="btn-check" name="btnradio" id="btnradio2">
						<label class="btn-outline-primary tag-btn" for="btnradio2">Under 30 mins</label>
					</div>
					
					<div class="clearfix">
						<input type="radio" class="btn-check" name="btnradio" id="btnradio3">
						<label class="btn-outline-primary tag-btn" for="btnradio3">Under 45 mins</label>
					</div>
				  
					<div class="clearfix">
						<input type="radio" class="btn-check" name="btnradio" id="btnradio4">
						<label class="btn-outline-primary tag-btn" for="btnradio4">Under 60 mins</label>
					</div>
				</div>
            </div>
			<div class="mb-3">
                <h5 class="title my-3">Suggested Diets</h5>
                <div class="short-tag style-2" role="group" aria-label="radio toggle button">
					<input type="radio" class="btn-check" name="btnradio5" id="btnradio5" checked="">
					<label class="btn-outline-primary tag-btn" for="btnradio5">Vegetable</label>

					<input type="radio" class="btn-check" name="btnradio5" id="btnradio6">
					<label class="btn-outline-primary tag-btn" for="btnradio6">Law Fast</label>

					<input type="radio" class="btn-check" name="btnradio5" id="btnradio7">
					<label class="btn-outline-primary tag-btn" for="btnradio7">Gluten free</label>
				  
					<input type="radio" class="btn-check" name="btnradio5" id="btnradio8">
					<label class="btn-outline-primary tag-btn" for="btnradio8">Law Cafe</label>
					
					<input type="radio" class="btn-check" name="btnradio5" id="btnradio9">
					<label class="btn-outline-primary tag-btn" for="btnradio9">Suger Free</label>
				</div>
            </div>
			<div class="mb-3">
                <h5 class="title my-3">Calories</h5>
                <div class="short-tag style-2" role="group" aria-label="radio toggle button">
					<input type="radio" class="btn-check" name="btnradio6" id="btnradio10" checked="">
					<label class="btn-outline-primary tag-btn" for="btnradio10">55g Kacl</label>

					<input type="radio" class="btn-check" name="btnradio6" id="btnradio11">
					<label class="btn-outline-primary tag-btn" for="btnradio11">65g Kacl</label>

					<input type="radio" class="btn-check" name="btnradio6" id="btnradio12">
					<label class="btn-outline-primary tag-btn" for="btnradio12">70g Kacl</label>
				  
					<input type="radio" class="btn-check" name="btnradio6" id="btnradio13">
					<label class="btn-outline-primary tag-btn" for="btnradio13">80g Kacl</label>
					
				</div>
            </div>
			<div class="mb-3">
                <h5 class="title my-3">Ratings</h5>
                <div class="short-tag style-2" role="group" aria-label="radio toggle button">
					<input type="radio" class="btn-check" name="btnradio7" id="btnradio14" checked="">
					<label class="btn-outline-primary tag-btn" for="btnradio14">
						<i class="fa-solid fa-star"></i>
						4.3
					</label>

					<input type="radio" class="btn-check" name="btnradio7" id="btnradio15">
					<label class="btn-outline-primary tag-btn" for="btnradio15">
						<i class="fa-solid fa-star"></i>
						4.5
					</label>

					<input type="radio" class="btn-check" name="btnradio7" id="btnradio16">
					<label class="btn-outline-primary tag-btn" for="btnradio16">
						<i class="fa-solid fa-star"></i>
						4.7
					</label>
				  
					<input type="radio" class="btn-check" name="btnradio7" id="btnradio17">
					<label class="btn-outline-primary tag-btn" for="btnradio17">
						<i class="fa-solid fa-star"></i>
						5.0
					</label>
				</div>
				<div class="mb-3">
					<h5 class="title my-3">Pricing Table</h5>
					<div class="snap">
						<div id="snap"></div>
					</div>
				</div>
			</div>
        </div>
    </div>
	<!-- SETTING -->
</div>
<!-- page-wrapper-->
<!--**********************************
    Scripts
***********************************-->
<script src="<?php echo base_url('public/assets/js/jquery.js');?>"></script>
<script src="<?php echo base_url('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<script src="<?php echo base_url('public/assets/vendor/lightgallery/dist/lightgallery.umd.js');?>"></script>
<script src="<?php echo base_url('public/assets/vendor/lightgallery/dist/plugins/thumbnail/lg-thumbnail.umd.js');?>"></script>
<script src="<?php echo base_url('public/assets/vendor/lightgallery/dist/plugins/zoom/lg-zoom.umd.js');?>"></script>
<script src="<?php echo base_url('public/assets/js/dz.carousel.js');?>"></script>
<!-- Swiper -->
<script src="<?php echo base_url('public/assets/vendor/swiper/swiper-bundle.min.js');?>"></script>
<!-- /Swiper -->
<!-- Select2 -->
<script src="<?php echo base_url('public/assets/js/select2.full.min.js');?>"></script>
<!-- /Select2 -->
<script src="<?php echo base_url('public/assets/js/settings.js');?>"></script>
<script src="<?php echo base_url('public/assets/js/custom.js');?>"></script>
<script>
	//Initialize Select2 Elements
	$(".select2").select2();
</script>
</body>
</html>