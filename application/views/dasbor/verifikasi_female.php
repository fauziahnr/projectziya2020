<?php 
// Notifikasi
if($this->session->flashdata('sukses'))
{
	echo '<div class="alert alert-warning">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
		
} 

// Error upload
if(isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

//Notifikasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

//FORM OPEN
echo form_open_multipart(base_url('dasbor/verifikasi_female'),' class="form-horizontal"');
?>

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
			<p class="text-primary"><h2><?php echo $title ?></h2></p>
				<hr>

			
			<div class="container">
				<div class="card bg-light mb-3">
					<div class="card-body">
							<!-- <div class="rounded d-flex justify-content-start flex-row px-3"> -->
								<!-- <div class="col-12 p-0 d-flex justify-content-between"> -->
									<div class="row shadow m-0 py-3">
										<div class="col">
											<img class="img-fluid" src="<?php echo base_url() ?>assets/template/images/icons/ktp-benar.jpg" height="15px">
											<p class="text-center m-0 bolder">Benar</p>
										</div>

										<div class="col">
											<img class="img-fluid" src="<?php echo base_url() ?>assets/template/images/icons/ktp-salah.jpg" height="15px">
											<p class="text-center m-0 bolder">Salah</p>
										</div>
									</div>

									<div class="row mx-0 mt-3 pb-5">
										<p class="bolder">Ketentuan :</p>
										<ul class="pl-3 font-size-xs line-height-4 text-justify">
											<li>
												<p>1. Tanda pengenal harus penuh seperti yang dicontohkan gambar sebelah kiri.</p>
											</li>
											<li>
												<p>2. Tanda pengenal yang digunakan harus asli dan bukan hasil scan/fotokopi.</p>
											</li>
										</ul>
									</div>
							<!-- </div> -->

									<div id="fixed-width" class="fixed-card-bottom">
										<div class="container background-white py-2">
											<div class="d-flex align-items-center border py-2 rounded">
												<div class="col-2">
													<img class="img-fluid" src="<?php echo base_url() ?>assets/template/images/icons/info.png"" alt="">
												</div>
												<div class="col-10 font-size-xxs pl-0 text-justify font-color-tertiary">
													Dokumen ini diperlukan untuk verifikasi data.
												</div>
											</div>

											<br>
											
											<input type="file" name="gambar" class="form-control" placeholder="Upload KTP" required="required">
											<div class="btn btn-primary btn-lg btn-block">
												<button class="btn btn-block buy-now text-white bolder background-color-primary" name="submit" type="submit">Upload KTP</button>
											</div>
										</div>
									</div>
					</div>


									<!-- <div class="col-1 p-0 align-self-start text-right">
										<img data-toggle="modal" data-target="#exampleModal" src="<?php echo base_url() ?>assets/template/images/icons/info.png" alt="" style="cursor: pointer;" width="65%">
											<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<strong><h3 class="modal-title text-primary" id="exampleModalLabel">Syarat Pencairan Bonus</h3></strong> 
															
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
											
									</div> -->
								<!-- </div> -->
			
							<br>
							<!-- Button Cairkan dan Riwayat -->
							<div class="row pt-3 no-gutters">
								<div class="col-6 pl-3 px-1">
									<!-- <button class="btn btn-outline-primary cc-action btn d-flex align-items-center rounded w-100 rounded" data-toggle="modal" data-target="#exampleModal1">
										<img src="<?php echo base_url() ?>assets/template/images/icons/cairkan.png" alt="icon" height="15px">
										<span class="flex-grow-1 pl-1">Cairkan Bonus Yuk</span>
									</button> -->
								</div>

								<div class="col-6 pl-3 px-1">
									<!-- <button class="btn btn-outline-primary cc-action btn d-flex align-items-center rounded w-100 rounded">
										<img src="<?php echo base_url() ?>assets/template/images/icons/history.png" alt="icon" height="15px">
										<span class="flex-grow-1 pl-1">Riwayat Bonus Saya</span>
									</button> -->
								</div>

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
												<a href="<?php echo base_url('dasbor/verifikasi') ?>" class="btn btn-primary btn-lg btn-block">VERIFIKASI</a>
											</div>
										</div>
									</div>
								</div>
								<!-- Tutup Modal Cairkan -->
							</div>
							<!-- tutup Button -->
						
					
				</div>
			</div>

					

		<?php echo form_close(); ?>	
		</div>
	</div>
</div>
</section>

