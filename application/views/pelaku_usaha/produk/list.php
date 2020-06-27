<!-- <p>
	<a href="<?php echo base_url('pelaku_usaha/produk/tambah') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Baru </a>
	</p> -->

	<!--UBAH FILTER BISA DI HPS LAGI COMMENTNYA-->
	<!-- <form action="<?php echo base_url('pelaku_usaha/produk/filter') ?>" method="post">
		<div class="input-group">
			<select class="form-control" name="filter">
				<option>Filter</option>
				<option value="1" >Produk Teratas</option>
				<option value="2" >Produk Terbawah</option>
			</select>
			<span class="input-group-btn">
				<button class="btn btn-success" type="submit" name="submit"> Go !</button>
				
				<!-- <a class="btn btn-success" data-toggle="modal" data-target="#modal_add_new"> Go !</a> 
			</span>
		</div>
	</form> -->
	<br>
	<?php 
// Notifikasi
	if($this->session->flashdata('sukses')) {
		echo '<p class="alert alert-success">';
		echo $this->session->flashdata('sukses');
		echo '</div>'; 
	}
	?>

	<!-- <table id="example2" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Rendering engine</th>
				<th>Browser</th>
				<th>Platform(s)</th>
				<th>Engine version</th>
				<th>CSS grade</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Trident</td>
				<td>Internet
					Explorer 4.0
				</td>
				<td>Win 95+</td>
				<td> 4</td>
				<td>X</td>
			</tr>
		</tbody>
	</table> -->
	<table id="example2" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>NO</th>
				<th>FOTO</th>
				<th>NAMA PRODUK</th>
				<th>KATEGORI</th>
				<th>HARGA</th>
				<th>STOK</th>
				<th>STATUS</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach($produk as $produk) { ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
					</td>
					<td><?php echo $produk->nama_produk ?></td>
					<td><?php echo $produk->nama_kategori ?></td>
					<td><?php echo number_format($produk->harga,'0',',','.') ?></td>
					<td><?php echo $produk->stok ?></td>
					<td><?php echo $produk->status_produk ?></td>
					<td>
						<a href="<?php echo base_url('pelaku_usaha/produk/gambar/'.$produk->id_produk) ?>" class= "btn btn-primary btn-xs"><i class="fa fa-image"></i> Tambah Foto (<?php echo $produk->total_gambar ?>)</a>

						<a href="<?php echo base_url('pelaku_usaha/produk/edit/'.$produk->id_produk) ?>" class= "btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

						<!-- <a href="<?php echo base_url('pelaku_usaha/produk/delete/'.$produk->id_produk) ?>" class= "btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a> -->
						<?php include('delete.php') ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>