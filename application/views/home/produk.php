<style type="text/css" media="screen">
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
		color:#D9D7CF;
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

<!-- List Pelaku Usaha -->
<section class="newproduct bgwhite p-t-45 p-b-105">
	<div class="container">
	<img src="<?php echo base_url() ?>assets/template/images/icon fp.png" alt="">
		<div class="sec-title p-b-60">
			<!-- <h3 class="m-text5 t-center text-primary">
				List Pelaku Usaha
			</h3> -->
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">
				<?php foreach ($produk as $produk) { ?>

					<div class="item-slick2 p-l-15 p-r-15">
						<?php 
					// FORM UNTUK MEMPROSES GABUNG MITRA PU

						echo form_open(base_url('belanja/add')); 
					// Elemen yang dibawa
						echo form_hidden('id', $produk->id_produk);
						echo form_hidden('stok', 1);
						echo form_hidden('qty', 1);
						echo form_hidden('price', $produk->harga);
						echo form_hidden('name', $produk->nama_produk);

					// Elemen redirect
						echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));

						?>
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">

								<div class="block2-overlay trans-0-4">
									<a href="<?php echo base_url() ?>assets/template/#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<!--Untuk menampilkan keterangan pelaku usaha-->
								<!-- <a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $produk->nama_produk ?>
								</a> -->

								<p class="block2-name dis-block s-text3 p-b-5 text-primary">
								<?php echo $produk->nama_produk ?>
								</p>
								<br>

								<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov s-text1 trans-0-4">
									Gabung Mitra
								</button>
								<br>
                    			<?php echo anchor('produk/detail/'.$produk->slug_produk,'<div class="button"><b>DETAIL PELAKU USAHA</b></div>') ?>
              

								<!-- <span class="block2-price m-text6 p-r-5">
									Rp. <?php echo number_format($produk->harga,'0',',','.') ?> 
								</span> -->
								<!-- <?php $hsl_rating=$produk->rating;
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
								<?php } elseif ($hsl_rating<5.0000 && $hsl_rating>4.0000) { ?>
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
								<?php } elseif ($hsl_rating<4.0000 && $hsl_rating>3.0000) { ?>
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
								<?php } elseif ($hsl_rating<3.0000 && $hsl_rating>2.0000) { ?>
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
								<?php } elseif ($hsl_rating<2.0000 && $hsl_rating>1.0000) { ?>
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
		</div>

	</div>
</section>
