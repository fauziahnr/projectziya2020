<!-- Gabung -->
<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Gabung item -->
		<div class="container-table-cart pos-relative">
			<div class="wrap-table-shopping-cart bgwhite">
				<!-- <h1><?php echo $title ?></h1> -->
				<h1>Detail Gabung</h1>
				<div class="clearfix"></div>
				<br><br>
				<?php if($this->session->flashdata('sukses'))
				{
					echo '<div class="alert alert-warning">';
					echo $this->session->flashdata('sukses');
					echo '</div>';

				} ?>

				<style type="text/css" media="screen">
					.table-shopping-caret .colum-4 {
						width: 180px;
						padding-right: 30px;
					}
					.form-kontrol {
						display: block;
						/*width: 100%;*/
						padding: .5rem .75rem;
						font-size: 1rem;
						line-height: 1.25;
						color: #495057;
						background-color: #fff;
						background-image: none;
						background-clip: padding-box;
						border: 1px solid rgba(0,0,0,.15);
						border-radius: .25rem;
						transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
					}
				</style>

				<table class="table">
					<tr>
						<th class="column-1">GAMBAR</th>
						<th class="column-2">PRODUK</th>
						<th class="column-3" style="width: 150px;">HARGA</th>
						<th class="column-4">JUMLAH BARANG</th>
						<!-- <th class="column-5">Pesanan</th> -->
						<th class="column-6" style="width: 130px;">SUBTOTAL</th>
						<th class="column-7" style="width: 150px;">ACTION</th>

					</tr>


					<?php 


						// Looping data Gabung

					foreach ($keranjang as $keranjang) {
							// Ambil data produk pelaku usaha

						$id_produk = $keranjang['id'];
						$produk = $this->produk_model->detail($id_produk);

							// Form untuk update gabung
						echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
						?>



						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
								</div>
							</td>
							<td class="column-2"><?php echo $keranjang['name']; ?></td>
							<td class="column-3">Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
							<td class="column-4">
								<!-- <div class="flex-w of-hidden w-size17"> -->
									<select class="form-kontrol" name="stok" id="exampleFormControlSelect1">
										<?php
										$maxstok=$keranjang['stok'];
										for ($i = 1; $i <= $maxstok; $i++) {
											echo '<option value="'.$i.'">'.$i.'</option>';
										}
										?>
									</select>
									<!-- </div> -->

							</td>
							<!--LAMA-->
								<!-- <td class="column-5">
									<div class="flex-w bo5 of-hidden w-size17">
										<button class="btn btn-sm btn-num-product-down color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>

										<input class="size8 m-text18 t-center num-product sm" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>">

										<button class="btn btn-sm btn-num-product-up color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</button>
									</div>
								</td> -->
								<td class="column-6">Rp. 
									<?php 
									$sub_total = $keranjang['price'] * $keranjang['qty'] * $keranjang['stok'];
									echo number_format($sub_total,'0',',','.'); ?>

								</td>
								<td class="column-7">
									<button type="submit" name="update" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i> Update
									</button>
									<a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>"  class="btn btn-warning btn-sm">
										<i class="fa fa-trash-o"></i> Hapus
									</a>
								</td>
							</tr>

							<?php 

				 //ECHO FORM CLOSE
							echo form_close();
					// End looping

						}

						?>
						<tr class="table-row bg-info text-strong" style="font-weight: bold; color: white !important;">
							<td colspan="4" class="column-1"> Total Belanja</td>
							<td colspan="2" class="column-2">Rp. <?php echo number_format($this->cart->total(),'0',',','.')?></td>
						</tr>


					</table>
					<br>
					<?php 
					echo validation_errors('<div class="alert alert-warning">', '</div>');
					echo form_open(base_url('belanja/checkout')); 

					$kode_transaksi = date('dmY').strtoupper(random_string('alnum',8));

					?>
					<!-- Type Hidden -->
					<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
					<input type="hidden" name="id_pelapak"	value="<?php echo $produk->id_pelapak ?>">
					<input type="hidden" name="id_produk" value="<?php echo $produk->id_produk ?>">
					<input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
					<input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">

					<table class="table">
						<thead>
							<tr>
								<th width="25%">Kode Gabung Mitra</th>
								<th>
									<input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" readonly required></th>
								</tr>
								<tr>
									<td>Nama Female Preneur</td>
									<td>
										<input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" ></th>
									</td>
								</thead>
								<tbody>
									<tr>
										<td>Email Female Preneur</td>
										<td>
											<input type="email" name="email_pelanggan" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email_pelanggan ?>" >
										</td>
									</tr>
									<tr>
										<td>Telepon</td>
										<td>
											<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" >
										</td>
									</tr>

									<!-- <tr>
										<td>Tanggal Gabung</td>
										<td>
											<input type="text" name="tanggal_sewa" id="survei" class="form-control" placeholder="Tanggal Sewa">
										</td>
									</tr> -->
<!-- 
								<div class="form-group">
									<input name="survei" type="text" class="form-control" id="survei" placeholder="masukkan tanggal survei">
								</div>


							-->								
							<!-- <tr>
								<td>Jumlah Hari</td>
								<td>
									<input type="number" wi name="qty" width="10%" value="<?php echo $keranjang['qty'] ?>" >Hari
								</td>
							</tr> -->
							<tr>
								<td>Alamat Pengiriman</td>
								<td>
									<textarea name="alamat" class="form-control" placeholder="Alamat"> <?php echo $pelanggan->alamat ?></textarea>
								</td>
							</tr>
<!-- 							<tr>
								<td>Pembayaran</td>
								<td width="50%">
									<select name="status_pembayaran" >
										<option value="online"> Transfer</option>
										<option value="offline"> Bayar Ditempat</option>
									</select>
								</td>
							</tr> -->
							<tr>
								<td></td>
								<td>
									<button class="btn btn-success btn-lg" type="submit">
										<i class="fa fa-save"></i> Gabung Mitra Sekarang
									</button>
									<button class="btn btn-default btn-lg" type="reset">
										<i class="fa fa-times"></i> Reset
									</button>
									
								</td>
							</tr>


						</tbody>
					</table>



					<?php echo form_close(); ?>


				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">

				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->

				</div>
			</div>


		</div>
	</section>

