<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed');?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">PENGGUNA SERTIFIKAT</h3>
					<div class="box-tools pull-right">
						<span onclick="tambah();" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i>&nbsp; Tambah Data</span>
					</div>
				</div>
				<div class="box-body">
					<form class="form-horizontal" name="filterform" id="filterform">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<div class="col-sm-4">
										<label class="control-label">INSTANSI</label>
									</div>
									<div class="col-sm-8">
										<?php echo form_dropdown('fil_instansi', $get_instansi, 'all', 'id="fil_instansi" class="form-control select2" onchange="get_satker(),get_items()"')?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-4">
										<label class="control-label">UNIT KERJA</label>
									</div>
									<div class="col-sm-8">
										<div id="filter_satker">
										<?php echo form_dropdown('fil_satker', array('all'=>'Semua'), 'all', 'id="fil_satker", class="form-control select2", style="width:100%", onchange="get_items()"'); ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="col-sm-4">
										<label class="control-label">SERTIFIKAT</label>
									</div>
									<div class="col-sm-8">
										<?php echo form_dropdown('fil_tipe', array('all'=>'Semua', '1'=>'Balai Sertifikasi Elektronik', '2'=>'Pemerintah Kabupaten Banyuwangi'), 'all', 'id="fil_tipe" class="form-control select2" onchange="get_items()"')?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-4">
										<label class="control-label">STATUS</label>
									</div>
									<div class="col-sm-8">
										<?php echo form_dropdown('fil_status', array('all'=>'Semua','Aktif'=>'Aktif', 'Nonaktif'=>'Nonaktif'), 'all', 'id="fil_status" class="form-control select2" onchange="get_items()"')?>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">PENCARIAN</label>
									</div>
									<div class="col-sm-9">
										<div class="input-group input-group-sm">
											<input type="text" name="fil_search" value="" id="fil_search" onchange="get_items()" class="form-control input-sm" placeholder="NIP / NAMA">
											<div class="input-group-btn">
												<button type="button" class="btn btn-info btn-flat" onclick="get_items()">CARI</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div id="content_items"></div>
		</div>
	</div>
</section>
<script type="text/javascript">
	get_satker();
  	get_items();
  	$(".select2").select2();

	function get_satker(){
		var id = $('select[id="instansi"]').val();
		$("#filter_satker").html('<i class="fa fa-refresh fa-spin"></i>');
		load('backend/pengguna/get_satker/'+id, '#filter_satker');
	}

	function tambah(){
  		ajax_modal('backend/pengguna/tambah');
	}

	var page = '1';
	function get_items(page){
	    var image_load = "<div class='ajax_loading'></div>";
	    $("#content_items").html(image_load);

	    $.post(site+'backend/pengguna/list', {
	        search_field: $('#fil_search').val(),
	  		instansi: $('#fil_instansi').val(),
	  		satker: $('#fil_satker').val(),
	        status: $('#fil_status').val(),
	        tipe: $('#fil_tipe').val(),
	        page: page
	        }, function(data) {
	        $("#content_items").html(data);
	    });
	}

</script>