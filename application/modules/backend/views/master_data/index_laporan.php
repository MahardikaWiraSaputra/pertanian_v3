<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed');?>
<div class="row">
    <div class="col-lg-8 grid-margin">
        <div class="d-lg-flex align-items-baseline">
            <h5 class="text-dark mb-0">LAPORAN TANAMAN PANGAN</h5>
        </div>
    </div>
    <div class="col-lg-4 text-lg-right grid-margin">
        <div class="d-lg-flex justify-content-end pageheader-icons">
        	<!-- <span onclick="tambah();" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i>&nbsp; Tambah Data</span> -->
        </div>
    </div>
</div>

<div class="row">
	<div class="col-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">FILTER DATA</h4>
				<form class="form-horizontal" name="filterform" id="filterform">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Kecamatan</label>
								<div class="col-sm-9">
									<?php echo form_dropdown('kecamatan', $filter_kecamatan, 'all', 'id="kecamatan", class="form-control select2", style="width:100%", onchange="get_items()"'); ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Komoditas</label>
								<div class="col-sm-9">
									<?php echo form_dropdown('komoditas', $filter_komoditas, 'all', 'id="komoditas", class="form-control select2", style="width:100%", onchange="get_items()"'); ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Bulan</label>
								<div class="col-sm-9">
									<?php echo form_dropdown('bulan', $filter_bulan, 'all', 'id="tahun", class="form-control select2", style="width:100%", onchange="get_items()"'); ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Tahun</label>
								<div class="col-sm-9">
									<?php echo form_dropdown('tahun', $filter_tahun, 'all', 'id="tahun", class="form-control select2", style="width:100%", onchange="get_items()"'); ?>
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
	<div class="col-12 grid-margin">
		<div class="card">
			<div class="card-body">
				<div id="content_items"></div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
  	get_items();
  	$(".select2").select2();

	var page = '1';
	function get_items(page){
	    var image_load = "<div class='ajax_loading'></div>";
	    $("#content_items").html(image_load);

	    $.post(site+'backend/pertanian/list_data_laporan', {
			bulan: $('#bulan').val(),
			kecamatan: $('#kecamatan').val(),
			komoditas: $('#komoditas').val(),
			tahun: $('#tahun').val(),
			bulan: $('#bulan').val(),
	        page: page
	        }, function(data) {
	        $("#content_items").html(data);
	    });
	}

	function tambah(){
		var title = 'Tambah Data';
		$('.modal-title').html(title);
  		ajax_modal('backend/pertanian/tambah');
	}
</script>