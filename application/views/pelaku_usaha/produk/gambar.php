<?php 
// Error upload
if(isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//FORM OPEN
echo form_open_multipart(base_url('pelaku_usaha/produk/gambar/'.$produk->id_produk),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Nama Produk</label>

  <div class="col-md-8">
    <input type="text" name="judul_gambar" class="form-control"  placeholder="Judul Gambar Produk" value="<?php echo set_value('judul_gambar') ?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Unggah Foto Produk</label>

  <div class="col-md-3">
    <input type="file" name="gambar" class="form-control"  placeholder="Gambar Produk" value="<?php echo set_value('gambar') ?>" required>
  </div>

  <div class="col-md-offset-6">
  	<p>
  	<button class="btn btn-success btn-sm" name="submit" type="submit"> <i class="fa fa-save"></i> Simpan dan Unggah Produk</button>
	<button class="btn btn-info btn-sm" name="reset" type="reset"> <i class="fa fa-times"></i> Reset</button>
   <button class="btn btn-primary btn-sm" name="back" type="button" onclick="javascript:history.back()"><i class="fa fa-backward"></i><span ></span> Kembali</button></p>
  	
  </div>
</div>

<?php echo form_close(); ?>
<br>
<br>

<?php 
// Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>'; 
}
?>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>NO</th>
			<th>FOTO</th>
			<th>PRODUK</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td>1</td>
			<td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
			</td>
			<td><?php echo $produk->nama_produk ?></td>
			<td>
			</td>
		</tr>

		<?php $no=2; foreach($gambar as $gambar) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
			</td>
			<td><?php echo $gambar->judul_gambar ?></td>
			<td>

				<a href="<?php echo base_url('pelaku_usaha/produk/delete_gambar/'.$produk->id_produk.'/'.$gambar->id_gambar) ?>" class= "btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus gambar ini?')"><i class="fa fa-trash-o"></i>Hapus</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>