``<?php 

//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//FORM OPEN
echo form_open(base_url('admin/rekening/edit/'.$rekening->id_rekening),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Bank</label>

  <div class="col-md-5">
    <input type="text" name="nama_bank" class="form-control"  placeholder="Nama bank" value="<?php echo $rekening->nama_bank ?>" required>
  </div>
</div>
 
<div class="form-group">
  <label class="col-md-2 control-label">Nomer Rekening</label>

  <div class="col-md-5">
    <input type="number" name="nomer_rekening" class="form-control"  placeholder="Nomer Rekening" value="<?php echo $rekening->nomer_rekening ?>" required>
  </div>
</div>

 
<div class="form-group">
  <label class="col-md-2 control-label">Nama Pemilik Rekening</label>

  <div class="col-md-5">
    <input type="text" name="nama_pemilik" class="form-control"  placeholder="Nama pemilik rekening" value="<?php echo $rekening->nama_pemilik ?>" required>
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
  	<button class="btn btn-success btn-lg" name="submit" type="submit"> <i class="fa fa-save"></i> Simpan</button>
	<button class="btn btn-info btn-lg" name="reset" type="reset"> <i class="fa fa-times"></i> Reset</button>
  <!-- <button class="btn btn-primary btn-lg" name="reset" type="reset"> <i class="fa fa-backward"></i> Kembali</button> -->
   <button class="btn btn-primary btn-lg" name="back" type="button" onclick="javascript:history.back()"><i class="fa fa-backward"></i><span ></span> Kembali</button>

   </div>
</div>

<?php echo form_close(); ?>