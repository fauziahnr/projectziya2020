
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
echo form_open_multipart(base_url('admin/user/pelanggan'),' class="form-horizontal"');
?>
<?php 
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
			<th>FEMALE PRENEUR</th>
			<th>EMAIL</th>
			<th>TELEPON</th>
			<th>ALAMAT</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($pelanggan as $pelanggan) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $pelanggan->nama_pelanggan ?></td>
			<td><?php echo $pelanggan->email_pelanggan ?></td>
			<td><?php echo $pelanggan->telepon ?></td>
			<td><?php echo $pelanggan->alamat ?></td>
			<td> 
				<a href="<?php echo base_url('admin/pelanggan/detail/'.$pelanggan->id_pelanggan) ?>" class= "btn btn-warning btn-xs"><i class="fa fa-edit"></i>Detail</a>

				<!-- <a href="<?php echo base_url('admin/pelanggan/delete/'.$pelanggan->id_pelanggan) ?>" class= "btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i>Hapus</a> -->
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<?php echo form_close(); ?>