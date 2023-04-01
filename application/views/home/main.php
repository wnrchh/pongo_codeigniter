<div class="wrapper">
	<div class="top-content">
		<nav class="main-nav">
			<div class="container">
				<div class="logo">
					<img style="width: 300px ; height: auto; " src="<?php echo base_url() . 'assets/images/logoo1.png'; ?>">
				</div>
				<div class="menu">
					<ul class="simple-menu">
						<li class="active"><a  style="color: white" href="javascript:;" data-link="body">Home</a></li>
						<li><a style="color: white" href="javascript:;" data-link=".visi">Visi</a></li>
						<li><a style="color: white" href="javascript:;" data-link=".misi">Misi</a></li>
						<li><a style="color: white" href="javascript:;" data-link=".tingkat">Tingkat</a></li>
						<li><a style="color: white" href="javascript:;" data-link=".gallery">Gallery</a></li>
						<li><a style="color: white" href="javascript:;" data-link=".berita">Berita</a></li>
						<li><a style="color: white" href="javascript:;" data-link=".footer-wrapper">Hubungi Kami</a></li>
					</ul>
					<ul class="rounded-menu">
						<li><a href="<?=base_url()?>auth/login">Login</a></li>
					</ul>
				</div>
				<div class="mobile-nav">
					<i class="fa fa-bars"></i>
				</div>
			</div>
		</nav>
		<div class="content">
			<div class="container">
				<div class="main-text">
					
				</div>
<?php foreach ($data_slide as $key => $value) { 

					if(strlen($value->foto) > 10){
                        $obj = json_decode($value->foto);
                        $foto = $obj['0']->{'file_thumbnail'};
                    }else{
                        $foto = base_url().'assets/images/default.jpg';                   
                    }

					?>
				<div class="image-preview">
					<div class="image-list"><img style="width: 400px ; height: auto" alt="pongo" src="<?=$foto?>"></div>
					
				</div>

<?php } ?>

			</div>
		</div>
	</div>
	<div class="demo-wrapper visi">
		<div class="container">
			<div class="title">Visi</div>
			<div class="subtitle"><?=$data_visi->judul?></div><br>
			<div class="col-md-12">
				<div class="content">
					<div style="font-size: 20px ; text-align: justify">
						
						<?=$data_visi->keterangan?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="feature-wrapper misi">
		<div class="container">
			<div style="text-align: center;" class="title">Misi</div><br>
			<div style="text-align: center; color: white" ><?=$data_misi->judul1?></div><br>
			<div style="text-align: center; color: white" ><?=$data_misi->judul2?></div><br><br>
			<div class="col-md-12">
				<div class="content">
					<div style="font-size: 20px ; color: white;text-align: justify;"><?=$data_misi->keterangan?></div>
				</div>
			</div>
		</div>
	</div><br><br><br>
	<div class="demo-wrapper tingkat">
		<div class="container">
			<div class="title">Tingkat</div>
			<br>
			<div class="row">
<?php foreach ($data_tingkat as $key => $value) { 

					if(strlen($value->foto) > 10){
                        $obj = json_decode($value->foto);
                        $foto = $obj['0']->{'file_thumbnail'};
                    }else{
                        $foto = base_url().'assets/images/default.jpg';                   
                    }

					?> 

			
			<div class="col-md-2">
				<div><img alt="pongo" src="<?=$foto?>">
					<br><div style="font-size: 20px ; text-align: center; color: #607EAA"><?=$value->nama?></div></div>
			</div>
			
		

<?php } ?>

</div>
		</div>
	</div>

<br><br><br>



	<div class="action-wrapper gallery">
		<div class="container">
			<div class="title">Gallery</div><br>
			<div class="col-md-12 testimonial-list">
				<div class="row">

<?php foreach ($data_gallery as $key => $value) { 

					if(strlen($value->foto) > 10){
                        $obj = json_decode($value->foto);
                        $foto = $obj['0']->{'file_thumbnail'};
                    }else{
                        $foto = base_url().'assets/images/default.jpg';                   
                    }

					?>

					<div class="col-md-3">
						<div>
							<div class="by">
								<img style="width: 100%;height: 200px" src="<?=$foto?>">
							</div>
						</div>
					</div>

<?php } ?>

				</div>
			</div>
		</div>
	</div>
	<div class="testimonial-wrapper">
		<div class="container">
			<div class="title berita">Berita</div>
			<div class="col-md-12 testimonial-list">
				<div class="row">

 <?php  foreach ($data_berita as $key => $value){

					if(strlen($value->foto) > 10){
                        $obj = json_decode($value->foto);
                        $foto = $obj['0']->{'file_thumbnail'};
                    }else{
                        $foto = base_url().'assets/images/default.jpg';                   
                    }






?>					
					<div class="col-md-3">
						<div>
							<div class="by">
								<img style="width: 100%;height: 200px" src="<?=$foto?>">
							</div>
						</div>
						<div class="content">
							<br>
							<div class="title" style="font-size: 18px; color: #607EAA; text-align: left;"><?=$value->judul?></div>
							<br><br>
					<div style="font-size: 16px ; color: #607EAA; text-align: justify;"><?=$value->keterangan?></div>

				</div>
					</div>


					<?php } ?>
				</div>
			</div>
		</div>
	</div>





	<div class="footer-wrapper">
		<div class="container">
			<div style="text-align: center; font-size: 35px">Hubungi Kami</div>
			<div class="row">
				<div class="col-md-4 footer-box">
					<div style="font-size: 20px; text-align: justify;"><?=$data_yayasan->kontak?></div><br>
				</div>
				<div class="col-md-4 footer-box">
					<div class="sub-content">
						<div style="font-size: 18px"><?=$data_sekolah->kbtk?></div><br>
						
					</div>
					<div class="sub-content">
						<div style="font-size: 18px"><?=$data_sekolah->sd?></div><br>
					</div>
					<div class="sub-content">
						<div style="font-size: 18px"><?=$data_sekolah->smp?></div><br>
					</div>
				</div>
				<div class="col-md-4 footer-box">
					<div class="sub-content">
						<div style="font-size: 18px"><?=$data_sekolah->sma?></div><br>
					</div>
					<div class="sub-content">
						<div style="font-size: 18px"><?=$data_sekolah->smk?></div><br>
					</div>
				</div>
				<div class="col-md-12 copyright">© copyright 2019. Sekolah Maitreyawira. All rights reserved.</div>
			</div>
		</div>
	</div>
</div>
<div class="move-top">
	<i class="fa fa-chevron-up"></i>
</div>