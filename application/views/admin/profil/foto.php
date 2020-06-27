
<?php 
// Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>'; 
}
?>

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
echo form_open_multipart(base_url('admin/profil/foto'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-3 control-label">Username </label>

  <div class="col-md-8">
   <input type="text" name="username" class="form-control"  placeholder="Username" value="<?php echo $user->username ?>" readonlye>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Upload Foto Baru</label>

  <div class="col-md-8">
    <input type="file" name="foto" class="form-control"  placeholder="Upload Foto Baru" value="<?php if($user->foto !="") { ?> <img src="<?php echo base_url('assets/upload/image/'.$user->foto) ?> class="img img-thumbnail" width="200" >
              <?php }else{ echo 'Belum ada foto profil'; } ?>" required>

    <!--  -->
  </div>
</div>




<div class="form-group">
  <label class="col-md-3 control-label"></label>
  <div class="col-md-5">
  	<button class="btn btn-success btn-lg" name="submit" type="submit"> <i class="fa fa-save"></i> Simpan</button>
	<button class="btn btn-info btn-lg" name="reset" type="reset"> <i class="fa fa-times"></i> Riset</button>

   <button class="btn btn-primary btn-lg" name="back" type="button" onclick="javascript:history.back()"><i class="fa fa-backward"></i><span ></span> Kembali</button>
   </div>
</div>

<?php echo form_close(); ?>