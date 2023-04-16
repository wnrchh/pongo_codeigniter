<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/pdf.css" />

<style type="text/css">
	
	.lakilaki{

		background-color: #d6f5d6;
	}

	.perempuan{

		background-color: #ffcce0;
	}
	
</style>

<h1 style="text-align: center;">DATA SISWA</h1>
<table style="width: 1000px; padding: 25px;">
	<thead>
		<tr>
			<th style="text-align: center; width: 3%;">No</th>
		    <th style="text-align: center; width: 18%;">Nama</th>
		    <th style="text-align: center; width: 7%;">Jenis Kelamin</th> 
	        <th style="text-align: center; width: 7%;">NIS</th> 
	        <th style="text-align: center; width: 25%;">Kelas</th>   
	        <th style="text-align: center; width: 25%;">Foto</th> 
 
		</tr>
	</thead>
	<tbody>
		<?php
			$no = 0;
			$halaman = 0;
			foreach ($query as $key => $value) {
			$no++;

			 $obj 		= json_decode($value->foto);
             $foto 		= $obj['0']->{'file_thumbnail'};
             $tmpsisa	= $no % 10;

             $tampilwarna = ($value->jenis_kelamin == 'L') ? 'lakilaki' : 'perempuan';
		?>
		<tr class="<?=$tampilwarna?>">
			<td style="text-align: center;"><?=$no?></td>
			<td style="text-align: center;"><?=$value->nama?></td>
			<td style="text-align: center;"><?=$value->jenis_kelamin?></td>
			<td style="text-align: center;"><?=$value->nis?></td>
			<td style="text-align: center;"><?=$value->kelas?></td>
			<td style="text-align: center;"><img src="<?=$foto?>" style="width: 75px ; height: auto;"></td>
		</tr>

		<?php 
		
		if($tmpsisa == 0){
		$halaman++;
		?>
		<tr>
			<td  style="border-left: hidden;border-right: hidden;border-bottom: hidden;"colspan="6">Halaman  <?=$halaman?></td>
		</tr>
		<?php } 
		
		?>
		<?php } ?>

		<tr>
			<td  style="border-left: hidden;border-right: hidden;border-bottom: hidden;"colspan="6">Halaman  <?=$halaman + 1?></td>
		</tr>

	</tbody>
</table>