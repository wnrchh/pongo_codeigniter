<!DOCTYPE html>
<html lang="en">
<head>
<title>Data</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/bootstrap/dist/css/bootstrap.min.css'; ?>"/>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/font-awesome/css/font-awesome.min.css'; ?>"/>

</head>
<body onload="print();">


  <!-- Services -->
  <div class="w3-container" id="services" style="margin-top:75px">

    

<table class="table table-bordered text-center table-striped table-hover table-responsive">
	<tr class="success">
		<th>NO</th>
		<th>NAMA</th>
		<th>JENIS KELAMIN</th>
		<th>VEGETARIAN</th>
		<th>NIS</th>
		<th>TEMPAT LAHIR</th>
		<th>TANGGAL LAHIR</th>
		<th>ALAMAT</th>
		<th>KELAS</th>


	</tr>
<?php
$no=0;
foreach ($data_siswa as $key => $value) {
$no++;
 
?>

	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $value->nama; ?></td>
		<td><?php echo $value->jenis_kelamin; ?></td>
		<td><?php echo $value->vegetarian; ?></td>
		<td><?php echo $value->nis; ?></td>
		<td><?php echo $value->tempat_lahir; ?></td>
		<td><?php echo date('jS F Y', strtotime($value->tanggal_lahir)); ?></td>
		<td><?php echo $value->alamat; ?></td>
		<td><?php echo $value->kelas; ?></td>

	</tr>
	
	<?php 
		}
	?>

</table>


  </div>
  




</body>
</html>
