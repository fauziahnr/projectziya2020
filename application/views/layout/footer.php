<?php 
// Load data konfigurasi website

$site = $this->konfigurasi_model->listing();
$nav_produk_footer = $this->konfigurasi_model->nav_produk();

?>

<!-- Footer Baru-->
<footer class="footer-area relative sky-bg" id="contact-page">
    <div class="absolute footer-bg"></div>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2>Contact Fe-Preneur</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-4">
                <h4>Pusat Bantuan Fe-Preneur</h4>
                <hr>
                    <address class="side-icon-boxes">
                        <!--<div class="side-icon-box">
                            <div class="side-icon">
                                <img src="<?php echo base_url() ?>assets/images/location-arrow.png" alt="">
                            </div>
                            <p><strong>Address: </strong> Box 564, Disneyland <br />USA</p>
                        </div>-->
                        <div class="side-icon-box">
                            <div class="side-icon">
                                <img src="<?php echo base_url() ?>assets/images/phone-arrow.png" alt="">
                            </div>
                            <p><strong>Telephone: </strong>
                                <a href="callto:8801812726495">089638919393</a> <br /> <!--CARI CODE YG DIRECT KE WA -->
                                <a href="callto:8801687420471">+62816874271</a>
                            </p>
                        </div>
                        <div class="side-icon-box">
                            <div class="side-icon">
                                <img src="<?php echo base_url() ?>assets/images/mail-arrow.png" alt="">
                            </div>
                            <p><strong>E-mail: </strong>
                                <a href="mailto:youremail@example.com">fepreneur@gmail.com</a> <br />
                                <a href="mailto:youremail@example.com">femalepreneur@mail.com</a>
                            </p>
                        </div>
                    </address>

					<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
						<h4 class="s-text12 p-b-30">
							Kategori Produk
						</h4>

						<ul>
							<?php foreach ($nav_produk_footer as $nav_produk_footer) { ?>
								<li class="p-b-9">
									<a href="<?php base_url('produk/kategori/'.$nav_produk_footer->slug_kategori) ?>" class="s-text7">
										<?php echo $nav_produk_footer->nama_kategori ?>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>

                </div>
                <div class="col-xs-12 col-md-8">
                    <form action="process.php" id="contact-form" method="post" class="contact-form">
                        <div class="form-double">
                            <input type="text" id="form-name" name="form-name" placeholder="Your name" class="form-control" required="required">
                            <input type="email" id="form-email" name="form-email" class="form-control" placeholder="E-mail address" required="required">
                        </div>
                        <input type="text" id="form-subject" name="form-subject" class="form-control" placeholder="Message topic">
                        <textarea name="message" id="form-message" name="form-message" rows="5" class="form-control" placeholder="Your message" required="required"></textarea>
                        <button type="sibmit" class="button">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 pull-right">
                    <ul class="social-menu text-right x-left">
                        <h4>Media Sosial</h4>
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                            <!--<li><a href="#"><i class="ti-google"></i></a></li>
                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li><a href="#"><i class="ti-github"></i></a></li>-->
                    </ul>
                </div>
                <!--<div class="col-xs-12 col-sm-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id corrupti architecto consequuntur, laborum quaerat sed nemo temporibus unde, beatae vel.</p>
                </div>-->
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <p>&copy; Copyright 2020 oleh <strong>Fauziah Nur Rahmawati</strong></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer -->
<!-- <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
	<div class="flex-w p-b-90">
		<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30">
				KONTAK KAMI
			</h4>

			<div>
				<p class="s-text7 w-size27">
					<?php echo nl2br($site->alamat) ?>
					<br><i class="fa fa-envelope"></i> <?php echo $site->email ?>
					<br><i class="fa fa-phone"></i> <?php echo $site->telepon ?>
				</p>

				<div class="flex-m p-t-30">
					<a href="<?php //echo $site->facebook ?>" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
					<a href="<?php //echo $site->instagram ?>" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
				</div>
			</div>
		</div>

		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
				Kategori Produk
			</h4>

			<ul>
				<?php //foreach ($nav_produk_footer as $nav_produk_footer) { ?>
					<li class="p-b-9">
						<a href="<?php //base_url('produk/kategori/'.$nav_produk_footer->slug_kategori) ?>" class="s-text7">
							<?php //echo $nav_produk_footer->nama_kategori ?>
						</a>
					</li>
				<?php //} ?>
			</ul>
		</div>

		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
				Links
			</h4>

			<ul>
				<li class="p-b-9">
					<a href="#" class="s-text7">
						Search
					</a>
				</li>

				<li class="p-b-9">
					<a href="#" class="s-text7">
						About Us
					</a>
				</li>

				<li class="p-b-9">
					<a href="#" class="s-text7">
						Contact Us
					</a>
				</li>

				<li class="p-b-9">
					<a href="#" class="s-text7">
						Returns
					</a>
				</li>
			</ul>
		</div>

		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
				Help
			</h4>

			<ul>
				<li class="p-b-9">
					<a href="#" class="s-text7">
						Track Order
					</a>
				</li>

				<li class="p-b-9">
					<a href="#" class="s-text7">
						Returns
					</a>
				</li>

				<li class="p-b-9">
					<a href="#" class="s-text7">
						Shipping
					</a>
				</li>

				<li class="p-b-9">
					<a href="#" class="s-text7">
						FAQs
					</a>
				</li>
			</ul>
		</div>

		<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30">
				Newsletter
			</h4>

			<form>
				<div class="effect1 w-size9">
					<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
					<span class="effect1-line"></span>
				</div>

				<div class="w-size2 p-t-20">
				
					<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
						Subscribe
					</button>
				</div>

			</form>
		</div>
	</div>

	<div class="t-center p-l-15 p-r-15">
		

		<div class="t-center s-text8 p-t-20">
			Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
		</div>
	</div>
</footer> -->



<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/jquery/jquery-2.2.3.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/animsition/js/animsition.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
	$(".selection-1").select2({
		minimumResultsForSearch: 20,
		dropdownParent: $('#dropDownSelect1')
	});
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/template/js/slick-custom.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/countdowntime/countdowntime.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/lightbox2/js/lightbox.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/sweetalert/sweetalert.min.js"></script> 

<script type="text/javascript" src="<?php echo base_url() ?>assets_all/vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
	$('.block2-btn-addcart').each(function(){
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function(){
			swal(nameProduct, "is added to cart !", "success");
		});
	});

	$('.block2-btn-addwishlist').each(function(){
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function(){
			swal(nameProduct, "is added to wishlist !", "success");
		});
	});
</script>

<!--===============================================================================================-->
<script src="<?php echo base_url() ?>assets/template/js/main.js"></script>

<!--Validasi Tanggal -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script> $( function() { $( "#survei" ).datepicker({ minDate: 0 }); }); </script> 

<!--Vendor-JS-->
<script src="<?php echo base_url() ?>assets_all/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url() ?>assets_all/js/vendor/bootstrap.min.js"></script>
<!--Plugin-JS-->
<script src="<?php echo base_url() ?>assets_all/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets_all/js/contact-form.js"></script>
<script src="<?php echo base_url() ?>assets_all/js/jquery.parallax-1.1.3.js"></script>
<script src="<?php echo base_url() ?>assets_all/js/scrollUp.min.js"></script>
<script src="<?php echo base_url() ?>assets_all/js/magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>assets_all/js/wow.min.js"></script>
<!--Main-active-JS-->
<script src="<?php echo base_url() ?>assets_all/js/main.js"></script>

</body>
</html>
