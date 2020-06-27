<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
			<?php 
			// Notifikasi
			if($this->session->flashdata('sukses'))
					{
						echo '<div class="alert alert-warning">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
							
					} 

			// Display error
			echo validation_errors('<div class="alert alert-warning">','</div>');


			// Form open
			echo form_open(base_url('pelaku_usaha/dasbor/uploadfotoprofil/'.$pelapak->id_pelapak), 'class="leave-comment"'); ?>

			<table class="table">
				<thead>
					<tr>
						<th width="10%">Nama</th>
						<th>
							<input type="text" name="nama_pelapak" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelapak->nama_pelapak?>" required></th>
					</tr>
				</thead>
				<tbody>
					<tr>
			<td>Foto Profil</td>
			<td>: <?php if($pelapak->foto_profil !="") { ?> <img src="<?php echo base_url('assets/upload/image/'.$pelapak->foto_profil) ?>" class="img img-thumbnail" width="200" >
			<?php }else{ echo 'Belum ada foto'; } ?>
			</td>
		</tr>
		<tr>
			<td>Upload Foto Profil</td>
			<td>
				<input type="file" name="foto_profil" class="form-control"  placeholder=" Upload Foto Profil">
			</td>
		</tr>

		<td></td>
		<td>
			<button class="btn btn-success btn-lg" type="submit">
				<i class="fa fa-save"></i> Update Profil
			</button>
			<button class="btn btn-default btn-lg" type="reset">
				<i class="fa fa-times"></i> Reset
			</button>
			
		</td>
	</tr>

</tbody>
</table>
<?php echo form_close(); ?>
</div>
</div>
</div>
</section>

