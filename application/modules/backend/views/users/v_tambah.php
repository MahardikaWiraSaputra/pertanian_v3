<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="card">
	<div class="card-body">
		<form class="form-sample" id="form_users">
			<div class="row">
				<div class="col-md-7">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">User</label>
						<div class="col-sm-9">
							<?php echo form_input(['name' => 'username', 'id' => 'username', 'class' => 'form-control form-control-sm', 'placeholder' => 'Username']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Fullname</label>
						<div class="col-sm-9">
							<?php echo form_input(['name' => 'full_name', 'id' => 'full_name', 'class' => 'form-control form-control-sm', 'placeholder' => 'Fullname']); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Email</label>
						<div class="col-sm-9">
							<?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control form-control-sm', 'placeholder' => 'Email']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Password</label>
						<div class="col-sm-9">
							<?php echo form_input(['name' => 'password', 'id' => 'password', 'class' => 'form-control form-control-sm', 'placeholder' => 'Password']); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Kecamatan</label>
						<div class="col-sm-9">
							<?php echo form_dropdown('kecamatan', $list_kecamatan,"", 'id="filter_kecamatan", class="form-control"'); ?>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label>Status</label>
                      	<div class="form-check">
                        	<label class="form-check-label">
                        	<?php echo form_radio('status', '1', TRUE); ?> Aktif
                        	<i class="input-helper"></i></label>
                      	</div>
                      	<div class="form-check">
                        	<label class="form-check-label">
                          	<?php echo form_radio('status', '0', FALSE); ?> Nonaktif
                        	<i class="input-helper"></i></label>
                      	</div>
                    </div>
					<div class="form-group">
						<label>User Group</label>
						<?php foreach ($list_groups as $key => $row) : ?>
						<div class="form-check">
							<label class="form-check-label">
								<?php echo form_checkbox('groups[]', $row->id); ?> <?php echo  $row->description; ?> <i class="input-helper"></i>
							</label>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="col-md-12">
					<span id="submit" class="btn btn-primary mr-2" onclick="simpan();">Submit</span>
					<button class="btn btn-light">Cancel</button>
				</div>
			</div>

		</form>
	</div>
</div>

<script>

	function simpan(){
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/users/simpan",
            data: $("#form_users").serializeArray(),
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