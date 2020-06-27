<?php 

//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//FORM OPEN
echo form_open(base_url('admin/user/tambah'),' class="form-horizontal"');
?>
;
;<div class="form-group">
  <label class="col-md-2 control-label">Nama pengguna</label>

  <div class="col-md-5">
    <input type="text" name="nama" class="form-control"  placeholder="Nama pengguna" value="<?php echo set_value('nama') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Email</label>

  <div class="col-md-5">
    <input type="email" name="email" class="form-control"  placeholder="Email pengguna" value="<?php echo set_value('email') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Username</label>

  <div class="col-md-5">
    <input type="text" name="username" class="form-control"  placeholder="Username" value="<?php echo set_value('username') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password " name="password" class="form-control"  placeholder="Password" value="<?php echo set_value (SHA1('password')) ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Upload Foto Profil</label>

  <div class="col-md-10">
   <input type="file" name="foto" class="form-control" required="required">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Level Hak Akses</label>
  <div class="col-md-5">
    <select name="akses_level" class="form-control">
    	<option value="Admin">Admin</option>
    	<option value="User">User</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
  	<button class="btn btn-success btn-lg" name="submit" type="submit"> <i class="fa fa-save"></i> Simpan</button>
	<button class="btn btn-info btn-lg" name="reset" type="reset"> <i class="fa fa-times"></i> Reset</button>
   <button class="btn btn-primary btn-lg" name="back" type="button" onclick="javascript:history.back()"><i class="fa fa-backward"></i><span ></span> Kembali</button>

   </div>
</div>

<?php echo form_close(); ?>