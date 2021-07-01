<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed');?>
<div class="page-title-box">
	<div class="row align-items-center">
		<div class="col-sm-6">
			<h4 class="page-title">Tanaman Pangan</h4>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-right">
				<li class="breadcrumb-item">
					<span onclick="tambah();" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i>&nbsp; Tambah Data</span>
				</li>
				<li class="breadcrumb-item">
					<span onclick="excel();" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus"></i>&nbsp; Upload Data</span>
				</li>
			</ol>
		</div>
	</div>
	<!-- end row -->
</div>

<div class="row">
	<div class="col-xl-12">
		<div class="card m-b-30">
			<div class="card-body">
				<h4 class="mt-0 header-title">Filter Data</h4>
				<p class="sub-title">Pilih filter untuk mencari data</p>
				<form class="form-horizontal" name="filterform" id="filterform">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Kecamatan</label>
								<div class="col-sm-9">
									<?php echo form_dropdown('kecamatan', $filter_kecamatan, $this->ion_auth->user()->row()->kecamatan, 'id="kecamatan", class="form-control", style="width:100%", onchange="get_items()"'); ?>
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
								<label class="col-sm-3 col-form-label">Sub Round</label>
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

	    $.post(site+'backend/pertanian/list_data', {
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

	function excel(){
		var title = 'Upload Data Excel';
		$('.modal-title').html(title);
  		ajax_modal_sm('backend/pertanian/excel');
	}
</script>