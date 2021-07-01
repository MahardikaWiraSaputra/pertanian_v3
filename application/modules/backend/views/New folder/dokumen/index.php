<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed');?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">DOKUMEN TTE</h3>
					<div class="box-tools pull-right">
					</div>
				</div>
				<div class="box-body">
					<form class="form-horizontal" name="filterform" id="filterform">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">INSTANSI</label>
									</div>
									<div class="col-sm-9">
										<?php echo form_dropdown('instansi', $get_instansi, 'all', 'id="instansi" class="form-control select2" onchange="get_satker(),get_items()"')?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">UNIT KERJA</label>
									</div>
									<div class="col-sm-9">
										<div id="filter_satker">
										<?php echo form_dropdown('satker', array('all'=>'Semua'), 'all', 'id="satker", class="form-control select2", style="width:100%", onchange="get_pengguna(),get_items()"'); ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">PENGGUNA</label>
									</div>
									<div class="col-sm-9">
										<div id="filter_pengguna">
										<?php echo form_dropdown('pengguna', array('all'=>'Semua'), 'all', 'id="pengguna", class="form-control select2", style="width:100%", onchange="get_items()"'); ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">RENTANG WAKTU</label>
									</div>
									<div class="col-sm-9">
										<?php echo form_dropdown('waktu', array('all'=>'Semua','today'=>'Hari ini', 'last_day'=>'Kemarin','last_week'=>'Seminggu Terakhir', 'last_month'=>'Sebulan Terakhir', 'last_year'=>'Setahun Terakhir'), 'all', 'id="waktu" class="form-control select2" onchange="get_items()"')?>
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
											<input type="text" name="search" value="" id="search" class="form-control input-sm" placeholder="NIP / NAMA">
											<div class="input-group-btn">
												<button type="button" class="btn btn-info btn-flat" onchange="get_items()" onclick="get_items()">CARI</button>
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
		load('backend/dokumen/get_satker/'+id, '#filter_satker');
	}

	var page = '1';
	function get_items(page){
	    var image_load = "<div class='ajax_loading'></div>";
	    $("#content_items").html(image_load);

	    $.post(site+'backend/dokumen/list', {
	        search_field: $('#search').val(),
	  		instansi: $('#instansi').val(),
	  		satker: $('#satker').val(),
	        pengguna: $('#pengguna').val(),
	        waktu: $('#waktu').val(),
	        page: page
	        }, function(data) {
	        $("#content_items").html(data);
	    });
	}

</script>