 <!-- Gabung -->
	<section class="bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Gabung item -->
			<div class="pos-relative">
				<div class="bgwhite">
					<!-- <h1><?php echo $title ?></h1> -->
					<h1>Gabung</h1>
					<div class="clearfix"></div>
					<br><br>
					<?php if($this->session->flashdata('sukses'))
					{
						echo '<div class="alert alert-warning">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
							
					} ?>

				<p class="alert alert-success"> Terimakasih, permintaan Gabung Mitra dengan pelaku usaha akan segera kami proses. Silahkan lihat pada Riwayat Gabung Mitra</p>
					
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

