<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
			<!--  -->
			<?php include('menu.php') ?>

				
			</div>
		</div>

		<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">			
			<!-- Detail Pelaku Usaha -->
				<!-- <h2><?php echo $title ?></h2> -->
				<h2>Riwayat Gabung</h2>
				<hr>	
				<p>Riwayat Gabung Mitra Pelaku Usaha</p>
				<?php 
				// Jika ada konfirmasi, tampilkan tabel
				if($header_konfirmasi_pelapak) {

				 ?>
				 <table class="table table-bordered">
				 	<thead>
				 		<tr>
				 			<th width="20%">KODE MITRA</th>
				 			<th>: <?php echo $header_konfirmasi_pelapak_pelanggan->kode_konfirmasi ?></th>
				 		</tr>
				 	</thead>
				 	<tbody>
				 		<tr>
				 			<td>Tanggal</td>
				 			<td>: <?php echo date('d-m-Y', strtotime($header_konfirmasi_pelapak->tanggal_konfirmasi)) ?></td>
				 		</tr>
				 		<tr>
				 			<td>Jumlah total</td>
				 			<td>: <?php echo number_format($header_konfirmasi_pelapak->jumlah_konfirmasi) ?></td>
				 		</tr>
				 		<tr>
				 			<td>Status Bayar</td>
				 			<td>: <?php echo $header_konfirmasi_pelapak->status_bayar?></td>
				 		</tr>
				 		<tr>
				 			<td>Bukti Bayar</td>
				 			<td>: <?php if($header_konfirmasi_pelapak->bukti_bayar !="") { ?> <img src="<?php echo base_url('assets/upload/image/'.$header_konfirmasi_pelapak->bukti_bayar) ?>" class="img img-thumbnail" width="200" >
				 			<?php }else{ echo 'Belum ada bukti bayar'; } ?>
				 			</td>
				 		</tr>
				 	</tbody>
				 </table>

				 <?php 
				 // Error upload 
				 if(isset($error)) {
				 	echo '<p class="alert alert-warning">'.$eror.'</p>';
				 }

				 // Notif error
				 echo validation_errors('<p class="alert alert-warning">','</p>');

				 // Form open
				 echo form_open_multipart(base_url('dasbor/konfirmasi/'.$header_konfirmasi_pelapak->kode_konfirmasi));

				  ?>

				  <table class="table">
				  	<tbody>
				  		<tr>
				  			<td width="30%">Pembayaran ke rekening</td>
				  			<td>
				  				<select name="id_rekening" class="form-control">
				  					<?php foreach ($rekening as $rekening) {
									?>
				  					<option value="<?php echo $rekening->id_rekening ?>"> <?php if($header_konfirmasi_pelapak->id_rekening==$rekening->id_rekening) { echo "selected";} ?>
				  						<?php echo $rekening->nama_bank ?> (NO. Rekening:
				  						<?php echo $rekening->nomer_rekening?> a.n <?php echo $rekening->nama_pemilik ?> ) 
				  					</option>
				  					<?php } ?>
				  				</select>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>Tanggal Bayar</td>
				  			<td>
				  				<input type="text" name="tanggal_bayar" class="form-control-lg" placeholder="dd-mm-yyyy" value="<?php if(isset($_POST['tanggal_bayar'])) { echo set_value('tanggal_bayar'); }elseif($header_konfirmasi_pelapak->tanggal_bayar!="") {echo $header_konfirmasi_pelapak->tanggal_bayar; } else{ echo date('d-m-Y'); } ?>" >
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>Jumlah Pembayaran</td>
				  			<td>
				  				<input type="number" name="jumlah_bayar" class="form-control-lg" placeholder="Jumlah Pembayaran" value="<?php if(isset($_POST['jumlah_bayar'])) {echo set_value('jumlah_bayar'); }elseif($header_konfirmasi_pelapak->jumlah_bayar!="") { echo $header_konfirmasi_pelapak->jumlah_bayar; }else{ echo $header_konfirmasi_pelapak->jumlah_konfirmasi; } ?>" >
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>Dari Bank</td>
				  			<td>
				  				<input type="text" name="nama_bank" class="form-control" value="<?php echo $header_konfirmasi_pelapak->nama_bank ?>" placeholder="Nama Bank">
				  				<small>Contoh : Bank BCA</small>
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>Dari Nomor Rekening</td>
				  			<td>
				  				<input type="text" name="rekening_pembayaran" class="form-control" value="<?php echo $header_konfirmasi_pelapak->rekening_pembayaran ?>" placeholder="Rekening Pembayaran">
				  			<small>Contoh : 6793759269</small>

				  			</td>
				  		</tr>
				  		<tr>
				  			<td>Nama Pemilik Rekening</td>
				  			<td>
				  				<input type="text" name="rekening_pelapak" class="form-control" value="<?php echo $header_konfirmasi_pelapak->rekening_pelapak ?>" placeholder="Nama pemilik rekening">
				  			<small>Contoh : Fauziyah Nur Rahmawati</small>
				  			</td>
				  		</tr>

				  		<tr>
				  			<td>Upload Bukti Bayar</td>
				  			<td>
				  				<input type="file" name="bukti_bayar" class="form-control"  placeholder=" Upload Bukti Pembayaran">
				  			
				  			</td>
				  		</tr>
				  		<td></td>
				  		<td>
				  			<div class="btn-group">
				  				<button class="btn btn-success btn-lg" type="submit" name="submit"><i class="fa fa-upload"></i> Submit</button>
				  				<button class="btn btn-info btn-lg" type="reset" name="reset"><i class="fa fa-times"></i> Reset</button>
				  			</div>
				  		</td>


				  	</tbody>
				  </table>
			<?php 
			// form close
			echo form_close();
			// Kalau ga ada, tampilkan notifikasi
			}else{ ?>
				<p class="alert alert-success">
					<i class="fa fa-warning"></i> Belum ada data konfirmasi
				</p>

			<?php } ?>
					
		
			</div>

		</div>
	</div>
</div>
</section>

