<table class="table table-bordered" width="100%">
	<thead>
		<tr class="bg-success">
			<th>NO</th>
			<!-- <th>ID PRODUK</th> -->
			<th>FEMALE PRENEUR</th>
			<th>KODE GABUNG MITRA</th>
			<th>TANGGAL</th>
			<th>JUMLAH TOTAL</th>
			<th>JUMLAH</th>
			<!-- <th>STOK</th> -->
			<!-- <th>STATUS</th> -->
			<th>STATUS GABUNG</th>
			<th>STATUS PEMBAYARAN</th>
			<th width="25%">ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach ($header_transaksi as $header_transaksi) {
		 ?>
		<tr>
			<td><?php echo $i; ?></td>
			<!-- <td><?php echo $header_transaksi->id_produk?> -->
			<td><?php echo $header_transaksi->nama_pelanggan?>
				<br><small>
					Telepon: <?php echo $header_transaksi->telepon ?>
				<br>Email: <?php echo $header_transaksi->email_pelanggan ?>
				<br>Alamat Kirim: <br> <?php echo nl2br($header_transaksi->alamat) ?>
				</small>
			</td>
			<td><?php echo $header_transaksi->kode_transaksi ?></td>
			<td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
			<td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
			<td><?php echo $header_transaksi->total_item ?></td>
			<!-- <td>
				<a href="<?php echo base_url('pelaku_usaha/transaksi/konfirmasi_produk/'.$header_transaksi->id_produk) ?>" class="btn btn-success btn-sm"> Terima</a> 
			</td> -->
			<td><?php echo $header_transaksi->status_sewa?></td>
			<td>
				<?php if ($header_transaksi->status_pembayaran == 'online') {?>
					Bayar Online
				<?php }else{ ?>
					Bayar Ditempat
				<?php } ?>
			</td>
			<td>
				<div class="btn-group">
 				<a href="<?php echo base_url('pelaku_usaha/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>

 				<a href="<?php echo base_url('pelaku_usaha/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Cetak</a>

 				<a href="<?php echo base_url('pelaku_usaha/transaksi/pdf/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-sm"><i class="fa fa-file-pdf-o"></i> Unduh PDF</a>

 				<!-- <a href="<?php echo base_url('pelaku_usaha/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Update Status</a> -->
				</div>
				<div class="clearfix"></div>
				<br>
				<div class="btn-group">
				</div>
			</td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>