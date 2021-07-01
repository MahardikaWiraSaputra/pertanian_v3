<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
	<div class="col-md-12">
		<form id="form_pengguna" class="form-horizontal">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('No. Kepegawaian (NIP/NIAP)', 'nip', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-sm-8">
							<div class="input-group input-group-sm">
								<?php echo form_input(['name' => 'nip', 'id' => 'nip', 'class' => 'form-control input-sm', 'value' => $detail->nip]); ?>
								<div class="input-group-btn">
									<button type="button" class="btn btn-success btn-flat" onclick="find_nip()">Cek</button>
									<button type="button" class="btn btn-warning btn-flat" onclick="reset_val()">Reset</button>
								</div>
							</div>
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Nama Lengkap', 'nama', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'nama', 'id' => 'nama', 'class' => 'form-control input-sm', 'value' => $detail->nama]); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Email', 'email', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control input-sm', 'value' => $detail->email]); ?>	
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Unit Kerja', 'unit', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'unit', 'id' => 'unit', 'class' => 'form-control input-sm', 'value' => $detail->unit]); ?>
						</div>
					</div>	
				</div>	
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Satuan Kerja', 'satker', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'satker', 'id' => 'satker', 'class' => 'form-control input-sm', 'value' => $detail->satker]); ?><?php echo form_hidden('unor',  $detail->kd_unor); ?>
						</div>
					</div>	
				</div>	
			</div>
			<?php if ($detail->satker = 1) { ?>
			<div id="form_1" class="row">
				<?php echo form_label('Sertifikat', 'sertifikat', array('class' => 'col-md-2 control-label-left')); ?>
				<div class="col-md-10">
					<div class="col-md-4">
						<div class="form-group">
	                  		<label for="exampleInputFile">P12</label>
	                  		<input type="file" name="p12" id="p12">
		                </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
	                  		<label for="exampleInputFile">PEM</label>
	                  		<input type="file" name="cert" id="cert">
	                	</div>	
					</div>
					<div class="col-md-4">
						<div class="form-group">
	                  		<label for="exampleInputFile">KEY</label>
	                  		<input type="file" name="key" id="key">
		                </div>	
					</div>
					<span class="help-block"><code>kosongi jika tidak diubah</code></span>						
				</div>
			</div>
			<?php } ?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Status', 'status', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<div class="radio">
								<?php echo form_radio(array('name' => 'status', 'value' => 'Aktif', 'checked' => ('Aktif' == $detail->status) ? TRUE : FALSE )); ?> Aktif
							</div>
							<div class="radio">
								<?php echo form_radio(array('name' => 'status', 'value' => 'Nonaktif', 'checked' => ('Nonaktif' == $detail->status) ? TRUE : FALSE )); ?> Nonaktif
							</div>
						</div>
					</div>	
				</div>	
			</div>
			<div class="form-group btn-simpan">
				<?php echo form_label('', '', array('class' => 'col-md-2 control-label-left')); ?>
				<div class="col-md-2">
					<a class="btn btn-success btn-block" onclick="update();">Simpan</a>
				</div>
			</div>
		</form>
	</div>
</div>


<script>
	function find_nip(){
		var nip = $('input[name=nip]').val();
		if(nip){
			$('#loading').html('<i class="fa fa-refresh fa-spin"></i>');
				$.ajax({
	            type : "POST",
	            url  : "<?php echo base_url('backend/pengguna/find_nip')?>",
	            dataType : "JSON",
	            data : {nip: nip},
	            cache:false,
	            success: function(data){
	               $.each(data,function(nip, nama, satker){
	                   $('[name="nama"]').val(data.nama);
	                   $('[name="satker"]').val(data.satker);
	                   $('[name="unor"]').val(data.kd_unor);
	                   $('[name="unit"]').val('Pemerintah Kabupaten Banyuwangi');
	               });
	            }
	        });	
	        return false;	   
		}
		else{
			alert ('NIP / NIAP Tidak boleh kosong');
		}
	}

	function reset_val() {
		$("#form_pengguna")[0].reset();
	}

	function update(){
		var formData = new FormData($('#form_pengguna')[0]);
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/pengguna/update",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(response){
                if(response.success == true) {
                    swal({
				      title: 'Sukses',
				      text: "Data berhasil disimpan",
				      type: 'success',
				      padding: '2em',
				      showConfirmButton: false, 
				      timer: 1500
				    }).then((result) => {
					    if (result.dismiss === Swal.DismissReason.timer) {
					       	$('#ajax-modal').modal('hide');
					       	get_items();  
					    }
					});
                }
                else {
                    swal({
				      title: 'Gagal',
				      text: "Data tidak dapat disimpan",
				      type: 'error',
				      padding: '2em',
				      showConfirmButton: false, 
				      timer: 1500
				    }).then((result) => {
					    if (result.dismiss === Swal.DismissReason.timer) {
					    	$('#ajax-modal').modal('hide');
					    }
					});
                }
            }

        });
        return false;
	}
</script>