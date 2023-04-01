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
		<th style="width: 100px; text-align: center;">NO</th>
		<th style="width: 250px; text-align: center;">NAMA</th>
		<th style="width: 100px; text-align: center;"> NO HP</th>
		<th style="width: 250px; text-align: center;">ALAMAT</th>
		<th style="width: 150px; text-align: center;">MATA PELAJARAN</th>
		
	


	</tr>
<?php
$no=0;
foreach ($data_guru as $key => $value) {
$no++;
 
?>

	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $value->nama; ?></td>
		<td><?php echo $value->no_hp; ?></td>
		<td><?php echo $value->alamat; ?></td>
		<td><?php echo $value->mata_pelajaran; ?></td>

	</tr>
	
	<?php 
		}
	?>

</table>


  </div>
  




</body>
</html>
