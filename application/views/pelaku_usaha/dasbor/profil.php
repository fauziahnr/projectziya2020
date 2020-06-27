<style type="text/css" media="screen">
                  .fileUpload {
                    position: relative;
                    overflow: hidden;
                    margin: 10px;
                  }
                  .fileUpload input.upload {
                    position: absolute;
                    top: 0;
                    right: 0;
                    margin: 0;
                    padding: 0;
                    font-size: 20px;
                    cursor: pointer;
                    opacity: 0;
                    filter: alpha(opacity=0);
                  }
                  .vid.xob{
                    padding: 10px;
                    overflow: auto;
                    border: 1px solid #8080FF;
                    background-color: #BABABC;
                    box-shadow: 0 1px 6px 0 rgba(0,0,0,0.12), 0 1px 6px 0 rgba(0,0,0,0.12);
                  }
                  .gbr-tengah{
                    max-width: 100%;
                    height: 200px;
                    width: 200px;
                  }
                  .bdn_panel {
                    width: 100%;
                    padding: 10px 17px;
                    display: inline-block;
                    background: #fff;
                    border: 3px solid #E6E9ED;
                    -webkit-column-break-inside: avoid;
                    -moz-column-break-inside: avoid;
                    column-break-inside: avoid;
                    opacity: 1;
                    transition: all .2s ease;
                  }
                </style>
<div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-warning" style="background-color: #dde4f0">
          <div class="box-body box-profile"> 
            <div class=" widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header" style="background-color: #dde4f0;">

              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url('assets/upload/image/'.$pelapak->foto_profil) ?>" alt="User Avatar">
              </div>
            </div>
            <br>
            <div class="box"> </div>
            <?php echo form_open_multipart('pelaku_usaha/dasbor/change_foto/'.$pelapak->id_pelapak) ?>

            <div class="form-group text-center">
              <div class="text-center">
                      <div class="fileUpload btn btn-round btn-sm btn-info">
                        <!-- <input type="file" name="foto_profil" class="form-control"> -->
                        <input type="file" class="upload" id="foto_profil" name="foto_profil"/><label class="custom-file-label" for="foto_profil">Pilih file</label>
                      </div>
                    </div>
              <!-- <input type="file" class="upload" id="image" name="image"><label class="custom-file-label" for="image">Choose file</label> -->
            </div>
            <button type="submit" class="btn btn-success bg-red btn-block">Ubah</button>
            <?php echo form_close(); ?>
            </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9" style="background-color: #dde4f0; width: 73%" >
        <!-- <div class="box box-warning" > -->
          <div class="box-header" >
            <h2 class="box-title" >Profil Saya</h2><br>
          </div>


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
            echo form_open(base_url('pelaku_usaha/dasbor/profil'), 'class="leave-comment"'); ?>

            <div class="box-body">
                            <div class="form-group">
                <label for="nama_pelapak">Nama</label>
                <input type="text" name="nama_pelapak" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelapak->nama_pelapak?>" >
                              </div>

              <div class="form-group">
                <label for="email_pelapak">Email</label>
                <input type="email" name="email_pelapak" class="form-control" placeholder="Email" value="<?php echo $pelapak->email_pelapak ?>" readonly>
                </div>

                <div class="form-group">
                <label for="password"><strong>Password</strong></label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
              <span class="text-danger">**Ketik minimal 6 karakter untuk mengganti password baru atau biarkan kosong</span>               <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
              </div>

              <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="number" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelapak->telepon ?>" >
              </div>

              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $pelapak->alamat ?>" >
              </div>
              <button name="Submit" type="submit" class="btn bg-olive"> Update Profile</button>
            </div>
            <?php echo form_close(); ?>
          <!-- </form> -->

          <!-- <div class="ln_solid"></div>
          <form action="http://localhost/lion/advisor/advisor/change_password/10" method="post" role="form">
            <div class="box-body">
                            <div class="form-group">
                <label for="old_password"><strong>Password</strong></label>
                <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Masukkan Password (Jika anda ingin merubah password)">                <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
              <!-- </div>

              <div class="form-group">
                <label for="new_password"><strong>Password Baru</strong></label>
                <input type="password" id="new_password" name="new_password" placeholder="Masukkan Password (Jika anda ingin merubah password)" class="form-control">                <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
            <!--   </div>

              <div class="form-group">
                <label for="new_password_confirm"><strong>Konfirmasi Password Baru</strong></label>
                <input type="password" id="new_password_confirm" name="new_password_confirm" placeholder="Masukkan Password (Jika anda ingin merubah password)" class="form-control" >                <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
              <!-- </div> --> 
              <!-- <button type="submit" class="btn bg-olive"> Change Password</button>
            </div>
          </form> -->

          <br>
        </div>
      </div>
    </div>
    <!-- Info boxes -->
  </section><!-- /.content -->
