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
echo form_open_multipart(base_url('admin/user/pelapak'),' class="form-horizontal"');
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
			<th>NAMA</th>
			<th>EMAIL</th>
			<th>TELEPON</th>
			<th>ALAMAT</th>
			<th>TANGGAL DAFTAR</th>
			<th>FOTO BUKTI</th>
			<th>STATUS</th>
			<th>AKSI</th>
			<th>AKSES</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($pelapak as $pelapak) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $pelapak->nama_pelapak ?></td>
			<td><?php echo $pelapak->email_pelapak ?></td>
			<td><?php echo $pelapak->telepon ?></td>
			<td><?php echo $pelapak->alamat ?></td>
			<td><?php echo $pelapak->tanggal_daftar ?></td>
			<td>: <?php if($pelapak->foto_bukti !="") { ?> <img src="<?php echo base_url('assets/upload/image/'.$pelapak->foto_bukti) ?>" class="img img-thumbnail" width="50" >
			<?php }else{ echo 'Belum ada bukti bayar'; } ?>
			</td>

			<td><?php 
				if($pelapak->status == 1)
				{
				?>
				<a href="<?php echo base_url('admin/user/status/'.$pelapak->id_pelapak) ?>" class="btn btn-success btn-xs">Activated</a>
				<?php
				}
				else{
				?>
				<a href="<?php echo base_url('admin/user/status/'.$pelapak->id_pelapak) ?>" class="btn btn-danger btn-xs">Trial</a>
				<?php 					
				
				}; 
				?>
			</td>
			<td>
			<a href="<?php echo base_url('admin/user/status/'.$pelapak->id_pelapak) ?>" class= "btn btn-warning btn-xs"><i class="fa fa-edit"></i>Detail</a>
			</td>
			<td>
				<?php 
				if($pelapak->is_active == 1)
				{
				?>
				<a href="<?php echo base_url('admin/user/update_status/'.$pelapak->id_pelapak) ?>" class="btn btn-success btn-xs">Active</a>
				<?php
				}
				else{
				?>
				<a href="<?php echo base_url('admin/user/update_status/'.$pelapak->id_pelapak) ?>" class="btn btn-danger btn-xs">Nonactive</a>
				<?php 					
				
				}; 
				?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<?php echo form_close(); ?>