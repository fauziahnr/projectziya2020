<div>
 <a href="<?php echo base_url('pelaku_usaha/dasbor/profil') ?>" class="btn btn-primary btn-sm"> Lengkapi Profil Anda</a>
  
</div>
<div>
          <h1> Selamat datang, <i><strong><?php echo $this->session->userdata('nama_pelapak'); ?></strong></i> !</h1>
          
</div>

    <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Akun anda <?php echo $pelapak->bukti_bayar ?> melakukan pembayaran.</h3>
            
            </div>
           

            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>TANGGAL DAFTAR</th>
                    <th>STATUS GABUNG</th>
                    <th>FOTO BUKTI</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><?php echo $pelapak->nama_pelapak ?></td>
                    <td><?php echo $pelapak->email_pelapak ?></td>
                    <td><?php echo $pelapak->tanggal_daftar ?> </td>
                    <td><span class="label label-success"><?php echo $pelapak->bukti_bayar ?></span></td>
                    <td>
                      <img src="<?php echo base_url('assets/upload/image/'.$pelapak->foto_bukti) ?>" class="img img-thumbnail" width="50" >
                    </td>
                    <td>
                     <a href="<?php echo base_url('pelaku_usaha/dasbor/konfirmasi/'.$pelapak->id_pelapak) ?>" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Konfirmasi</a>
                     
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="row">
         <div class="col-md-6">
          <div class="box box-solid">
            <!--<div class="box-header with-border">
              <i class="fa fa-sticky-note"></i>

              <h3 class="box-title">Noted</h3>

               <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
              <blockquote>
                <p>Jika selama 30 hari <?php echo $this->session->userdata('nama_pelapak'); ?> tetap belum mengkonfirmasi bukti pembayaran terhitung dari <?php echo $pelapak->tanggal_daftar ?>, maka akun akan dinonaktifkan.</p>
                <p>Segera lakukan pembayaran sejumlah Rp.50.000 ke rekening Mandiri (No. Rekening: 982279573 a.n sebarweb) untuk mengaktifkan akun selama 1 tahun</p>
                <small>Admin Sebarweb </small>
              </blockquote>
            </div>-->
            
          </div>
          
        </div> 
        <!-- ./col -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->