<!-- <div class="form-horizontal" >
<label>Jenis Layanan</label>
                  <select class="form-control" name="filter">
                  <option>-------------PILIH----------------</option>
                  <option> <a href="" title="">Pelapak Teratas </a></option>
                  <option> Pelanggan Teratas </option>
                  </select>
                  <button class="btn btn-default" type="submit">Go</button>
<br>
	
</div> -->
<form action="<?php echo base_url('admin/transaksi/filter') ?>" method="post">
	<div class="input-group">
		<select class="form-control" name="filter">
			<option value="">Pilih</option>
			<option value="1" >Pelaku Usaha Teratas</option>
			<option value="2" >Female Preneur Teratas</option>
		</select>
		<span class="input-group-btn">
			<button class="btn btn-success" type="submit" name="submit"> Go !</button>
			<!-- <a class="btn btn-success" data-toggle="modal" data-target="#modal_add_new"> Go !</a> -->
		</span>
	</div>
</form>

<br>
<table class="table table-bordered" width="100%">
	<thead>
		<tr class="bg-success">
			<th>NO</th>
			<th>JUMLAH TRANSAKSI</th>
			<th>PELANGGAN</th>
			<!-- <th>KODE</th> -->
			<th>TANGGAL</th>
			<th>JUMLAH TOTAL</th>
			<th>JUMLAH HARI</th>
			<th>STATUS SEWA</th>
			<th width="10%">ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach ($pelangganatas as $header_transaksi) {
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $header_transaksi->pelangganteratas ?></td>
				<td><?php echo $header_transaksi->nama_pelanggan?>
				<br><small>
					Telepon: <?php echo $header_transaksi->telepon ?>
					<br>Email: <?php echo $header_transaksi->email_pelanggan ?>
					<br>Alamat Kirim: <br> <?php echo nl2br($header_transaksi->alamat) ?>
				</small>
			</td>
			<!-- <td><?php echo $header_transaksi->kode_transaksi ?></td> -->
			<td><?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
			<td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
			<td><?php echo $header_transaksi->total_item ?></td>
			<td><?php echo $header_transaksi->status_sewa?></td>
			<td>
				<div class="btn-group">
					<a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
					<br>
					<br>
					<a href="<?php echo base_url('admin/transaksi/excel/'.$header_transaksi->kode_transaksi)?>" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Unduh Excel</a>


				</td>
			</tr>
			<?php $i++; } ?>
		</tbody>
	</table>