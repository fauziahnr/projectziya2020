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
      echo form_open(base_url('admin/profil'), 'class="leave-comment"'); ?>

      <table class="table">
        <thead>
          <tr>
            <th width="10%">Nama</th>
            <th>
              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $user->nama?>" required></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Email</td>
            <td>
              <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" readonly>
            </td>
          </tr>
          <tr>
            <td>Username</td>
            <td>
              <input type="username" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" required>
            </td>
          </tr>
          <tr>
            <td>Password</td>
            <td>
              <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
              <span class="text-danger">Ketik minimal 6 karakter untuk mengganti password baru atau biarkan kosong</span>
            </td>
          </tr>

          <tr>
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