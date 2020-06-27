
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
			<!-- Product Pelaku Usaha-->
				<!-- <h2><?php echo $title ?></h2> -->
				<h2>Riwayat Gabung Pelaku Usaha</h2>
				<hr>	
				<p>Berikut adalah riwayat Gabung Mitra Anda dengan Pelaku Usaha</p>
				<?php 
				// Jika ada permintaan gabung, tampilkan tabel
				if($header_transaksi) {
				 ?>
				 <table class="table table-bordered" width="100%">
				 	<thead>
				 		<tr class="bg-success">
				 			<th>NO</th>
				 			<th>KODE GABUNG MITRA</th>
				 			<th>TANGGAL</th>
				 			<th>JUMLAH TOTAL</th>
				 			<th>JUMLAH HARI</th>
				 			<th>STATUS GABUNG</th>
				 			<!-- <th>STATUS PEMBAYARAN</th> -->
				 			<th>ACTION</th>
				 		</tr>
				 	</thead>
				 	<tbody>
				 		<?php $i=1; foreach ($header_transaksi as $header_transaksi) {
				 		 ?>
				 		<tr>
				 			<td><?php echo $i; ?></td>
				 			<td><?php echo $header_transaksi->kode_transaksi ?></td>
				 			<td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
				 			<td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
				 			<td><?php echo $header_transaksi->total_item ?></td>
				 			<td><?php echo $header_transaksi->status_sewa?></td>
				 			<!-- <td><?php echo $header_transaksi->status_pembayaran ?></td> -->
				 			<td>
				 					<?php if ($header_transaksi->status_pembayaran == 'online') { ?>
				 						<?php echo '<div class="btn-group">
						 				<a href="detail/'.$header_transaksi->kode_transaksi.'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>

						 				<a href="konfirmasi/'.$header_transaksi->kode_transaksi.'" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Konfirmasi</a>

					 				</div>'; ?>
				 					<?php } else { ?>
				 						<?php echo '<div class="btn-group">
						 				<a href="detail/'.$header_transaksi->kode_transaksi.'" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>


					 				</div>';?>
				 					<?php } ?>

					 			<div class="btn-group">
						 				<!-- <a href="<?php echo base_url('dasbor/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a> -->

										<!--KONFIRMASI BAYAR VIA REKENING-->
						 				<!-- <a href="<?php echo base_url('dasbor/konfirmasi/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Konfirmasi</a>  -->


						 				<!-- <a href="<?php echo base_url('dasbor/konfirmasi/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Bayar Ditempat</a>  -->
					 				</div>
					 			</td>
				 		</tr>
				 		<?php $i++; } ?>
				 	</tbody>
				 </table>

			<?php 
			// Kalau ga ada, tampilkan notifikasi
			 }else{ ?>
				<p class="alert alert-success">
					<i class="fa fa-warning"></i> Belum ada data gabung mitra pelaku usaha
				</p>

			<?php } ?>
					
		
			</div>

		</div>
	</div>
</div>
</section>

