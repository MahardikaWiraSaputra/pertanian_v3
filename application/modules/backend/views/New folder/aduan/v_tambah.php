<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
	<div class="col-md-12">
		<form id="form_aduan" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<?php echo form_label('Nama Pelapor', 'nama', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<?php echo form_input(['name' => 'nama', 'id' => 'nama', 'class' => 'form-control input-md', 'placeholder' => 'Nama Pelapor']); ?>
						</div>
					</div>	
					<div class="form-group">
						<?php echo form_label('Instansi / Jabatan', 'instansi', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-6">
							<?php echo form_input(['name' => 'instansi', 'id' => 'instansi', 'class' => 'form-control input-md', 'placeholder' => 'Instansi']); ?>
						</div>
						<div class="col-md-3">
							<?php echo form_input(['name' => 'jabatan', 'id' => 'jabatan', 'class' => 'form-control input-md', 'placeholder' => 'Jabatan']); ?>
						</div>
					</div>	
					<div class="form-group">
						<?php echo form_label('Nomor Telepon', 'telp', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<?php echo form_input(['name' => 'telp', 'id' => 'telp', 'class' => 'form-control input-md', 'placeholder' => 'Nomor Telepon']); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Keluhan', 'telp', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-9">
							<?php echo form_textarea(['name' => 'keluhan', 'id' => 'keluhan', 'class' => 'form-control input-md', 'rows' => '5']); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Foto / Screenshoot', 'telp', array('class' => 'col-md-3 control-label')); ?>
						<div class="col-md-3">
							<?php echo form_upload(['name' => 'berkas', 'id' => 'berkas', 'class' => 'form-control input-md']); ?>
						</div>
					</div>

					<div class="form-group btn-simpan">
						<?php echo form_label('', '', array('class' => 'col-md-3 control-label-left')); ?>
						<div class="col-md-2">
							<a class="btn btn-success btn-block" onclick="simpan();">Simpan</a>
						</div>
					</div>

				</div>
			</div>

			
		</form>
	</div>
</div>


<script>

	function simpan(){
		var formData = new FormData($('#form_aduan')[0]);
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/aduan/simpan",
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