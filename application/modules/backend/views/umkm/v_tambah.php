<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>

<form class="form-sample" id="form_users">
	<div class="row">
		<div class="card">
			<div class="card-body">
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">No. Induk Kependudukan</label>
						<div class="col-sm-8">
							<?php echo form_input(['name' => 'nik', 'id' => 'nik', 'class' => 'form-control form-control-sm', 'placeholder' => 'No. Kependudukan']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Nama Lengkap</label>
						<div class="col-sm-8">
							<?php echo form_input(['name' => 'nama_lengkap', 'id' => 'nama_lengkap', 'class' => 'form-control form-control-sm', 'placeholder' => 'Nama Lengkap']); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Alamat</label>
						<div class="col-sm-8">
							<?php echo form_input(['name' => 'alamat', 'id' => 'alamat', 'class' => 'form-control form-control-sm', 'placeholder' => 'alamat']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Kecamatan</label>
						<div class="col-sm-8">
							<?php echo form_input(['name' => 'alamat', 'id' => 'alamat', 'class' => 'form-control form-control-sm', 'placeholder' => 'alamat']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">No. Kartu Keluarga</label>
						<div class="col-sm-8">
							<?php echo form_input(['name' => 'no_kk', 'id' => 'no_kk', 'class' => 'form-control form-control-sm', 'placeholder' => 'No. KK']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-8">
							<?php echo form_input(['name' => 'no_kk', 'id' => 'no_kk', 'class' => 'form-control form-control-sm', 'placeholder' => 'No. KK']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">RT / RW</label>
						<div class="col-sm-4">
							<?php echo form_input(['name' => 'no_kk', 'id' => 'no_kk', 'class' => 'form-control form-control-sm', 'placeholder' => 'No. KK']); ?>
						</div>
						<div class="col-sm-4">
							<?php echo form_input(['name' => 'no_kk', 'id' => 'no_kk', 'class' => 'form-control form-control-sm', 'placeholder' => 'No. KK']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Desa / Kelurahan</label>
						<div class="col-sm-8">
							<?php echo form_input(['name' => 'alamat', 'id' => 'alamat', 'class' => 'form-control form-control-sm', 'placeholder' => 'alamat']); ?>
						</div>
					</div>					
				</div>
				<div class="col-md-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">No. Kartu Keluarga</label>
						<div class="col-sm-8">
							<?php echo form_input(['name' => 'no_kk', 'id' => 'no_kk', 'class' => 'form-control form-control-sm', 'placeholder' => 'No. KK']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-8">
							<?php echo form_input(['name' => 'no_kk', 'id' => 'no_kk', 'class' => 'form-control form-control-sm', 'placeholder' => 'No. KK']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">RT / RW</label>
						<div class="col-sm-4">
							<?php echo form_input(['name' => 'no_kk', 'id' => 'no_kk', 'class' => 'form-control form-control-sm', 'placeholder' => 'No. KK']); ?>
						</div>
						<div class="col-sm-4">
							<?php echo form_input(['name' => 'no_kk', 'id' => 'no_kk', 'class' => 'form-control form-control-sm', 'placeholder' => 'No. KK']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Desa / Kelurahan</label>
						<div class="col-sm-8">
							<?php echo form_input(['name' => 'alamat', 'id' => 'alamat', 'class' => 'form-control form-control-sm', 'placeholder' => 'alamat']); ?>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<span id="submit" class="btn btn-primary mr-2" onclick="simpan();">Submit</span>
					<button class="btn btn-light">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</form>


<script>

	function reset_val() {
		$("#form_api_key")[0].reset();
	}

	function generate_key() {
		var userid = $('#user_id').val();
		if(userid){
			$('#loading').html('<i class="fa fa-refresh fa-spin"></i>');
				$.ajax({
	            type : "POST",
	            url  : "<?php echo base_url('backend/api_key/generate_api')?>",
	            dataType : "JSON",
	            data : {userid: userid},
	            cache:false,
	            success: function(data){
	               $.each(data,function(api_key){
	                   $('[name="api_key"]').val(data.api_key);
	               });
	            }
	        });	
	        return false;	   
		}
		else{
			alert ('User ID Tidak boleh kosong');
		}
	}
	
	function simpan(){
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/api_key/simpan",
            data: $("#form_api_key").serializeArray(),
            dataType: "JSON",
            success: function(response){
                if(response.success == true) {
                    swal({
				      	title: 'Sukses',
				      	text: response.message,
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
				    	text: response.message,
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