<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<style type="text/css">
.thumb{
  margin: 24px 5px 20px 0;
  width: 150px;
  float: left;
}
#blah {
  border: 2px solid;
  display: block;
  background-color: white;
  border-radius: 5px;
}
#remove_button {
    border-radius: 50%;
    border: 3px solid #fff;
    display: block;
    text-align: center;
    position: absolute;
    top: -10px;
    right: 0px;
  }
</style>
<div class="row">
	<div class="col-md-12">
	<form id="form_produk" class="form-horizontal">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('INPUT DATA KECAMATAN / DESA ?', 'input', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<select name="is_kecamatan" id="is_kecamatan" class="form-control">
									<option value="0">Pilih Kecamatan / Desa</option>
									<?php if($detail->tipe == 'DESA'):?>
										<option value="KECAMATAN">KECAMATAN</option>
										<option value="DESA" selected>DESA</option>
									<?php elseif($detail->tipe == 'KECAMATAN'):?>
										<option value="KECAMATAN" selected>KECAMATAN</option>
										<option value="DESA">DESA</option>
									<?php else:?>
										<option value="KECAMATAN">KECAMATAN</option>
										<option value="DESA">DESA</option>
									<?php endif;?>
								</select>
							</div>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('KECAMATAN', 'kecamatan', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_dropdown('kecamatan', $filter_kecamatan, $detail->kecamatan, 'id="kecamatan_filter", class="form-control select2",onchange="get_desa()"'); ?>
							</div>
						</div>	
					</div>
					<div class="col-md-6" id="desa_title">
						<div class="form-group">
							<?php echo form_label('DESA', 'desa', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<div id="desa">
								<?php echo form_dropdown('desa', $filter_desa, $detail->desa, 'id="desa_filter", class="form-control select2"'); ?>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('Komoditas', 'komoditas', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_dropdown('komoditas', $filter_komoditas, $detail->komoditas, 'id="komoditas_filter", class="form-control select2"'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('TAHUN', 'TAHUN', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_dropdown('tahun', $filter_tahun,$detail->tahun, 'id="tahun_filter", class="form-control select2"'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('Pilih Sub Round', 'Pilih Sub Round', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<select class="form-control" name="sub_round" id="sub_round" onchange="edit_round()">
								<?php if($detail->kategori == 'sub_round_1'):?>
									<option value="sub_round_1" selected>SUB ROUND 1 (JANUARI, FEBRUARI, MARET, APRIL)</option>
									<option value="sub_round_2">SUB ROUND 2 (MEI, JUNI, JULI, AGUSTUS)</option>
									<option value="sub_round_3">SUB ROUND 3 (SEPTEMBER, OKTOBER, NOVEMBER, DESEMBER)</option>
								<?php elseif($detail->kategori == 'sub_round_2'):?>
									<option value="sub_round_1">SUB ROUND 1 (JANUARI, FEBRUARI, MARET, APRIL)</option>
									<option value="sub_round_2" selected>SUB ROUND 2 (MEI, JUNI, JULI, AGUSTUS)</option>
									<option value="sub_round_3">SUB ROUND 3 (SEPTEMBER, OKTOBER, NOVEMBER, DESEMBER)</option>
								<?php elseif($detail->kategori == 'sub_round_3'):?>
									<option value="sub_round_1">SUB ROUND 1 (JANUARI, FEBRUARI, MARET, APRIL)</option>
									<option value="sub_round_2">SUB ROUND 2 (MEI, JUNI, JULI, AGUSTUS)</option>
									<option value="sub_round_3" selected>SUB ROUND 3 (SEPTEMBER, OKTOBER, NOVEMBER, DESEMBER)</option>
								<?php else:?>
									<option value="sub_round_1">SUB ROUND 1 (JANUARI, FEBRUARI, MARET, APRIL)</option>
									<option value="sub_round_2">SUB ROUND 2 (MEI, JUNI, JULI, AGUSTUS)</option>
									<option value="sub_round_3">SUB ROUND 3 (SEPTEMBER, OKTOBER, NOVEMBER, DESEMBER)</option>
								<?php endif;?>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6" id="here_sub"></div>
		</div>
			<div class="form-group btn-simpan">
				<?php echo form_label('', '', array('class' => 'col-md-2 control-label-left')); ?>
				<div class="col-md-2">
					<a class="btn btn-success btn-block" onclick="simpan();">Simpan</a>
					<!-- <button type="submit">submit</button> -->
				</div>
			</div>
		</form>
	</div>
</div>


<script>

	$(document).ready(function() {
		edit_round();
		// get_desa();
        $(".select2").select2();
		$("#kecamatan_filter").change(function() {
			var id = this.value;
			$.ajax({
				type: "GET",
				url  : "<?php echo base_url()?>backend/pertanian/get_desa/"+id,
				success: function(response){
					$('#desa').html(response);
				}
			});
    	});
		$("#is_kecamatan").change(function() {
			var id = this.value;
			if(id == 1){
				$('#desa_title').hide();
			} else {
				$('#desa_title').show();
			}
    	});
		$("#sub_round").change(function() {
			var id = this.value;
			$.ajax({
				type: "GET",
				url  : "<?php echo base_url()?>backend/pertanian/edit_sub/"+id,
				success: function(response){
					$('#here_sub').html(response);
				}
			});
    	});
    });

	function reset_val() {
		$("#form_api_key")[0].reset();
	}

	function get_desa()
	{
		var id = $('#kecamatan_filter').val();
			$.ajax({
				type: "GET",
				url  : "<?php echo base_url()?>backend/pertanian/get_desa/"+id,
				success: function(response){
					$('#desa').html(response);
				}
			});
	}
	function edit_round(){
			var sub_round = $('#sub_round').val();
			var tahun_filter = $('#tahun_filter').val();
			var komoditas_filter = $('#komoditas_filter').val();
			$.ajax({
				type: "GET",
				url  : "<?php echo base_url()?>backend/pertanian/edit_sub/"+sub_round+'/'+tahun_filter+'/'+komoditas_filter,
				success: function(response){
					$('#here_sub').html(response);
				}
			});
	}

	function simpan(){
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/pertanian/update",
            data: $("#form_produk").serializeArray(),
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

	function hapus_gambarx(param){
		console.log(param);
	}

	function hapus_gambar(param,el){
		var element = param ;
		$('#'+el).remove();
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/produk/hapus_foto",
            data: {foto: param},
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
					       	// $('#ajax-modal').modal('hide');
					       	// get_items();          
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
					    // 	$('#ajax-modal').modal('hide');
					    }
					});
                }
            }
        });
        return false;
	}

	function upload()
	{
		let myForm = document.getElementById('form_produk');
		if ($('#image_file').val() == '') {
                alert("Please Select the File");
            } else {
                var form_data = new FormData(myForm);
                var ins = document.getElementById('image_file').files.length;
                for (var x = 0; x < ins; x++) {
                    form_data.append("files[]", document.getElementById('image_file').files[x]);
                }
				console.log(form_data);
                $.ajax({
                    url: "<?php echo base_url()?>backend/produk/multi_image",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(res) {
                        console.log(res.success);
                        if (res.success == true) {
                            $('#image_file').val('');
                            $('#uploadPreview').html('');
                            $('#msg').html(res.msg);
                            $('#divMsg').show();
                        } else if (res.success == false) {
                            $('#msg').html(res.msg);
                            $('#divMsg').show();
                        }
                        setTimeout(function() {
                            $('#msg').html('');
                            $('#divMsg').hide();
                        }, 3000);
                    }
                });
        }
	}

	function readImage(file) {
		var reader = new FileReader();
		var image = new Image();
		reader.readAsDataURL(file);
		reader.onload = function(_file) {
			image.src = _file.target.result; // url.createObjectURL(file);
			image.onload = function() {
				var w = this.width,
					h = this.height,
					t = file.type, // ext only: // file.type.split('/')[1],
					n = file.name,
					s = ~~(file.size / 1024) + 'KB';
				$('#uploadPreview').append('<img src="' + this.src + '" class="thumb">');
			};
			image.onerror = function() {
				alert('Invalid file type: ' + file.type);
			};
		};
	}

	$("#image_file").change(function(e) {
		if (this.disabled) {
			return alert('File upload not supported!');
		}
		var F = this.files;
		if (F && F[0]) {
			for (var i = 0; i < F.length; i++) {
				readImage(F[i]);
			}
		}
	}); 


</script>