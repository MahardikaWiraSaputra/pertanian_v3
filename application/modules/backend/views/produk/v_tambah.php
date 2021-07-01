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
		<form id="form_produk" class="form-horizontal" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Toko', 'Nama Toko', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_dropdown('toko', $filter_toko, '', 'id="toko", class="form-control select2", style="width:100%"'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Nama Produk', 'nama_produk', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'nama_produk', 'id' => 'nama_produk', 'class' => 'form-control input-sm', 'placeholder' => 'nama produk']); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Deskripsi', 'deskripsi', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'deskripsi', 'id' => 'deskripsi', 'class' => 'form-control input-sm', 'placeholder' => 'deskripsi']); ?>	
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('Stok', 'stok', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'stok', 'id' => 'stok', 'class' => 'form-control input-sm', 'placeholder' => 'Stok']); ?>
						</div>
					</div>	
				</div>	
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('Satuan', 'satuan', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'satuan', 'id' => 'satuan', 'class' => 'form-control input-sm', 'placeholder' => 'satuan']); ?>
						</div>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('Harga', 'harga', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'harga', 'id' => 'harga', 'class' => 'form-control input-sm', 'placeholder' => 'harga']); ?>
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<?php echo form_label('Gambar', 'Gambar', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<input type="file" id="image_file" multiple="multiple" />
							<input type="hidden" id="produk_id" name="produk_id">
						</div>
						<div id="uploadPreview"></div>
					</div>	
				</div>	
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
        $(".select2").select2();
		
    });
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
            url  : "<?php echo base_url()?>backend/produk/simpan",
            data: $("#form_produk").serializeArray(),
            dataType: "JSON",
            success: function(response){
				$('#produk_id').val(response.last_id);
                if(response.success == true) {
					console.log(response.last_id);
					upload()
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