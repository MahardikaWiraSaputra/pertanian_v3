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
								<?php echo form_input(['name' => 'nip', 'id' => 'nip', 'class' => 'form-control input-sm', 'placeholder' => 'No. Kepegawaian']); ?>
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
							<?php echo form_input(['name' => 'nama', 'id' => 'nama', 'class' => 'form-control input-sm', 'placeholder' => 'Nama Lengkap']); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Email', 'email', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control input-sm', 'placeholder' => 'Email']); ?>	
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Unit Kerja', 'unit', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'unit', 'id' => 'unit', 'class' => 'form-control input-sm', 'placeholder' => 'Unit Kerja']); ?>
						</div>
					</div>	
				</div>	
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Satuan Kerja', 'satker', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'satker', 'id' => 'satker', 'class' => 'form-control input-sm', 'placeholder' => 'Satuan Kerja']); ?>	
							<?php echo form_hidden('unor'); ?>	
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Tipe Sertifikat', 'tipe', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<div class="radio">
								<?php echo form_radio('tipe', '1', TRUE); ?> Balai Sertifikasi Elektronik (BSrE)
							</div>
							<div class="radio">
								<?php echo form_radio('tipe', '2', FALSE); ?> Pemerintah Kabupaten Banyuwangi (Lokal)
							</div>
						</div>
					</div>	
				</div>	
			</div>
			<div id="form_2" class="row" style="display: none;">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Passphrase', 'passphrase', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'passphrase', 'id' => 'passphrase', 'class' => 'form-control input-sm', 'placeholder' => 'Passphrase']); ?>	
						</div>
					</div>	
				</div>	
			</div>
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
				</div>
			</div>
			<div class="form-group btn-simpan">
				<?php echo form_label('', '', array('class' => 'col-md-2 control-label-left')); ?>
				<div class="col-md-2">
					<a class="btn btn-success btn-block" onclick="simpan();">Simpan</a>
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

    $(document).ready(function() {
        $("input[name$='tipe']").click(function() {
            var sertifikat = $(this).val();
            $("#form_1").hide();
            $("#form_2").hide();
            $("#form_" + sertifikat).show();
        });
    });

	function simpan(){
		var formData = new FormData($('#form_pengguna')[0]);
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/pengguna/simpan",
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

            // success: function(response){
            //     if(response.success == true) {
            //     	$('#ajax-modal').modal('hide');
            //     	get_items();
            //         toastr.remove();
            //         toastr['success'](response.message, '', {
            //             positionClass: 'toast-bottom-right'
            //         });
            //     }
            //     else {
            //         toastr.remove();
            //         toastr['error'](response.message, '', {
            //             positionClass: 'toast-bottom-right'
            //         });
            //     }
            // }
        });
        return false;
	}
</script>