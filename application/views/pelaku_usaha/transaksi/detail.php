<p class="pull-right">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('pelaku_usaha/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" title="Cetak" class="btn btn-success btn-sm">
			<i class="fa fa-print"> Cetak</i>
		</a>
		<a href="<?php echo base_url('pelaku_usaha/transaksi') ?>" title="Kembali" class="btn btn-info btn-sm">
			<i class="fa fa-backward"> Kembali</i>
		</a>
	</div>
	
</p>
<div class="clearfix"></div><hr>
<table class="table table-bordered">
	<thead>
		<tr>
			<th width="20%">Nama Female Preneur</th>
			<th>: <?php echo $header_transaksi->nama_pelanggan ?></th>
		</tr>
		<tr>
			<th width="20%">KODE TRANSAKSI</th>
			<th>: <?php echo $header_transaksi->kode_transaksi ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Tanggal</td>
			<td>: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
		</tr>
		<tr>
			<td>Stok</td>
			<td>: <?php echo $header_transaksi->stok ?></td>
		</tr>
		<tr>
			<td>Jumlah Produk</td>
			<td>: <?php echo number_format($header_transaksi->jumlah_hari) ?></td>
		</tr>

		<tr>
			<td>Jumlah total</td>
			<td>: <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
		</tr>

<!-- 
	<tr>
		<td>ID PRODUK</td>
		<td>: <?php echo $header_transaksi->id_produk ?></td>
	</tr> -->
	<tr>
		<td>Status Gabung</td>
		<td>
			: <?php echo $header_transaksi->status_sewa ?>
			<?php if ($header_transaksi->status_sewa=="Menunggu Konfirmasi") { ?>
				<?php echo form_open('pelaku_usaha/transaksi/status_setuju/'.$header_transaksi->kode_transaksi); ?>

				<input type="text" name="id_produk" hidden="true" value="<?php echo $header_transaksi->id_produk ?>">
				<input type="text" name="status_sewa" hidden="true" value="Konfirmasi">
				<input type="text" name="stok" value="<?php echo $header_transaksi->stok ?>">
				<button type="submit" name="Submit" class="btn btn-danger btn-xs" > Setuju</button>
				<?php echo form_close(); ?>

				<?php echo form_open('pelaku_usaha/transaksi/status_setuju/'.$header_transaksi->kode_transaksi); ?>
				<input type="text" name="status_sewa" hidden="true" value="Ditolak">
				<button type="submit" name="Submit" class="btn btn-info btn-xs" > Tolak</button>
				<?php echo form_close(); ?>
			<?php }else if($header_transaksi->status_sewa=="Konfirmasi"){ ?>
				<?php echo form_open('pelaku_usaha/transaksi/status_setuju/'.$header_transaksi->kode_transaksi); ?>
				<input type="text" name="status_sewa" hidden="true" value="Disewa">
				<button type="submit" name="Submit" class="btn btn-info btn-xs" > Gabung</button>
				<?php echo form_close(); ?>
			<?php }else if($header_transaksi->status_sewa=="Disewa"){ ?>
				<?php echo form_open('pelaku_usaha/transaksi/status_selesai/'.$header_transaksi->kode_transaksi); ?>
				<input type="text" name="id_produk" hidden="true" value="<?php echo $header_transaksi->id_produk ?>">
				<input type="text" name="status_sewa" hidden="true" value="Selesai">
				<button type="submit" name="Submit" class="btn btn-info btn-xs" > Selesai</button>
			<?php } ?>
			
			<?php echo form_close(); ?>



<!-- <?php echo form_open(); ?>
			<input type="text" name="status_sewa" hidden="true" value="Diterima">
			<button type="submit" name="Submit" class="btn btn-danger btn-xs" > Setuju</button>
			<?php echo form_close(); ?>
			<?php echo form_open(); ?>
			<button type="submit" name="Submit" class="btn btn-info btn-xs" > Tolak</button>
			<?php echo form_close(); ?> -->
			<!--  <select name="status_produk" class="form-control" readonly>
    		 <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
      		<option value="Dikirim" <?php if($header_transaksi->status_sewa=="Dikirim") { echo "selected"; } ?>>Dikirim</option>
      		<option value="Ditolak" <?php if($header_transaksi->status_sewa=="Ditolak") { echo "selected"; } ?>>Ditolak</option>
      	</select> -->
      </td>
  </tr>
  <tr>
  	<td>Tanggal Gabung </td>
  	<td>: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_sewa))?></td>
  </tr>
</tr>
</tbody>
</table>

<hr>

<table class="table table-bordered" width="100%">
	<thead>
		<tr class="bg-success">
			<th>NO</th>
			<th>KODE GABUNG MITRA PELAKU USAHA</th>
			<th>NAMA PRODUK</th>
			<th>JUMLAH</th>
			<th>HARGA</th>
			<th>SUB TOTAL</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach ($transaksi as $transaksi) {
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $transaksi->kode_produk ?></td>
				<td><?php echo $transaksi->nama_produk ?></td>
				<td><?php echo number_format($transaksi->jumlah) ?></td>
				<td><?php echo number_format($transaksi->harga) ?></td>
				<td><?php echo number_format($transaksi->total_harga) ?></td>

			</tr>
			<?php $i++; } ?>
		</tbody>
	</table>
