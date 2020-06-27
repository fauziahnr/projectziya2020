<!-- Gabung Pelaku Usaha -->
<section class="bgwhite p-t-70 p-b-100">
	<div class="container">
		<!-- Gabung per item -->
		<div class="pos-relative">
			<div class="bgwhite">
				<!-- <h1><?php echo $title ?></h1> -->
				<h1>Registrasi Female Preneur</h1>
				<div class="clearfix"></div>
				<br>
				<?php if($this->session->flashdata('sukses'))
				{
					echo '<div class="alert alert-warning">';
					echo $this->session->flashdata('sukses');
					echo '</div>';

				} ?>

				<p class="alert alert-success">Sudah memiliki akun? Silahkan <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm"> Login di sini</a></p>

				<!-- <div class="col-md-12">
					<?php echo validation_errors('<div class="alert alert-warning">','</div>');?>
				</div> -->
				<form action="<?php echo base_url('registrasi'); ?>" method="post">
					<table class="table">
						<thead>
							<tr>
								<th width="25%">Nama</th>
								<th>
									<input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama_pelanggan') ?>"></th>
							</tr>
						</thead>
							<tbody>
								<tr>
									<td>Email</td>
									<td>
										<input type="email" name="email_pelanggan" class="form-control" placeholder="Email" value="<?php echo set_value('email_pelanggan') ?>">
									</td>
								</tr>
								<tr>
									<td>Password</td>
									<td>
										<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
									</td>
								</tr>

								<tr>
									<td>Alamat</td>
									<td>
										<div class="row">
											<div class="col">
												<label>Kota/Kabupaten</label><br>
												<select name="kota" id="kota" class="form-control form-control-sm">
													<option value="0">Pilih Kota/Kabupaten</option>
													<?php foreach($data->result() as $row):?>
														<option value="<?php echo $row->kota_id;?>"><?php echo $row->kota_nama;?></option>
													<?php endforeach;?>
												</select>
											</div>
											<div class="col"> 
												<label>Kecamatan</label><br>
												<select name="kecamatan" id="kecamatan" class="kecamatan form-control form-control-sm">
													<option value="0">Pilih Kecamatan</option>
												</select>
											</div>
										</div>
										<br>
										<textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<button class="btn btn-success btn-lg" type="submit" name="Submit">
											<i class="fa fa-save"></i> Daftar
										</button>
										<button class="btn btn-default btn-lg" type="reset">
											<i class="fa fa-times"></i> Reset
										</button>

									</td>
								</tr>

							</tbody>
						</table>
					</form>

				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript" src="<?php echo base_url() ?>assets/template/vendor/jquery/jquery-2.2.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#kota').change(function(){
				var id=$(this).val();
				$.ajax({
					url : "<?php echo base_url();?>registrasi/get_kecamatan",
					method : "POST",
					data : {id: id},
					async : false,
					dataType : 'json',
					success: function(data){
						var html = '';
						var i;
						for(i=0; i<data.length; i++){
							html += '<option value='+data[i].kecamatan_id+'>'+data[i].kecamatan_nama+'</option>';
						}
						$('.kecamatan').html(html);
					}
				});
			});
		});
	</script>


<!-- 	<script type="text/javascript">
        $(document).ready(function(){
            $('#kota').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo base_url();?>registrasi/get_kecamatan",
                    method : "POST",
                    data : {id: id},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].kecamatan_id+'>'+data[i].kecamatan_nama+'</option>';
                        }
                        $('#kecamatan').html(html);
                    }
                });
                return true;
            }); 
             
        });
    </script> -->