<div class="breadcrumb">
	<a href="">Home</a> 
	<a href="">Nilai Form</a>
</div>

<style type="text/css">
	table,td,th{border: 1px solid black; text-align: center; padding: 10px}


</style>

<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Nilai Form</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="content-box">
					<form id="form-action">
						<input type="text" name="id" class="hidden">
						<div class="form-group">
							<label for="">Nama</label>
							<select name="siswa_id" class="form-control select2">

<?php 
foreach ($siswa as $key => $value) {?>
	

						<option value="<?=$value->id?>"><?=$value->nama?></option>	

						
<?php
}
?>
						    </select>
						</div>

						<table class="table table-bordered">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Nilai Angka</th>
								<th>Nilai Huruf</th>
								<th>Keterangan</th>
							</tr>
								</thead>
								<tbody>

<?php 
$no = 0;
foreach ($mata_pelajaran as $key => $value) {

$no++;
 ?>

									<tr>
										<td><?=$no?></td>
										<td><input class="form-control" name="mata_pelajaran_id[]" type="hidden" value="<?=$value->id?>"> <?=$value->mata_pelajaran?></td>
										<td><input class="form-control" onkeyup="hitung_nilai(this.value, '<?=$value->id?>'); hitung_keterangan(this.value, '<?=$value->id?>');" name="nilai_angka_<?=$value->id?>" placeholder="Nilai Angka" type="number"></td>
										<td><select class="form-control" id="tampil_nilai_<?=$value->id?>" name="nilai_huruf_<?=$value->id?>" placeholder="Nilai Huruf" type="text"></select></td>
										<td><select class="form-control" id="tampil_keterangan_<?=$value->id?>" name="keterangan_<?=$value->id?>" placeholder="Keterangan" type="text"></select></td>

									</tr>

								<?php } ?>

								</tbody>
							
						</table>

					</form>
					<div class="content-box-footer">
						<button type="button" class="btn btn-primary action" title="cancel" onclick="form_routes('cancel')">Cancel</button>
						<button type="button" class="btn btn-primary action" title="save" onclick="form_routes('save')">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	var onLoad = (function() {
		var index = "<?php echo $index; ?>";
		
		if (index != '') {
			datagrid.formLoad('#form-action', index);
		}

		$('.loading-panel').hide();
		$('.form-panel').show();
	})();

	function validate(formData) {
		var returnData;
		$('#form-action').disable([".action"]);
		$("button[title='save']").html("Validating data, please wait...");
		$.ajax({
	        url: "<?php echo base_url() . 'nilai/validate'; ?>", async: false, type: 'POST', data: formData,
	        success: function(data, textStatus, jqXHR) {
				returnData = data;
	        }
	    });

		$('#form-action').enable([".action"]);
		$("button[title='save']").html("Save changes");
        if (returnData != 'success') {
        	$('#form-action').enable([".action"]);
			$("button[title='save']").html("Save changes");
            $('.validation-message').html('');
            $('.validation-message').each(function() {
                for (var key in returnData) {
                    if ($(this).attr('data-field') == key) {
                        $(this).html(returnData[key]);
                    }
                }
            });
        } else {
		    return 'success';	
        }
	}

	function save(formData) {
		$("button[title='save']").html("Saving data, please wait...");
		$.post("<?php echo base_url() . 'nilai/action'; ?>", formData).done(function(data) {
        	$('.datagrid-panel').fadeIn();
			$('.form-panel').fadeOut();
			datagrid.reload();
        });
	}

	function cancel() {
		$('.datagrid-panel').fadeIn();
		$('.form-panel').fadeOut();
	}

	function form_routes(action) {
		if (action == 'save') {
			var formData = $('#form-action').serialize();
			if (validate(formData) == 'success') {
				swal({   
					title: "Please check your data",   
					text: "Saved data can not be restored",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					cancelButtonText: "Cancel",
					confirmButtonText: "Save",
					closeOnConfirm: true 
				}, function() {
					save(formData);
				});
			}
		} else {
			cancel();
		}
	}

</script>

<script type="text/javascript">
  $(".select2").select2();
</script>

<script type="text/javascript">
	function hitung_nilai(nilai_angka,lokasi_nilai) {


	$.post("<?php echo base_url() . 'nilai/rumus_nilai'; ?>", {nilai_angka : nilai_angka}).done(function(data) {

$('#tampil_nilai_'+lokasi_nilai).html(data);
	}
	);

}
	function hitung_keterangan(nilai_angka,lokasi_nilai) {


	$.post("<?php echo base_url() . 'nilai/rumus_keterangan'; ?>", {nilai_angka : nilai_angka}).done(function(data) {

$('#tampil_keterangan_'+lokasi_nilai).html(data);
	}
	);

}


</script>