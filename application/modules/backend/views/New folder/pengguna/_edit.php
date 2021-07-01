<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
	<form id="reg_form" class="form-horizontal">
		<div class="col-md-6">
			<div class="form-group">
				<?php echo form_label('No. Kepegawaian (NIP/NIAP)', 'nip', array('class' => 'col-md-4 control-label-left')); ?>
				<div class="col-sm-8">
					<?php echo form_hidden('id',  $detail->ID); ?>	
					<div class="input-group input-group-sm">
						<?php echo form_input(['name' => 'nip', 'id' => 'nip', 'class' => 'form-control input-sm', 'value' => $detail->NIP]); ?>
						<div class="input-group-btn">
							<button type="button" class="btn btn-success btn-flat" onclick="findnip()">Cek</button>
							<button type="button" class="btn btn-warning btn-flat" onclick="resetreg()">Reset</button>
						</div>
					</div>
				</div>
			</div>	

			<div class="form-group">
				<?php echo form_label('Nama Lengkap', 'nama', array('class' => 'col-md-4 control-label-left')); ?>
				<div class="col-md-8">
					<?php echo form_input(['name' => 'nama', 'id' => 'nama', 'class' => 'form-control input-sm', 'value' => $detail->NAMA_LGKP]); ?>
				</div>
			</div>

			<div class="form-group">
				<?php echo form_label('Satuan Kerja', 'satker', array('class' => 'col-md-4 control-label-left')); ?>
				<div class="col-md-8">
					<?php echo form_input(['name' => 'satker', 'id' => 'satker', 'class' => 'form-control input-sm', 'value' => $detail->NM_UNOR]); ?>	
					<?php echo form_hidden('unor',  $detail->KD_UNOR); ?>
				</div>
			</div>		

			<div class="form-group">
				<?php echo form_label('Jabatan', 'jabatan', array('class' => 'col-md-4 control-label-left')); ?>
				<div class="col-md-8">
					<?php echo form_input(['name' => 'jabatan', 'id' => 'jabatan', 'class' => 'form-control input-sm', 'value' => $detail->JABATAN]); ?>	
				</div>
			</div>
			<div class="form-group">
  				<?php echo form_label('File Rekom', 'file_rekom', array('class' => 'col-md-4 control-label-left')); ?>
  				<div class="col-md-8">
					<?php echo form_input(['type' => 'file', 'name' => 'file_rekom', 'id' => 'file_rekom', 'class' => 'form-control input-sm']); ?>
					<span class="help-block"><code>kosongi jika tidak diubah</code></span>
				</div>
			</div>	
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<?php echo form_label('Nomor Induk Kependudukan (NIK)', 'nik', array('class' => 'col-md-4 control-label-left')); ?>
				<div class="col-md-8">
					<?php echo form_input(['name' => 'nik', 'id' => 'nik', 'class' => 'form-control input-sm', 'value' => $detail->NIK]); ?>
				</div>
			</div>			

			<div class="form-group">
				<?php echo form_label('Email', 'email', array('class' => 'col-md-4 control-label-left')); ?>
				<div class="col-md-8">
					<?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control input-sm', 'value' => $detail->EMAIL]); ?>
				</div>
			</div>

			<div class="form-group">
				<?php echo form_label('No. Telepon', 'telp', array('class' => 'col-md-4 control-label-left')); ?>
				<div class="col-md-8">
					<?php echo form_input(['name' => 'telp', 'id' => 'telp', 'class' => 'form-control input-sm', 'value' => $detail->TELP]); ?>
				</div>
			</div>		
			<div class="form-group">
				<?php echo form_label('Pass Kode', 'passkode', array('class' => 'col-md-4 control-label-left')); ?>
				<div class="col-md-8">
					<?php if($detail->PASSKODE !== NULL){ $pass = 'YES'; } else { $pass = '';}?>
					<?php echo form_input(['type' => 'password','name' => 'passkode', 'id' => 'passkode', 'class' => 'form-control input-sm']); ?>
					<span class="help-block"><code>kosongi jika tidak diubah</code></span>
				</div>
			</div>
			<div class="form-group">
  				<?php echo form_label('File KTP', 'file_ktp', array('class' => 'col-md-4 control-label-left')); ?>
  				<div class="col-md-8">
					<?php echo form_input(['type' => 'file', 'name' => 'file_ktp', 'id' => 'file_ktp', 'class' => 'form-control input-sm']); ?>
					<span class="help-block"><code>kosongi jika tidak diubah</code></span>
				</div>
			</div>

			<div class="form-group" >
				<?php echo form_label('', '', array('class' => 'col-md-4 control-label-left')); ?>
				<div class="col-md-4">
					<a class="btn btn-success btn-block" onclick="simpanupdate();">Simpan</a>
				</div>
			</div>
		</div>
		<hr>
	</form>
</div>

<script>
	function simpanupdate(){
		var formData = new FormData($('#reg_form')[0]);
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>registrasi/update_registrasi",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(response){
            	console.log(response.success);
                if(response.success == true) {
                	$('#ajax-modal').modal('hide');
                	get_items();
                    toastr.remove();
                    toastr['success'](response.message, '', {
                        positionClass: 'toast-bottom-right'
                    });
                }
                else {
                    toastr.remove();
                    toastr['error'](response.message, '', {
                        positionClass: 'toast-bottom-right'
                    });
                }
            }
        });
        return false;
	}
</script>