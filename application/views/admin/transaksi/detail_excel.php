<?php 
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

 ?>

<h1>
	DETAIL TRANSAKSI Fe-Preneur
</h1>
<table border="1">
<thead>
	<tr>
		<th>Nama Female Preneur</th>
		<th>: <?php echo $header_transaksi->nama_pelanggan ?></th>
	</tr>
	<tr>
		<th>KODE GABUNG</th>
		<th>: <?php echo $header_transaksi->kode_transaksi ?></th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>Tanggal</td>
		<td>: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
	</tr>
	<tr>
		<td>Jumlah total</td>
		<td>: <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
	</tr>
	<tr>
		<td>Status Bayar</td>
		<td>: <?php echo $header_transaksi->status_sewa?></td>
	</tr>
	<tr>
		<td>Tanggal Bayar</td>
		<td>: <?php echo date('d-m-Y', strtotime($header_transaksi->tanggal_bayar))?></td>
	</tr>
	<tr>
		<td>Jumlah Bayar</td>
		<td>: Rp. <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.')?></td>
	</tr>
	<tr>
		<td>Pembayaran dari</td>
		<td>: <?php echo $header_transaksi->nama_bank?> No. rekening <?php echo $header_transaksi->rekening_pembayaran ?> a.n <?php echo $header_transaksi->rekening_pelanggan ?></td>
	</tr>
	<tr>
		<td>Pembayaran ke rekening</td>
		<td>: <?php echo $header_transaksi->bank?> No. rekening <?php echo $header_transaksi->nomer_rekening ?> a.n <?php echo $header_transaksi->nama_pemilik ?></td>
	</tr>
</tbody>
</table>

<hr>

<table border="1">
<thead>
	<tr class="bg-success">
		<th>NO</th>
		<th>KODE GABUNG</th>
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
