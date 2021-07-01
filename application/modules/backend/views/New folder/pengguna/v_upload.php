<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
	<div class="col-md-12">
		<form id="form_pengguna" class="form-horizontal">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('No Kepegawaian', 'nip', array('class' => 'col-md-4 control-label-right')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'nip', 'id' => 'nip', 'class' => 'form-control input-sm', 'value' => $nip, 'readonly'=>'true']); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Nama Lengkap', 'nama', array('class' => 'col-md-3 control-label-right')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'nama', 'id' => 'nama', 'class' => 'form-control input-sm', 'value' => $detail->nama, 'readonly'=>'true']); ?>	
						</div>
					</div>	
				</div>	
			</div>
			<?php if ($tipe = 'p12') {?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Tipe Sertifikat', 'tipe', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-6">
									<div class="radio">
										<?php echo form_radio('metode', 'upload', TRUE); ?> Upload
									</div>
								</div>
								<div class="col-md-6">
									<div class="radio">
										<?php echo form_radio('metode', 'convert', FALSE); ?> Convert
									</div>								
								</div>
							</div>
						</div>
					</div>	
				</div>	
			</div>
			<div id="form_convert" class="row" style="display: none;">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_hidden('tipe', $tipe); ?>
						<?php echo form_label('Passphrase', 'passphrase', array('class' => 'col-md-4 control-label-right')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'passphrase', 'id' => 'passphrase', 'class' => 'form-control input-sm', 'placeholder' => 'Passphrase']); ?>	
						</div>
					</div>	
				</div>	
			</div>
			<div id="form_upload" class="row">
				<?php echo form_label('Sertifikat', 'sertifikat', array('class' => 'col-md-2 control-label-left')); ?>
				<div class="col-md-10">
					<div class="col-md-4">
						<div class="form-group">
	                  		<input type="file" name="p12" id="p12">
		                </div>
					</div>
				</div>
			</div>

			<?php } ?>
			<div class="form-group btn-simpan">
				<?php echo form_label('', '', array('class' => 'col-md-2 control-label-left')); ?>
				<div class="col-md-2">
					<a class="btn btn-success btn-block" onclick="proses_upload();">Proses</a>
				</div>
			</div>
		</form>
	</div>
</div>


<script>

    $(document).ready(function() {
        $("input[name$='metode']").click(function() {
            var sertifikat = $(this).val();
            $("#form_upload").hide();
            $("#form_convert").hide();
            $("#form_" + sertifikat).show();
        });
    });

	function proses_upload(){
		var formData = new FormData($('#form_pengguna')[0]);
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/pengguna/proses_upload",
            data: formData,
            contentType: false,
            processData: false,
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