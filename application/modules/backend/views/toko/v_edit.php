<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
	<div class="col-md-12">
		<form id="form_pasar" class="form-horizontal">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Toko', 'Nama Toko', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<select name="kategori_store" id="kategori_store" class="form-control">
								<option value="">Pilih Kategori Toko</option>
								<?php if($detail->kategori_store == 1):?>
									<option value="1" selected>Pasar</option>
									<option value="2">Umkm</option>
								<?php elseif($detail->kategori_store == 2):?>
									<option value="1">Pasar</option>
									<option value="2" selected>Umkm</option>
								<?php else:?>
									<option value="1">Pasar</option>
									<option value="2">Umkm</option>
								<?php endif;?>
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
							<?php echo form_hidden('id', $detail->id); ?>
							<?php echo form_input(['name' => 'nik', 'id' => 'nik', 'class' => 'form-control input-sm','value' => $detail->nik,'placeholder' => 'Masukkan NIK']); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('NAMA LENGKAP', 'nama_lengkap', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'nama_lengkap', 'id' => 'nama_lengkap', 'class' => 'form-control input-sm','value' => $detail->nama_lengkap, 'placeholder' => 'Masukkan nama pemilik']); ?>	
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Alamat', 'alamat', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'alamat', 'id' => 'alamat', 'class' => 'form-control input-sm', 'placeholder' => 'Alamat','value' => $detail->alamat]); ?>
						</div>
					</div>	
				</div>	
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('RT', 'rt', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'rt', 'id' => 'rt', 'class' => 'form-control input-sm', 'placeholder' => 'RT','value' => $detail->rt]); ?>
						</div>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('Rw', 'RW', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'rw', 'id' => 'rw', 'class' => 'form-control input-sm', 'placeholder' => 'RW','value' => $detail->rw]); ?>
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('NO HP/WA', 'telp', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'telp', 'id' => 'telp', 'class' => 'form-control input-sm', 'placeholder' => 'Masukkan nomor hp','value' => $detail->telp]); ?>	
						</div>
					</div>	
				</div>	
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('KECAMATAN', 'kecamatan', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_dropdown('kecamatan', $filter_kecamatan, $detail->kecamatan, 'id="kecamatan", class="form-control select2"'); ?>
						</div>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('DESA', 'desa', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<select name="desa" id="desa" class="form-control select2">
								<option value="">Pilih Desa</option>
								<?php foreach($filter_desa as $data):?>
								<?php if($data['kode_desa'] == $detail->desa):?>
									<option value="<?=$data['kode_desa']?>" selected><?=$data['nama_desa']?></option>
									<?php else:?>
									<option value="<?=$data['kode_desa']?>"><?=$data['nama_desa']?></option>
								<?php endif;?>
								<?php endforeach;?>
							</select>
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('NAMA TOKO', 'nama_usaha', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'nama_usaha', 'id' => 'nama_usaha', 'class' => 'form-control input-sm', 'placeholder' => 'Masukkan nama toko','value' => $detail->nama_usaha]); ?>
						</div>
					</div>	
				</div>	
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('PASAR', 'pasar', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_dropdown('pasar', $filter_pasar, $detail->pasar_id, 'id="pasar", class="form-control select2"'); ?>
						</div>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('KOMODITAS', 'komoditas', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_dropdown('komoditas', $filter_komoditas,$detail->komoditi, 'id="komoditas", class="form-control select2"'); ?>
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
	
	function update(){
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/toko/update",
            data: $("#form_pasar").serializeArray(),
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