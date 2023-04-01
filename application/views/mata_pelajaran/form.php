<div class="breadcrumb">
	<a href="">Home</a> 
	<a href="">Mata Pelajaran Form</a>
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Mata Pelajaran Form</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="content-box">
					<form id="form-action">
						<input type="text" name="id" class="hidden">


						<div class="form-group">
							<label for=""> Mata Pelajaran</label>
							<select name="mata_pelajaran" class="form-control">

						<option value="bahasa_inggris">Bahasa Inggris</option>
						<option value="bahasa_indonesia">Bahasa Indonesia</option>
						<option value="ipa">IPA</option>
						<option value="matematika">Matematika</option>
						<option value="seni_budaya">Seni Budaya</option>
			
							</select>
							<div class="validation-message" data-field="mata_pelajaran"></div>
						</div>


						<div class="form-group">
							<label for=""> Guru</label>
							<select name="guru" class="form-control">

<?php 
foreach ($data_guru as $key => $value) {?>
	

						<option value="<?=$value->nama?>"><?=$value->nama?></option>	

						
<?php
}
?>
						    </select>
						</div>

						<div class="form-group">
							<label for=""> Guru2</label>
							<select name="guru2" class="form-control">

<?php 
foreach ($data_guru as $key => $value) {?>
	

						<option value="<?=$value->nama?>"><?=$value->nama?></option>	

						
<?php
}
?>
						    </select>
						</div>

						
						
						
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
	        url: "<?php echo base_url() . 'mata_pelajaran/validate'; ?>", async: false, type: 'POST', data: formData,
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
		$.post("<?php echo base_url() . 'mata_pelajaran/action'; ?>", formData).done(function(data) {
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