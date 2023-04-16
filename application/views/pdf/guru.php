<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/pdf.css" />
<h1 style="text-align: center;">DATA GURU</h1>
<table style="width: 1000px;padding-left: 90px">
	<thead>
		<tr>
			<th style="text-align: center; width: 3%;">No</th>
		    <th style="text-align: center; width: 18%;">Nama</th>
		    <th style="text-align: center; width: 7%;">Mata Pelajaran</th> 
		    <th style="text-align: center; width: 7%;">Alamat</th> 
		    <th style="text-align: center; width: 7%;">No HP</th> 
		    <th style="text-align: center; width: 7%;">Foto</th> 
 
 
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
             $tmpsisa	= $no % 11;
		?>
		<tr>
			<td style="text-align: center;"><?=$no?></td>
			<td style="text-align: center;"><?=$value->nama?></td>
			<td style="text-align: center;"><?=$value->mata_pelajaran?></td>
			<td style="text-align: center;"><?=$value->alamat?></td>
			<td style="text-align: center;"><?=$value->no_hp?></td>
			<td style="text-align: center;"><img src="<?=$foto?>" style="width: 75px ; height: 75px;"></td>
		</tr>

		<?php 
		
		if($tmpsisa == 0){
		$halaman++;
		?>
		<tr>
			<td  style="border-left: hidden;border-right: hidden;border-bottom: hidden;" colspan="6">Halaman  <?=$halaman?></td>
		</tr>
		<?php } 
		
		?>
		<?php } ?>

		<tr>
			<td  style="border-left: hidden;border-right: hidden;border-bottom: hidden;"colspan="6">Halaman  <?=$halaman + 1?></td>
		</tr>

	</tbody>
</table>
