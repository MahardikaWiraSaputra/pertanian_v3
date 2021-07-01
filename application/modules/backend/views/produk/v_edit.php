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
		<form id="form_produk" class="form-horizontal" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Toko', 'Nama Toko', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_hidden('produk_id', $detail->id_produk); ?>
							<?php echo form_dropdown('toko', $filter_toko, $detail->store_id, 'id="toko", class="form-control select2", style="width:100%"'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Nama Produk', 'nama_produk', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'nama_produk', 'id' => 'nama_produk','value'=>$detail->nama_produk, 'class' => 'form-control input-sm', 'placeholder' => 'nama produk']); ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?php echo form_label('Deskripsi', 'deskripsi', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'deskripsi', 'id' => 'deskripsi','value'=>$detail->nama_produk, 'class' => 'form-control input-sm', 'placeholder' => 'deskripsi']); ?>	
						</div>
					</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('Stok', 'stok', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'stok', 'id' => 'stok','value'=>$detail->stock, 'class' => 'form-control input-sm', 'placeholder' => 'Stok']); ?>
						</div>
					</div>	
				</div>	
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('Satuan', 'satuan', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'satuan', 'id' => 'satuan','value'=>$detail->satuan, 'class' => 'form-control input-sm', 'placeholder' => 'satuan']); ?>
						</div>
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<?php echo form_label('Harga', 'harga', array('class' => 'col-md-4 control-label-left')); ?>
						<div class="col-md-12">
							<?php echo form_input(['name' => 'harga', 'id' => 'harga','value'=>$detail->harga, 'class' => 'form-control input-sm', 'placeholder' => 'harga']); ?>
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
						</div>
						<div id="uploadPreviewExist">
						<?php foreach($foto as $data):?>
						<div style="position:relative;display:inline-block;">
						<img class="thumb" id="<?=$data['id']?>" src="<?php $url = str_replace("http://localhost/belanja","https://bobawangi.com/v2/",$data['url_image']); echo $url?>" height="120" style="position:relative;max-width:240px;"/>
						<a style="display: block; position: absolute;top: 0;right: 0; background: #2F2F2F; color: #FFF; border-radius: 4px;padding: 4px 9px;border: none;:hover {color: #AAA;}" onclick="hapus_gambar('<?=$data['url_image']?>','<?=$data['id']?>')">X</a>
						</div>
						
						<?php endforeach;?>
						</div>
						<div id="uploadPreview"></div>
					</div>
				</div>	
			</div>

			<div class="form-group btn-simpan">
				<?php echo form_label('', '', array('class' => 'col-md-2 control-label-left')); ?>
				<div class="col-md-2">
					<a class="btn btn-success btn-block" onclick="update();">Simpan</a>
					<!-- <button type="submit">submit</button> -->
				</div>
			</div>
		</form>
	</div>
</div>


<script>

	function reset_val() {
		$("#form_api_key")[0].reset();
	}

	function update(){
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/produk/update",
            data: $("#form_produk").serializeArray(),
            dataType: "JSON",
            success: function(response){
                if(response.success == true) {
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