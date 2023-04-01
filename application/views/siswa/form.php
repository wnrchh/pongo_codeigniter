<div class="breadcrumb">
	<a href="">Home</a> 
	<a href="">Siswa Form</a>
</div>
<div class="content">
	<div class="panel">
		<div class="content-header no-mg-top">
			<i class="fa fa-newspaper-o"></i>
			<div class="content-header-title">Siswa Form</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="content-box">
					<form id="form-action">
						<input type="text" name="id" class="hidden">
						<div class="form-group">
							<label for="">Nama</label>
							<input class="form-control" name="nama" placeholder="Nama" type="text">
							<div class="validation-message" data-field="nama"></div>
						</div>
						<div class="form-group">
							<label for=""> Jenis Kelamin</label>
							<select name="jenis_kelamin" class="form-control">

						<option value="L">L</option>

						<option value="P">P</option>
			
							</select>
							<div class="validation-message" data-field="jenis_kelamin"></div>
						</div>
						<div class="form-group">
							<label for=""> Vegetarian</label>
							<select name="vegetarian" class="form-control">

						<option value="Iya">Iya</option>

						<option value="Tidak">Tidak</option>
			
							</select>
							<div class="validation-message" data-field="vegetarian"></div>
						</div>
						<div class="form-group">
							<label for="">NIS</label>
							<input class="form-control" name="nis" placeholder="NIS" type="text">
							<div class="validation-message" data-field="nis"></div>
						</div>
						<div class="form-group">
							<label for=""> Tempat Lahir</label>
							<input class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" type="text">
							<div class="validation-message" data-field="tempat_lahir"></div>
						</div>
						<div class="form-group">
							<label for=""> Tanggal Lahir</label>
							<input class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" type="text">
							<div class="validation-message" data-field="tanggal_lahir"></div>
						</div>
						<div class="form-group">
							<label for=""> Alamat</label>
							<textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
							<div class="validation-message" data-field="alamat"></div>
						</div>

						<div class="form-group">
							<label for=""> Kelas</label>
							<select name="kelas" class="form-control">

						<option value="I">I</option>
						<option value="II">II</option>
						<option value="III">III</option>
						<option value="IV">IV</option>
						<option value="V">V</option>
						<option value="VI">VI</option>
						<option value="VII">VII</option>
						<option value="VIII">VIII</option>
						<option value="IX">IX</option>
			
							</select>
							<div class="validation-message" data-field="kelas"></div>
						</div>
						
						
						<div class="form-group">
							<label for=""> Foto</label>
							<div class="uploader-wrapper">
								<button type="button" class="btn btn-primary picker-uploader"><i class="fa fa-cloud-upload"></i> Upload / Select Foto</button>
							</div>
							<div class="validation-message" data-field="foto"></div>
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

		var uploader = $('.picker-uploader').uploader({
			upload_url: '<?php echo base_url() . 'uploader/upload'; ?>',
			file_picker_url: '<?php echo base_url() . 'uploader/files'; ?>',
			input_name: 'foto',
			maximum_total_files: 4,
			maximum_file_size: 50009000,
			file_types_allowed: ['image/jpeg', 'image/png', 'image/vnd.adobe.photoshop'],
			on_error: function(err) {
				swal({
					title: "Upload Failed",
					text: err.messages,
					type: "warning"
				})
			}
		})
		
		if (index != '') {
			datagrid.formLoad('#form-action', index);
			uploader.set_files(datagrid.getRowData(index).foto)
		}

		$('.loading-panel').hide();
		$('.form-panel').show();
	})();

	function validate(formData) {
		var returnData;
		$('#form-action').disable([".action"]);
		$("button[title='save']").html("Validating data, please wait...");
		$.ajax({
	        url: "<?php echo base_url() . 'siswa/validate'; ?>", async: false, type: 'POST', data: formData,
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
		$.post("<?php echo base_url() . 'siswa/action'; ?>", formData).done(function(data) {
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