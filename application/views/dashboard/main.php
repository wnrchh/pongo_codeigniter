<div class="breadcrumb">
	<a href="">Home</a> 
</div>
<div class="top-banner">
	<div class="top-banner-title">Dashboard</div>
	<div class="top-banner-subtitle">Welcome back, <?php echo $active_user->name; ?>, <i class="fa fa-map-marker"></i> New York City</div>
</div>
<div class="content with-top-banner">
	<div class="content-header no-mg-top">
		<i class="fa fa-newspaper-o"></i>
		<div class="content-header-title">Author Earnings</div>
		
	</div>
	<div class="panel">
		<div class="row">
			<div class="col-md-4 card-wrapper">
				<div class="card">
					<i class="fa fa-user"></i>
					<div class="clear">
						<div class="card-title">
							<span class="timer" data-from="0" data-to="<?=$total_siswa?>"><?=$total_siswa?></span>
						</div>
						<div class="card-subtitle">Siswa</div>
					</div>
				</div>
				
			</div>
			<div class="col-md-4 card-wrapper">
				<div class="card">
					<i class="fa fa-user"></i>
					<div class="clear">
						<div class="card-title">
							<span class="timer" data-from="0" data-to="<?=$total_guru?>"><?=$total_guru?></span>
						</div>
						<div class="card-subtitle">Guru</div>
					</div>
				</div>
				
			</div>
			<div class="col-md-4 card-wrapper">
				<div class="card">
					<i class="fa fa-user"></i>
					<div class="clear">
						<div class="card-title">
							<span class="timer" data-from="0" data-to="<?=$total_karyawan?>"><?=$total_karyawan?></span>
							
						</div>
						<div class="card-subtitle">Karyawan</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="panel">
		<div class="row">
			<div class="col-md-8 sm-max">
				<div class="content-header">
					<i class="fa fa-signal"></i>
					<div class="content-header-title">Siswa</div>
				</div>
				<div class="content-box">
					<div class="line-chart-wrapper">
						<div class="line-chart-label">Jumlah Siswa</div>
						<div class="line-chart-value">
							<span class="timer" data-from="0" data-to="<?=$total_siswa?>"><?=$total_siswa?></span>
						</div>
						<canvas id="line-chart"></canvas>
					</div>
				</div>
			</div>

			<div class="col-md-4 sm-max">
				<div class="content-header">
					<i class="fa fa-suitcase"></i>
					<div class="content-header-title">Siswa</div>
					
				</div>
				<div class="content-box slide-item">

					<?php foreach ($data_siswa as $key => $value) { 

					if(strlen($value->foto) > 10){
                        $obj = json_decode($value->foto);
                        $foto = $obj['0']->{'file_thumbnail'};
                    }else{
                        $foto = base_url().'assets/images/default.jpg';                   
                    }

					?>

					<div class="product-list">
						<img alt="pongo" class="pull-left" src="<?=$foto?>">
						<div class="clear">
							<div class="product-list-title"><?=$value->nama?></div>
							<div class="product-list-category"><?=$value->nis?></div>
						</div>
						
					</div>

				<?php } ?>
					

				</div>

				<div class="content-header">
					<i class="fa fa-suitcase"></i>
					<div class="content-header-title">Guru</div>
					
				</div>

				<div class="content-box slide-item">

					<?php foreach ($data_guru as $key => $value) { 

					if(strlen($value->foto) > 10){
                        $obj = json_decode($value->foto);
                        $foto = $obj['0']->{'file_thumbnail'};
                    }else{
                        $foto = base_url().'assets/images/default_guru.jpg';                   
                    }

					?>

					<div class="product-list">
						<img alt="pongo" class="pull-left" src="<?=$foto?>">
						<div class="clear">
							<div class="product-list-title"><?=$value->nama?></div>
							<div class="product-list-category"><?=$value->mata_pelajaran?></div>
						</div>
						
					</div>

				<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
	
</div>


<script type="text/javascript">
	


	// Line chart 
	if ($('#line-chart').length) {
		var lineChart = $("#line-chart");
		var lineData = {
			labels: ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"],
			datasets: [{
				label: "Jumlah Siswa",
				fill: false,
				lineTension: 0,
				backgroundColor: "#fff",
				borderColor: "#6896f9",
				borderCapStyle: 'butt',
				borderDash: [],
				borderDashOffset: 0.0,
				borderJoinStyle: 'miter',
				pointBorderColor: "#fff",
				pointBackgroundColor: "#2a2f37",
				pointBorderWidth: 3,
				pointHoverRadius: 10,
				pointHoverBackgroundColor: "#FC2055",
				pointHoverBorderColor: "#fff",
				pointHoverBorderWidth: 3,
				pointRadius:1,
				pointHitRadius: 2,
				data: ['<?=$total_siswa_I?>', '<?=$total_siswa_II?>', '<?=$total_siswa_III?>', '<?=$total_siswa_IV?>', '<?=$total_siswa_V?>', '<?=$total_siswa_VI?>', '<?=$total_siswa_VII?>','<?=$total_siswa_VIII?>','<?=$total_siswa_IX?>'],
				spanGaps: false
			}]
		};

		var myLineChart = new Chart(lineChart, {
			type: 'line',
			data: lineData,
			options: {
				legend: {
					display: false
				},
				scales: {
					xAxes: [{
						ticks: {
							fontSize: '11',
							fontColor: '#969da5'
						},
						gridLines: {
							color: 'rgba(0,0,0,0.05)',
							zeroLineColor: 'rgba(0,0,0,0.05)'
						}
					}],
					yAxes: [{
						display: false,
						ticks: {
							beginAtZero: true,
							max: <?=$total_siswa?>
						}
					}]
				}
			}
		});
	}

</script>