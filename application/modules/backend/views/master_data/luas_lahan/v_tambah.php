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
</style>
<div class="row">
	<div class="col-md-12">
		<form id="form_produk" class="form-horizontal">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('KECAMATAN', 'kecamatan', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_dropdown('kecamatan', $filter_kecamatan,"", 'id="kecamatan_filter", class="form-control"'); ?>
							</div>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" id="desa_titlee">
						<div class="form-group">
							<?php echo form_label('DESA', 'desa', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<div id="desaa"></div>
							</div>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('Komoditas', 'komoditas', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_dropdown('komoditas', $filter_komoditas,"", 'id="komoditas_filter", class="form-control"'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('TAHUN', 'TAHUN', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_dropdown('tahun', $filter_tahun,"", 'id="tahun_filter", class="form-control"'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('LUAS LAHAN (HEKTAR)', 'LUAS LAHAN', array('class' => 'col-md-12 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_input(['name' => 'luas_lahan', 'id' => 'luas_lahan', 'class' => 'form-control input-sm', 'placeholder' => 'CONTOH : 5000']); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('', '', array('class' => 'col-md-2 control-label-left')); ?>
							<div class="col-md-12">
								<a class="btn btn-success btn-block save" onclick="simpan();">Simpan data</a>
								<!-- <button type="submit">submit</button> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		</form>
	</div>
</div>


<script>
	$(document).ready(function() {
		$('#desa_titlee').hide();
        $(".select2").select2();
		get_desa()
		$("#kecamatan_filter").change(function() {
			$('#desa_titlee').show();
			var id = this.value;
			$.ajax({
				type: "GET",
				url  : "<?php echo base_url()?>backend/pertanian/get_desa/"+id,
				success: function(response){
					$('#desaa').html(response);
				}
			});
    	});
    });

	function get_desa()
	{
		$('#desa_title').show();
		var id = $('#kecamatan_filter').val();
			$.ajax({
				type: "GET",
				url  : "<?php echo base_url()?>backend/pertanian/get_desa/"+id,
				success: function(response){
					$('#desa').html(response);
				}
			});
	}
	
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
            url  : "<?php echo base_url()?>backend/master_data/simpan_luas_lahan",
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