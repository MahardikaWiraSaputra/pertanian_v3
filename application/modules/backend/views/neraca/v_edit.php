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
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('TAHUN', 'TAHUN', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<input type="hidden" value="<?=$detail->id?>" id="id" name="id">
								<?php echo form_dropdown('tahun', $filter_tahun,$detail->tahun, 'id="tahun_filter", class="form-control select2"'); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php echo form_label('BULAN', 'bulan', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_dropdown('bulan', $filter_bulan,$detail->bulan, 'id="bulan_filter", class="form-control select2"'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('Komoditas', 'komoditas', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_dropdown('komoditas', $filter_komoditas,$detail->komoditas, 'id="komoditas_filter", class="form-control select2"'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('Minggu ke', 'komoditas', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<select name="minggu_ke" class="form-control" id="minggu_ke">
									<option value="1" <?php if($detail->minggu == '1'){ echo 'selected';}?>>Minggu 1</option>
									<option value="2" <?php if($detail->minggu == '2'){ echo 'selected';}?>>Minggu 2</option>
									<option value="3" <?php if($detail->minggu == '3'){ echo 'selected';}?>>Minggu 3</option>
									<option value="4" <?php if($detail->minggu == '4'){ echo 'selected';}?>>Minggu 4</option>
									<option value="5" <?php if($detail->minggu == '5'){ echo 'selected';}?>>Minggu 5</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<table id="main-table" class="table table-bordered table-hover table-condensed mb-4">
								<thead>
								<tr>
									<th class="text-center">PRODUKSI</th>
									<th class="text-center">KETERSEDIAAN PER MINGGU (TON)</th>
									<th class="text-center">KEBUTUHAN PER MINGGU(TON)</th>
									<th class="text-center">NERACA MINGGUAN (SURPLUS/DEFISIT)(TON)
									</th>
									<th class="text-center">HARGA KONSUMEN 
									(RP per kg/liter)
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['value'=>$detail->produksi,'name' => 'produksi', 'id' => 'produksi', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['value'=>$detail->ketersediaan,'name' => 'ketersediaan', 'id' => 'ketersediaan', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['value'=>$detail->kebutuhan,'name' => 'kebutuhan', 'id' => 'kebutuhan', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['value'=>$detail->neraca,'name' => 'neraca', 'id' => 'neraca', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['value'=>$detail->harga,'name' => 'harga_konsumen', 'id' => 'harga_konsumen', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
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
        // $(".select2").select2();
		setTimeout(function(){
			hitung(); //clear above interval after 5 seconds
		},3000);
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
				url  : "<?php echo base_url()?>backend/pertanian/get_sub/"+id,
				success: function(response){
					$('#here_sub').html(response);
				}
			});
    	});
    });

	function reset_val() {
		$("#form_api_key")[0].reset();
	}

	setTimeout(function(){
			hitung(); //clear above interval after 5 seconds
	},3000);

	function hitung(){
		var a;
		var b;
		a = $('#ketersediaan').val();
		b = $('#kebutuhan').val();
		var c = a - b;
		$('#neraca').val(c);
	}
	
	function simpan(){
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/neraca/simpan",
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