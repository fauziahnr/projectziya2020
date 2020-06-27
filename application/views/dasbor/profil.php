<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
			<?php include('menu.php') ?>
			</div>
		</div>


		<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">	
			<!-- Header Profil Female -->
			<div class="container">
				<div class="d-flex justify-content-start align-items-center flex-row p-3">
					<img class="mr-3" src="<?php echo base_url() ?>assets/template/images/icons/user1-fp.png" alt="profile-pic" style="border-radius: 50%; object-fit: cover; box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 4px 0px;" width="68" height="68">
					<div class="d-flex flex-column">
						<h3><span class="font-size-m boldest"><?php echo $this->session->userdata('nama_pelanggan'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></h3>
						<span class="font-size-xs font-color-tertiary bold text-primary">Mitra Fe-Preneur</span>
					</div>
				</div>
			</div>

			
			<div class="container">
				<div class="card bg-light mb-3">
					<div class="card-body">
						<div class="background-white py-3 commission-card">
							<div class="rounded d-flex justify-content-start flex-row px-3">
								<div class="col-12 p-0 d-flex justify-content-between">
									<div class="col-11 p-0 d-flex">
										<img class="mr-3" src="<?php echo base_url() ?>assets/template/images/icons/dompet.png" alt="" width="40" height="40">
										<div class="d-flex flex-column">
											<h5><span class="font-size-xs bolder font-color-tertiary">Saldo Bonus Anda</span></h5> 
											<h4><strong><span class="font-size-l boldest">Rp. 0</span></strong></h4>
										</div>
									</div>

									<div class="col-1 p-0 align-self-start text-right">
										<img data-toggle="modal" data-target="#exampleModal" src="<?php echo base_url() ?>assets/template/images/icons/info.png" alt="" style="cursor: pointer;" width="65%">
									
										<!-- Modal -->
											<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<strong><h3 class="modal-title text-primary" id="exampleModalLabel">Syarat Pencairan Bonus</h3></strong> 
															<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button> -->
														</div>
														<div class="modal-body text-left">
															<p>Syarat dan ketentuan Pencairan Bonus Female Preneur :</p>
															<br>
															<p>1. Female Preneur <strong>wajib</strong>  melakukan verifikasi data diri dengan melampirkan foto KTP dan foto diri+KTP.</p> 
															<p>2. Proses pencairan akan dikenakan biaya untuk admin sebesar Rp 2.500.</p> 
														</div>

														<div class="modal-footer">
															<button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">TUTUP</button>
														</div>
													</div>
												</div>
											</div>
											<!-- Tutup Modal -->
									</div>
								</div>	
							</div>
							
							<br>
							<!-- Button Cairkan dan Riwayat -->
							<div class="row pt-3 no-gutters">
								<div class="col-12 pl-3 px-1">
									<button class="btn btn-outline-primary btn-lg btn-block cc-action btn d-flex align-items-center rounded w-100 rounded" data-toggle="modal" data-target="#exampleModal1">
										<img src="<?php echo base_url() ?>assets/template/images/icons/cairkan.png" alt="icon" height="15px">
										<span class="flex-grow-1 pl-1">Cairkan Bonus Yuk</span>
									</button>
								</div>

								<!-- RIWAYAT BONUS -->
								<!-- <div class="col-6 pl-3 px-1">
									<button class="btn btn-outline-primary cc-action btn d-flex align-items-center rounded w-100 rounded">
										<img src="<?php echo base_url() ?>assets/template/images/icons/history.png" alt="icon" height="15px">
										<span class="flex-grow-1 pl-1">Riwayat Bonus Saya</span>
									</button>
								</div> -->

								<!-- Modal untuk Cairkan Bonus Female -->
								<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<!-- <div class="modal-header">
											<img src="<?php echo base_url() ?>assets/template/images/icons/pusing.png" alt="icon" height="30px">
											</div> -->
											
											<div class="modal-body text-center">
												<img src="<?php echo base_url() ?>assets/template/images/icons/pusing.png" alt="icon" height="30px">
												<strong><p>Akun Kamu belum diverifikasi</p></strong>
												<br>
												<p>Jika Kamu ingin melakukan penarikan Bonus, Kamu harus melakukan verifikasi Akun terlebih dahulu.</p> 
											</div>

											<div class="modal-footer">
												<button type="button" class="btn btn-light btn-lg btn-block" data-dismiss="modal">BATAL</button>
												<!-- <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">VERIFIKASI</button> -->
												<a href="<?php echo base_url('dasbor/verifikasi_female') ?>" class="btn btn-primary btn-lg btn-block">VERIFIKASI</a>
											</div>
										</div>
									</div>
								</div>
								<!-- Tutup Modal Cairkan -->
							</div>
							<!-- tutup Button -->
						</div>
					</div>
				</div>
			</div>

				<br>
				<strong><p class="text-primary"><h2>Pengaturan Akun</h2></p></strong>
				<hr>
				<p class="text-primary"><h4><?php echo $title ?></h4></p>

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
			echo form_open(base_url('dasbor/profil'), 'class="leave-comment"'); ?>

			<table class="table">
				<thead>
					<tr>
						<th width="25%">Nama</th>
						<th>
							<input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan?>" ></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<!--disini email tdk bisa diubah krn pakai readonly-->
						<td>Email</td>
						<td>
							<input type="email" name="email_pelanggan" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email_pelanggan ?>" readonly>
						</td>
					</tr>
					<tr>
						<td>Password</td>
						<td>
							<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
							<span class="text-danger">*Untuk mengganti password baru Anda, ketik minimal 6 karakter atau biarkan kosong.</span>
						</td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>
							<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" >
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>
							<textarea name="alamat" class="form-control" placeholder="Alamat"> <?php echo $pelanggan->alamat ?></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<button class="btn btn-primary btn-lg" type="submit">
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

