<?php 
// Jika ada transaksi, tampilkan tabel
if($pelapak) {

?>
 
<?php 
// Error upload 
if(isset($error)) {
	echo '<p class="alert alert-warning">'.$eror.'</p>';
}

// Notif error
echo validation_errors('<p class="alert alert-warning">','</p>');

// Form open
echo form_open_multipart(base_url('pelaku_usaha/dasbor/uploadfotoBukti/'.$pelapak->id_pelapak));

?>

<table class="table" >
	<tbody>
		<tr>
			<td width="20%">Nama Pelaku Usaha</td>
			<td>: <?php echo $pelapak->nama_pelapak?></td>
		</tr>
		<tr>
			<td>Status Bayar</td>
			<td>: <?php echo $pelapak->bukti_bayar?></td>
		</tr>
		<tr>
			<td>Bukti Bayar</td>
			<td>: <?php if($pelapak->foto_bukti !="") { ?> <img src="<?php echo base_url('assets/upload/image/'.$pelapak->foto_bukti) ?>" class="img img-thumbnail" width="200" >
			<?php }else{ echo 'Belum ada bukti bayar'; } ?>
			</td>
		</tr>
	<!-- 	<tr>
			<td>Tanggal Bayar</td>
			<td>
				<input type="text" name="tanggal_bayar" class="form-control-lg" placeholder="dd-mm-yyyy" value="<?php if(isset($_POST['tanggal_bayar'])) { echo set_value('tanggal_bayar'); }elseif($pelapak->tanggal_bayar!="") {echo $pelapak->tanggal_bayar; } else{ echo date('d-m-Y'); } ?>" >
			</td>
		</tr>
 -->
		<tr>
			<td>Upload Bukti Bayar</td>
			<td>
				<input type="file" name="foto_bukti" class="form-control"  placeholder=" Upload Bukti Pembayaran">
			</td>
		</tr>
		<td></td>
		<td>
			<div class="btn-group">
				<button class="btn btn-success btn-lg" type="submit" name="submit"><i class="fa fa-upload"></i> Submit</button>
				<button class="btn btn-info btn-lg" type="reset" name="reset"><i class="fa fa-times"></i> Reset</button>
			</div>
		</td>


	</tbody>
</table>
<?php 
// form close
echo form_close();
// Kalau ga ada, tampilkan notifikasi
}else{ ?>
<p class="alert alert-success">
<i class="fa fa-warning"></i> Belum ada data transaksi
</p>

<?php } ?>


</div>

</div>
</div>
</div>
</section>

