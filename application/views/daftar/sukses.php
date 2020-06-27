 <!-- Fitur Gabung -->
	<section class="bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Gabung item -->
			<div class="pos-relative">
				<div class="bgwhite">
					<h1><?php echo $title ?></h1>
					<div class="clearfix"></div>
					<br><br>
					<?php if($this->session->flashdata('sukses'))
					{
						echo '<div class="alert alert-warning">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
							
					} ?>

					<!--Setelah regis bisa Verifikasi akun masuk ke email-->
					<p class="alert alert-success">Silahkan cek Email Anda untuk verifikasi akun. Masuk ke Email <a href="https://accounts.google.com/ServiceLogin?service=mail" class="btn btn-info btn-sm"> Verifikasi</a>.

				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
						
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
				
				</div>
			</div>

		
		</div>
	</section>

