<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
	<div class="col-md-12">
		<form id="form_api_key" class="form-horizontal">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('User Apps', 'user_id', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'user_id', 'id' => 'user_id', 'class' => 'form-control input-sm', 'value' => $detail->user_id,'onchange'=>'generate_key()']); ?>
							<?php echo form_hidden('id', $detail->id); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Api Key', 'api_key', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'api_key', 'id' => 'api_key', 'class' => 'form-control input-sm', 'value' => $detail->api_key]); ?>	
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Domain URL', 'url_domain', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'url_domain', 'id' => 'url_domain', 'class' => 'form-control input-sm', 'value' => $detail->url_domain]); ?>
						</div>
					</div>	
				</div>	
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Password', 'password', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'password', 'id' => 'password', 'class' => 'form-control input-sm', 'placeholder' => 'xxx']); ?>
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Status', 'status', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-4">
									<div class="radio">
										<?php echo form_radio(array('name' => 'status', 'value' => 'yes', 'checked' => ('yes' == $detail->api_key_activated) ? TRUE : FALSE )); ?> Aktif
									</div>
								</div>
								<div class="col-md-4">
									<div class="radio">
										<?php echo form_radio(array('name' => 'status', 'value' => 'no', 'checked' => ('no' == $detail->api_key_activated) ? TRUE : FALSE )); ?> Nonaktif
									</div>								
								</div>
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
	
	function update(){
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/api_key/update",
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