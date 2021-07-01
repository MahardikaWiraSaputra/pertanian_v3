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
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('KECAMATAN', 'kecamatan', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_dropdown('kecamatan', $filter_kecamatan,$detail->kecamatan, 'id="kecamatan_filter", class="form-control select2",onchange="get_desa()"'); ?>
							</div>
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('Komoditas', 'komoditas', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_dropdown('nama_tanaman', $filter_komoditas,$detail->nama_tanaman, 'id="komoditas_filter", class="form-control select2"'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php echo form_label('Hasil Produksi yang Dicatat', 'hasil_produksi', array('class' => 'col-md-12 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_input(['name' => 'hasil_produksi','value'=>$detail->hasil_produksi, 'id' => 'hasil_produksi', 'class' => 'form-control input-sm', 'placeholder' => 'Hasil Produksi yang Dicatat']); ?>
							</div>
						</div>	
					</div>	
				</div>
				<div class="row">
					<div class="col-md-12">
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
							<?php echo form_label('bulan', 'bulan', array('class' => 'col-md-4 control-label-left')); ?>
							<div class="col-md-12">
								<?php echo form_dropdown('bulan', $filter_bulan,$detail->bulan, 'id="bulan_filter", class="form-control select2"'); ?>
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
									<th class="text-center" rowspan="2">Luas Tanaman Akhir Bulan Lalu</th>
									<th class="text-center" colspan="2">Luas Panenan (Hektar)</th>
								</tr>
								<tr>
									<th class="text-center">Habis/Dibongkar</th>
									<th class="text-center">Belum Habis</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'luas_tanaman_akhir_bulan_lalu','value'=>$detail->luas_tanaman_bulan_lalu, 'id' => 'luas_tanaman_akhir_bulan_lalu', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'luas_panen_habis_dibongkar','value'=>$detail->luas_panen_habis_dibongkar, 'id' => 'luas_panen_habis_dibongkar', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'luas_panen_belum_habis','value'=>$detail->luas_panen_belum_habis, 'id' => 'luas_panen_belum_habis', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<table id="main-table" class="table table-bordered table-hover table-condensed mb-4">
								<thead>
								<tr>
									<th class="text-center" rowspan="2">Luas Rusak/Tidak Berhasil/Puso (Hektar)</th>
									<th class="text-center" rowspan="2">Luas Penanaman Baru / Tambah Tanam( Hektar )
									</th>
									<th class="text-center" rowspan="2">Luas Tanaman Akhir Bulan Laporan (Hektar) </th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'luas_rusak_tidak_berhasil','value'=>$detail->luas_rusak_tidak_berhasil, 'id' => 'luas_rusak_tidak_berhasil', 'class' => 'form-control input-sm', 'placeholder' => 'nilai']); ?></td>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'luas_penambahan_baru','value'=>$detail->luas_penambahan_baru, 'id' => 'luas_penambahan_baru', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'luas_tanaman_akhir_bulan','value'=>$detail->luas_tanaman_akhir_bulan, 'id' => 'luas_tanaman_akhir_bulan', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<table id="main-table" class="table table-bordered table-hover table-condensed mb-4">
								<thead>
								<tr>
									<th class="text-center" colspan="2">Produksi (Kwintal)</th>
									<th class="text-center" rowspan="2">Rata rata harga jual di petani</th>
								</tr>
								<tr>
									<th class="text-center">Habis/Dibongkar</th>
									<th class="text-center">Belum Habis</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi_panen','value'=>$detail->produksi_panen, 'id' => 'produksi_panen', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'produksi_belum_habis','value'=>$detail->produksi_belum_habis, 'id' => 'produksi_belum_habis', 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
									<td class="text-center" style="font-weight: bold"><?php echo form_input(['name' => 'harga_jual', 'id' => 'harga_jual','value'=>$detail->harga_jual, 'class' => 'form-control input-sm', 'placeholder' => '']); ?></td>
									<input type="hidden" value="<?=$detail->id?>" id="param" name="param">
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
        $(".select2").select2();
		get_desa();
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
            url  : "<?php echo base_url()?>backend/horti/update",
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