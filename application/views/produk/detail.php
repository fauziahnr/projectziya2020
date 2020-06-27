<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
	<a href="<?php echo base_url() ?>" class="s-text16 text-primary">
		Home
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<a href="<?php echo base_url('produk') ?>" class="s-text16">
		<strong>Detail Pelaku Usaha</strong>
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<span class="s-text17">
		<?php echo $title ?>
		<!--nama produk dr Pelaku Usaha-->
	</span>
</div>

<!-- Detail Pelaku Usaha -->
<div class="container bgwhite p-t-35 p-b-80">
	<div class="flex-w flex-sb">
		<div class="w-size13 p-t-30 respon5">
			<div class="wrap-slick3 flex-sb flex-w">
				<div class="wrap-slick3-dots"></div>

				<div class="slick3">
	
					<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>">
						<div class="wrap-pic-w">
							<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">
						</div>
					</div>

					<?php if($gambar) { 
						foreach ($gambar as $gambar) {
							?>

							<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>">
								<div class="wrap-pic-w">
									<img src="<?php echo base_url('assets/upload/image/'.$gambar->gambar) ?>" alt="<?php echo $gambar->judul_gambar ?>">
								</div>
							</div>
							<?php 
						}
					} ?>

				</div>
			</div>
		</div>

		<div class="w-size14 p-t-30 respon5">
			<h1 class="text-primary"><u>Info Pelaku Usaha</u></h1>
			<br>
			<h4 class="product-detail-name m-text20 p-b-13">
				<?php echo $title ?>
			</h4>

			<?php 
			// FORM UNTUK MEMPROSES GABUNG FP dengan PELAKU USAHA

			echo form_open(base_url('belanja/add')); 
			// Elemen yang dibawa
			echo form_hidden('id_pelapak', $produk->id_pelapak);
			echo form_hidden('id', $produk->id_produk);
			echo form_hidden('stok', 1);
			echo form_hidden('qty', 1);
			echo form_hidden('price', $produk->harga);
			echo form_hidden('name', $produk->nama_produk);
			

			// Elemen redirect
			echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));

			?>

			<span class="m-text14">
				Rp. <?php echo number_format($produk->harga,'0',',','.') ?>
			</span>

			<p class="s-text12 p-t-10">Deskripsi Produk
				<?php echo $produk->keterangan ?>
			</p>

			<p class="s-text12 p-t-10"><img class="mr-2" src="<?php echo base_url() ?>assets/template/images/komisi.png" alt="" style="margin-right: 1px;" width="35">
			Komisi (Bonus)
			<br>
				<tr>
					<td>
					Rp. <?php echo $produk->komisi ?>
					</td>

					<td>
						<p>
							<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
								Selengkapnya
							</a>
						
						</p>
						<div class="collapse" id="collapseExample">
							<div class="card card-body"><u>*Bonus</u> 
								<p>Rp. 9.000 (5-10)</p>
								<p>Rp. 13.500 (11-15)</p>
								<p>Rp. 18.000 (>15)</p>
							</div>
						</div>
					</td>

					<!-- <td>
						<div class="btn-group dropright">
							<button type="button" class="btn btn-light">
								<p class="text-primary"><strong>Selengkapnya</strong></p>
							</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropright</span>
							</button>
							<div class="dropdown-menu">
								<p>Rp. 9.000 (5-10)</p>
								<p>Rp. 13.500 (11-15)</p>
								<p>Rp. 18.000 (>15)</p>
							</div>
						</div>
					</td> -->
				</tr>
			</p>
			

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
					color:#E9E9E9;
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
			<?php } else if ($hsl_rating<5.0000 && $hsl_rating>4.0000) { ?>
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
			<?php } else if ($hsl_rating<4.0000 && $hsl_rating>3.0000) { ?>
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
			<?php } else if ($hsl_rating<3.0000 && $hsl_rating>2.0000) { ?>
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
			<?php } else if ($hsl_rating<2.0000 && $hsl_rating>1.0000) { ?>
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
	
			  
			<!--<div class="p-t-33 p-b-60">-->
			<!-- BISA DIHAPUS 18 JUNI -->
				<!-- <h4>Stok</h4>&nbsp;&nbsp;&nbsp;
				<h4>Tersedia: <?php echo $produk->stok ?></h4>
				<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
					<select class="form-control" name="stok">
						<option>Pilih Jumlah</option>
						<?php
						$maxstok=$produk->stok;
						for ($i = 1; $i <= $maxstok; $i++) {
							echo '<option value="'.$i.'">'.$i.'</option>';
						}
						?>
					</select>
				</div> -->
				<br>
				<h3>Jumlah</h3>
				<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">

					<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
						<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
					</button>

					<input class="size8 m-text18 t-center num-product" type="number" name="qty" placeholder="1">

					<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
						<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
					</button>
				</div>
			
			<br>

			<div class="mt-2 mb-2 d-flex justify-content-between align-items-center web-layout">
				<div class="button-outline">
					 <!-- <a id="edit_brg" data-toggle="modal" data-target="#edit"> -->
						<!-- <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" data-toggle="modal" data-target="#edit"> 
							<img class="mr-2" src="<?php echo base_url() ?>assets/template/images/package.svg" alt="" style="margin-right: 10px;" width="35">Tawarkan Barang
						</button> -->
					<!-- </a> -->
					<!-- <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4"> -->
					<?php echo anchor('produk/tawarkan/'.$produk->slug_produk,'<div class="button"><b>TAWARKAN BARANG</b></div>') ?>
					<!-- <img class="mr-2" src="<?php echo base_url() ?>assets/template/images/package.svg" alt="" style="margin-right: 10px;" width="35"> -->
					<!-- </button> -->
				</div>
				
				<div class="button-outline">
					<button type="submit" name="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
						<img class="mr-2" src="<?php echo base_url() ?>assets/template/images/handshake.svg" alt="" style="margin-right: 10px;" width="35">Gabung Sekarang
					</button>
				</div>
			</div>

		</div>
		<?php echo form_close();?>
	</div>
</div>


<!-- Modal Edit -->
<!-- <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tawarkan Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="form" enctype="multipart/form-data">
		<div class="modal-body">
			<p>Modal body text goes here.</p>
			<div class="form-group">
				<label for="hrg">Harga</label>
				<input type="text" name="hrg" class="form-control" id="harga" required>
			</div>

			<div class="form-group">
				<label for="nama_produk">Nama Produk</label>
				<input type="text" name="nama_produk" class="form-control" id="nama_produk" required>
			</div>
		</div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="edit">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	</form>
    </div>
  </div>
</div>  -->
<!-- <script src="assets/template/js/main.js"></script>
<script type="text/javascript">
$(document).on("click", "#edit_brg", function() {
	var idbrg = $(this).data('id_pelapak');
	var hrgbrg = $(this).data('harga');
	var nama_produk = $(this).data('nama_produk');
	$(".modal-body #hrgbrg").val(hrgbrg);
	$(".modal-body #nama_produk").val(nama_produk);
})
</script> -->

<!-- Rekomendasi Pelaku Usaha Lainnya -->
<section class="relateproduct bgwhite p-t-45 p-b-138">
	<div class="container">
		<div class="sec-title p-b-60">
			<h3 class="m-text5 t-center">
				Rekomendasi Lainnya
			</h3>
			<i><h5>**Cek pelaku usaha pilihan dari <strong>Fe-Preneur</strong></h5></i>
		</div>
		
		<!-- Slide2 -->


		<div class="wrap-slick2">
			<div class="slick2">

				<?php foreach ($produk_related as $produk_related) { ?>

					<div class="item-slick2 p-l-15 p-r-15">
						<?php 
					// FORM UNTUK PROSES GABUNG

						echo form_open(base_url('belanja/add')); 
					// Elemen yang dibawa
						echo form_hidden('id', $produk_related->id_produk);
						echo form_hidden('qty', 1);
						echo form_hidden('price', $produk_related->harga);
						echo form_hidden('name', $produk_related->nama_produk);

					// Elemen redirect
						echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));

						?>
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="<?php echo base_url('assets/upload/image/'.$produk_related->gambar) ?>" alt="<?php echo $produk_related->nama_produk ?>">

								<div class="block2-overlay trans-0-4">
									<a href="<?php echo base_url() ?>assets/template/#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button gabung pelaku usaha -->
										<!-- <button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Gabung Sekarang
										</button> -->
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="<?php echo base_url('produk/detail/'.$produk_related->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
									<p class="text-primary"><?php echo $produk_related->nama_produk ?></p>
								</a>

								<span class="block2-price m-text6 p-r-5">
									Rp. <?php echo number_format($produk_related->harga,'0',',','.')  ?> 
								</span>
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




