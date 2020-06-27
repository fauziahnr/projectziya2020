<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url( <?php echo base_url() ?>assets/template/images/female.jpg);">
	<h2 class="l-text2 t-center">
		<!-- <?php echo $title ?> -->
		Produk Pelaku Usaha
	</h2>
	<p class="m-text13 t-center">
		<!-- <?php echo $site->namaweb ?> | <?php echo $site->tagline ?>-->
		Fe-Preneur | Saatnya Perempuan Bisa
	</p>
</section> 


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<!--Untuk Kategori Pelaku Usaha-->
				<!-- <div class="leftbar p-r-20 p-r-0-sm">
					<h4 class="m-text14 p-b-7 text-primary">
						Kategori Pelaku Usaha 
					</h4>


					<ul class="p-b-54">
						<?php foreach ($listing_kategori as $listing_kategori) { 
							?>
							<li class="p-t-4">
								<a href="<?php echo base_url('produk/kategori/'.$listing_kategori->slug_kategori) ?>" class="s-text13 active1">
									<?php echo $listing_kategori->nama_kategori; ?>
								</a>
							</li>

							<?php 
						}
						?>
					</ul>
				</div> -->
			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
				<!--Untuk Filter PU yg mendapat rating-->
				<!-- <form action="<?php echo base_url('produk/filterRating/'.$listing_kategori->slug_kategori) ?>" method="post">
					<div class="input-group">
						<select class="form-control" name="filter">
							<option value="">Filter</option>
							<option value="1" >Rating Teratas</option>
							<option value="2" >Rating Terbawah</option>
						</select>
						<span class="input-group-btn">
							<button class="btn btn-success" type="submit" name="submit"> Go !</button>
						</span>
					</div>
				</form> -->
				<br>

				<!-- Pelaku Usaha -->
				<div class="row">
					<?php foreach ($produk as $produk) { ?>

						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

							<?php 
					// FORM UNTUK MEMPROSES KETIKA FP AKAN GABUNG DG PU

							echo form_open(base_url('belanja/add')); 
					// Elemen-Elemen yang diikuti
							echo form_hidden('id_pelapak', $produk->id_pelapak);
							echo form_hidden('id', $produk->id_produk);
							echo form_hidden('qty', 1);
							echo form_hidden('stok', $produk->stok);
							echo form_hidden('price', $produk->harga);
							echo form_hidden('name', $produk->nama_produk);

					// Elemen redirect
							echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));

							?>
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="fa fa-eye" aria-hidden="true"></i>
											<i class="fa fa-eye dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Gabung Pelaku Usaha
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
										<p class="text-primary"><?php echo $produk->nama_produk ?></p>
									</a>

									<span class="block2-price m-text6 p-r-5">
										Rp. <?php echo number_format($produk->harga,'0',',','.') ?>
									</span>
									
									<!-- <style type="text/css" media="screen">
										*{
											margin: 0;
											padding: 0;
										}
										.rate {
											float: left;
											height: 46px;
											padding: 0 10px;
										}
										.rate:not(:checked) > input {
											position:absolute;
											top:-9999px;
										}
										.rate:not(:checked) > label {
											float:right;
											width:1em;
											overflow:hidden;
											white-space:nowrap;
											cursor:pointer;
											font-size:30px;
											color:#E5E4E2;
										}
										.rate:not(:checked) > label:before {
											content: '★ ';
										}
										.rate > input:checked ~ label {
											color: #ffc700;    
										}
										.rate:not(:checked) > label:hover,
										.rate:not(:checked) > label:hover ~ label {
											color: #deb217;  
										}
										.rate > input:checked + label:hover,
										.rate > input:checked + label:hover ~ label,
										.rate > input:checked ~ label:hover,
										.rate > input:checked ~ label:hover ~ label,
										.rate > label:hover ~ input:checked ~ label {
											color: #c59b08;
										}

										/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
									</style>
									<?php $hsl_rating=$produk->rating;
								if ($hsl_rating>=5.0000) { ?>
									<div class="rate">
										<input type="radio" id="star5" name="rate" value="5" checked="true" />
										<label for="star5" title="text">5 stars</label>
										<input type="radio" id="star4" name="rate" value="4"/>
										<label for="star4" title="text">4 stars</label>
										<input type="radio" id="star3" name="rate" value="3" />
										<label for="star3" title="text">3 stars</label>
										<input type="radio" id="star2" name="rate" value="2" />
										<label for="star2" title="text">2 stars</label>
										<input type="radio" id="star1" name="rate" value="1"/>
										<label for="star1" title="text">1 star</label>
									</div>
								<?php } elseif ($hsl_rating<5.0000 && $hsl_rating>=4.0000) { ?>
									<div class="rate">
										<input type="radio" id="star5" name="rate" value="5" />
										<label for="star5" title="text">5 stars</label>
										<input type="radio" id="star4" name="rate" value="4" checked="true" />
										<label for="star4" title="text">4 stars</label>
										<input type="radio" id="star3" name="rate" value="3" />
										<label for="star3" title="text">3 stars</label>
										<input type="radio" id="star2" name="rate" value="2" />
										<label for="star2" title="text">2 stars</label>
										<input type="radio" id="star1" name="rate" value="1"/>
										<label for="star1" title="text">1 star</label>
									</div>
								<?php } elseif ($hsl_rating<4.0000 && $hsl_rating>=3.0000) { ?>
									<div class="rate">
										<input type="radio" id="star5" name="rate" value="5"/>
										<label for="star5" title="text">5 stars</label>
										<input type="radio" id="star4" name="rate" value="4" />
										<label for="star4" title="text">4 stars</label>
										<input type="radio" id="star3" name="rate" value="3" checked="true" />
										<label for="star3" title="text">3 stars</label>
										<input type="radio" id="star2" name="rate" value="2" />
										<label for="star2" title="text">2 stars</label>
										<input type="radio" id="star1" name="rate" value="1"/>
										<label for="star1" title="text">1 star</label>
									</div>
								<?php } elseif ($hsl_rating<3.0000 && $hsl_rating>=2.0000) { ?>
									<div class="rate">
										<input type="radio" id="star5" name="rate" value="5" />
										<label for="star5" title="text">5 stars</label>
										<input type="radio" id="star4" name="rate" value="4"/>
										<label for="star4" title="text">4 stars</label>
										<input type="radio" id="star3" name="rate" value="3" />
										<label for="star3" title="text">3 stars</label>
										<input type="radio" id="star2" name="rate" value="2" checked="true" />
										<label for="star2" title="text">2 stars</label>
										<input type="radio" id="star1" name="rate" value="1"/>
										<label for="star1" title="text">1 star</label>
									</div>
								<?php } elseif ($hsl_rating<2.0000 && $hsl_rating>=1.0000) { ?>
									<div class="rate">
										<input type="radio" id="star5" name="rate" value="5"/>
										<label for="star5" title="text">5 stars</label>
										<input type="radio" id="star4" name="rate" value="4"/>
										<label for="star4" title="text">4 stars</label>
										<input type="radio" id="star3" name="rate" value="3" />
										<label for="star3" title="text">3 stars</label>
										<input type="radio" id="star2" name="rate" value="2" />
										<label for="star2" title="text">2 stars</label>
										<input type="radio" id="star1" name="rate" value="1" checked="true" />
										<label for="star1" title="text">1 star</label>
									</div>
								<?php } else{ ?>
									<div class="rate">
										<input type="radio" id="star5" name="rate" value="5" />
										<label for="star5" title="text">5 stars</label>
										<input type="radio" id="star4" name="rate" value="4"/>
										<label for="star4" title="text">4 stars</label>
										<input type="radio" id="star3" name="rate" value="3" />
										<label for="star3" title="text">3 stars</label>
										<input type="radio" id="star2" name="rate" value="2" />
										<label for="star2" title="text">2 stars</label>
										<input type="radio" id="star1" name="rate" value="1"/>
										<label for="star1" title="text">1 star</label>
									</div>
								<?php } ?> -->
								</div>
							</div>
							<?php 
					 //closing form
							echo form_close();
							?>
						</div>
					<?php } ?>


				</div>

				<!-- Pagination -->
				<div class="pagination flex-m flex-w p-t-26 text-center">
					<?php echo $pagin; ?>
				</div>
			</div>
		</div>
	</div>
</section>

