<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed');?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">HASIL KUESIONER</h3>
					<div class="box-tools pull-right">
					</div>
				</div>
				<div class="box-body">
					<form class="form-horizontal" name="filterform" id="filterform">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-sm-4">
										<label class="control-label">KECEPATAN PELAYANAN</label>
									</div>
									<div class="col-sm-7">
										<?php echo form_dropdown('pelayanan', array('all'=>'Semua','4'=>'Sangat Cepat', '3'=>'Cepat','2'=>'Kurang Cepat', '1'=>'Tidak Cepat'), 'all', 'id="pelayanan" class="form-control select2" onchange="get_items()"')?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-4">
										<label class="control-label">KERAMAHAN PETUGAS</label>
									</div>
									<div class="col-sm-7">
										<?php echo form_dropdown( 'keramahan', array('all'=>'Semua','4'=>'Sangat Ramah', '3'=>'Ramah','2'=>'Kurang Ramah', '1'=>'Tidak Ramah'), 'all', 'id="keramahan" class="form-control select2" onchange="get_items()"')?>
									</div>
								</div>
							</div>	
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-sm-4">
										<label class="control-label">KETANGGAPAN PETUGAS</label>
									</div>
									<div class="col-sm-7">
										<?php echo form_dropdown( 'ketanggapan', array('all'=>'Semua','4'=>'Sangat Tanggap', '3'=>'Tanggap','2'=>'Kurang Tanggap', '1'=>'Tidak Tanggap'), 'all', 'id="ketanggapan" class="form-control select2" onchange="get_items()"')?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-4">
										<label class="control-label">KEPUASAN PELAYANAN</label>
									</div>
									<div class="col-sm-7">
										<?php echo form_dropdown( 'kepuasan', array('all'=>'Semua','4'=>'Sangat Puas', '3'=>'Puas','2'=>'Kurang Puas', '1'=>'Tidak Puas'), 'all', 'id="kepuasan" class="form-control select2" onchange="get_items()"')?>
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
  	get_items();
  	$(".select2").select2();

	var page = '1';
	function get_items(page){
	    var image_load = "<div class='ajax_loading'></div>";
	    $("#content_items").html(image_load);

	    $.post(site+'backend/kuesioner/list', {
	        pelayanan: $('#pelayanan').val(),
	  		keramahan: $('#keramahan').val(),
	        ketanggapan: $('#ketanggapan').val(),
	        kepuasan: $('#kepuasan').val(),
	        page: page
	        }, function(data) {
	        $("#content_items").html(data);
	    });
	}

</script>