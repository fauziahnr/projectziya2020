<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
	<a href="<?php echo base_url() ?>" class="s-text16 text-primary">
		Home
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<a href="<?php echo base_url('produk') ?>" class="s-text16 text-primary">
		Detail Pelaku Usaha
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

    <a href="<?php echo base_url('produk') ?>" class="s-text16">
		<strong>Tawarkan Barang</strong>
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
		<!-- <div class="w-size13 p-t-30 respon5">
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
		</div> -->

		<div class="w-size13 p-t-30 respon5">
            <div class="social-share-set-margin">
                <div class="title"><strong><h1><u>Tawarkan Barang, Yuk</u></h1></strong> </div>
                <span class="s-text5">Silahkan Kamu ubah Nama Produk dan Atur Harga sesuai keuntungan yang ingin kamu peroleh</span>
                <br>
                <br>
                <br>
            
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

        
            <div class="form-group">
                <div class="alert alert-info">
                    <span class="m-text14">Harga       
                    </span>            
                    <span class="m-text14">
                        Rp. <?php echo number_format($produk->harga,'0',',','.') ?>
                    </span>
                </div>
            </div>

            <!-- Ubah Harga dan Nama Produk Sesuai Female -->
            <div class="data-input">
                <div class="data-input-group">
                    <div class="s-text12 p-t-10">Nama Produk</div>
                    <div class="d-flex border-bottom align-items-center">
                        <input class="dig-input s-text13 p-t-10" type="text" value="<?php echo $produk->nama_produk ?>">
                        <!-- <input type="text" name="nama_produk" class="s-text10 p-t-10 form-control" placeholder="<?php echo $produk->nama_produk ?>" value="<?php echo set_value('nama_produk') ?>">-->
                        <span class="fa fa-edit">
                        </span>
                    </div>
                </div>
                <br>
                <br>
                <div class="data-input-group">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="s-text12 p-t-10">Tentukan Harga</div>
                            <div class="label margin">
                                Keuntungan : Rp 0
                            </div>
                    </div>
                    <div class="d-flex border-bottom align-items-center">
                        <input class="dig-input s-text13 p-t-10" type="tel" value="Rp. <?php echo $produk->harga ?>"> 
                            <span class="fa fa-edit">
                            </span>
                    </div>
                </div>
                <br>
                <br>

                <div class="data-input-group">
                    <div class="s-text12 p-t-10">Pesan</div>
                    <textarea class="dig-textarea" name="keterangan" id="" cols="" rows="5">
                        <?php echo $produk->keterangan ?>
                    </textarea>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-right flex-grow-1 dig-message-count">
                            25/300
                        </div>
                    </div>
                </div>
            </div>   
            <br>
            <div class="button-outline">
                <div class="action-footer d-flex justify-content-between">
                    <button class="btn btn-outline-primary flex-c-m size14">
                        <img class="ml-n2 mr-n1" src="<?php echo base_url() ?>assets/template/images/link.png" alt="Share Link" height="40px">
                        <strong>LAINNYA</strong>
                    </button>
                    <button class="btn btn-success btn-lg flex-c-m size14">
                        <img class="#" src="<?php echo base_url() ?>assets/template/images/wa.svg" alt="" height="40px">
                        <!-- <strong>Bagikan</strong>  -->
						<!-- <a target='_BLANK' style='text-transform:uppercase; font-weight:bold' class='btn btn-success btn-sm' href='https://api.whatsapp.com/send?&text=Haloo%20saya%20mau%20order,%20$row[nama_produk],..'>Order Via WhatsApp</a>-->
						
						<!-- INI BENAR, PESAN MSH BELUM BISA -->
						<!-- <a target='_BLANK' style='text-transform:uppercase; font-weight:bold' class='' href="https://api.whatsapp.com/send?text=<?php echo base_url() . $_SERVER['REQUEST_URI']; ?>" data-link="<?php echo base_url() . $_SERVER['REQUEST_URI']; ?>" target="_blank" style="color:#fffff;">
						<strong>Bagikan</strong>
						</a> -->

						<!--INI BENAR, TAPI MANUAL PESANNYA  -->
						<a target='_BLANK' style='text-transform:uppercase; font-weight:bold' class='' href="https://api.whatsapp.com/send?text= Fashion Muslimah 1 Hijab%20- Rp.25000, -%20hijab trend 2020, bagus bahannya dan fashionable" target="_blank" style="color:#fffff;">
						<strong>Bagikan</strong>
							<!-- <i class="fa fa-whatsapp"></i>  -->
						</a> 
						
					
						<!-- <a href="https://api.whatsapp.com/send?text=<?php echo urlencode ('http://www.example.com/index.php?route=produk/tawarkan&id_produk=44'); ?>" data-action="share/whatsapp/share">Share via Whatsapp</a>
						
						</a> -->
                    
					</button>
                </div>
            </div>
            </div>
						
			

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
	
			<!--  -->
			<div class="p-t-33 p-b-60">
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
			
    
	
        </div>

		</div>
		<?php echo form_close();?>

        <div class="w-size14 p-t-30 respon5">
            <h1></h1>
            <img src="<?php echo base_url() ?>assets/template/images/ilustrasi.jpg" alt="">
            
            
        </div>
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
<!-- <section class="relateproduct bgwhite p-t-45 p-b-138">
	<div class="container">
		<div class="sec-title p-b-60">
			<h3 class="m-text5 t-center">
				Rekomendasi Lainnya
			</h3>
			<i><h5>**Cek pelaku usaha pilihan dari <strong>Fe-Preneur</strong></h5></i>
		</div>
		
		


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
						
                        
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="<?php echo base_url('assets/upload/image/'.$produk_related->gambar) ?>" alt="<?php echo $produk_related->nama_produk ?>">

								<div class="block2-overlay trans-0-4">
									<a href="<?php echo base_url() ?>assets/template/#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										
										<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Gabung Sekarang
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="<?php echo base_url('produk/detail/'.$produk_related->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $produk_related->nama_produk ?>
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
</section> -->




