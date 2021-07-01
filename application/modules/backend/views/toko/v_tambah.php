<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Register Toko</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Register User Toko</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  <div class="row">
	<div class="col-md-12">
		<form id="form_toko" class="form-horizontal">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Toko', 'Nama Toko', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<select name="kategori_store" id="kategori_store" class="form-control">
								<option value="">Pilih Kategori Toko</option>
								<option value="1">Pasar</option>
								<option value="2">Umkm</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('NIK', 'nik', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<?php echo form_input(['name' => 'nik', 'id' => 'nik', 'class' => 'form-control input-sm', 'placeholder' => 'Masukkan NIK']); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('NAMA LENGKAP', 'nama_lengkap', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'nama_lengkap', 'id' => 'nama_lengkap', 'class' => 'form-control input-sm', 'placeholder' => 'Masukkan nama pemilik']); ?>	
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Alamat', 'alamat', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'alamat', 'id' => 'alamat', 'class' => 'form-control input-sm', 'placeholder' => 'Alamat']); ?>
						</div>
					</div>	
				</div>	
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('RT', 'rt', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'rt', 'id' => 'rt', 'class' => 'form-control input-sm', 'placeholder' => 'RT']); ?>
						</div>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('Rw', 'RW', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'rw', 'id' => 'rw', 'class' => 'form-control input-sm', 'placeholder' => 'RW']); ?>
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('NO HP/WA', 'telp', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'telp', 'id' => 'telp', 'class' => 'form-control input-sm', 'placeholder' => 'Masukkan nomor hp']); ?>	
						</div>
					</div>	
				</div>	
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('KECAMATAN', 'kecamatan', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_dropdown('kecamatan', $filter_kecamatan,"", 'id="kecamatan", class="form-control select2",onchange="get_desa()"'); ?>
						</div>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('DESA', 'desa', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<div id="desa"></div>
							<!-- <?php echo form_dropdown('desa', $filter_desa,"", 'id="desa", class="form-control select2"'); ?> -->
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('NAMA TOKO', 'nama_usaha', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'nama_usaha', 'id' => 'nama_usaha', 'class' => 'form-control input-sm', 'placeholder' => 'Masukkan nama toko']); ?>
						</div>
					</div>	
				</div>	
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('PASAR', 'pasar', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_dropdown('pasar', $filter_pasar,"", 'id="pasar", class="form-control select2"'); ?>
						</div>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('KOMODITAS', 'komoditas', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_dropdown('komoditas', $filter_komoditas,"", 'id="komoditas", class="form-control select2"'); ?>
						</div>
					</div>	
				</div>	
			</div>
			<div class="row" id="add_komoditas">
				<div class="col-md-6">			
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Komoditas Lainnya', 'komoditas_lainnya', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'komoditas_lainnya', 'id' => 'komoditas_lainnya', 'class' => 'form-control input-sm', 'placeholder' => 'Masukkan komoditas lainnya']); ?>
						</div>
					</div>	
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Status', 'status', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-4">
									<div class="radio">
										<?php echo form_radio('status', 'yes', TRUE); ?> Aktif
									</div>
								</div>
								<div class="col-md-4">
									<div class="radio">
										<?php echo form_radio('status', 'no', FALSE); ?> Nonaktif
									</div>								
								</div>
							</div>
						</div>
					</div>	
				</div>	
			</div> -->
			<div class="form-group btn-simpan">
				<?php echo form_label('', '', array('class' => 'col-md-2 control-label-left')); ?>
				<div class="col-md-2">
					<a class="btn btn-success btn-block" onclick="simpan();">SIMPAN</a>
				</div>
			</div>
		</form>
	</div>
	</div>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <div class="row">
	<div class="col-md-12">
		<form id="form_user" class="form-horizontal">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('NIK', 'nik', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'nik', 'id' => 'nik_daftar', 'class' => 'form-control input-sm', 'placeholder' => 'Masukkan NIK','onchange="get_nik()"']); ?>
							<p id="notif_user"></p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('username', 'username', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'username', 'id' => 'username', 'class' => 'form-control input-sm', 'placeholder' => 'Masukkan username']); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">	
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('email', 'email', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control input-sm', 'placeholder' => 'Masukkan email']); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Pasword', 'password', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'password', 'id' => 'password', 'class' => 'form-control input-sm', 'placeholder' => 'Password']); ?>	
						</div>
					</div>	
				</div>	
			</div>
			<div class="form-group btn-simpan">
				<?php echo form_label('', '', array('class' => 'col-md-2 control-label-left')); ?>
				<div class="col-md-2">
					<a class="btn btn-success btn-block" onclick="simpan_user();">SIMPAN</a>
				</div>
			</div>
		</form>
	</div>
	</div>
  </div>
  </div>
</div>



<script>

	$(document).ready(function() {
		$('#add_komoditas').hide();
        $("#kecamatan").change(function() {
			var id = this.value;
			$.ajax({
				type: "GET",
				url  : "<?php echo base_url()?>backend/toko/get_desa/"+id,
				success: function(response){
					$('#desa').html(response);
				}
			});
    	});
		$( "#nik_daftar" ).change(function() {
			$.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/toko/cek_nik",
            data: $("#form_user").serializeArray(),
            dataType: "JSON",
            success: function(response){
                if(response.success == true) {
                    swal({
				      	title: 'Gagal',
				      	text: response.message,
				      	type: 'error',
				      	padding: '2em',
				      	showConfirmButton: false, 
				      	timer: 1500
				    }).then((result) => {
					    if (result.dismiss === Swal.DismissReason.timer) {
							$('#nik_daftar').val("");
					    }
					});
                }
                else {
                    swal({
				    	title: 'Sukses',
				    	text: response.message,
				    	type: 'success',
				    	padding: '2em',
				    	showConfirmButton: false, 
				    	timer: 1500
				    }).then((result) => {
					    if (result.dismiss === Swal.DismissReason.timer) {
					    }
					});
                }
            }
        });
        return false;
		});
		$( "#komoditas" ).change(function() {
			if(this.value == 'lainnya'){
				$('#add_komoditas').show();
			} else {
				$('#add_komoditas').hide();
			}
		});
	})

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
            url  : "<?php echo base_url()?>backend/toko/simpan",
            data: $("#form_toko").serializeArray(),
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

	function get_nik(){
		console.log('data');
	}

	function get_nik(){
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/toko/cek_nik",
            data: $("#form_toko").serializeArray(),
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
					    }
					});
                }
            }
        });
        return false;
	}

	function simpan_user(){
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/toko/simpan_user",
            data: $("#form_user").serializeArray(),
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

	function get_desa(){
		var id = $('#kecamatan').val();
        ajax_modal('backend/toko/get_desa/'+id);
	}
</script>