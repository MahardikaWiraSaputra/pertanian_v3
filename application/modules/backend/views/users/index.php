<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed');?>
<div class="page-title-box">
	<div class="row align-items-center">
		<div class="col-sm-6">
			<h4 class="page-title">Data Pengguna</h4>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-right">
				<li class="breadcrumb-item">
					<span onclick="tambah();" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i>&nbsp; Tambah Data</span>
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
				<p class="sub-title">Bootstrap includes six predefined button styles, each serving its own semantic purpose.</p>
				<form class="form-horizontal" name="filterform" id="filterform">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Status</label>
								<div class="col-sm-9">
									<?php echo form_dropdown( 'status', array('all'=>'Semua','yes'=>'Aktif', 'no'=>'Nonaktif'), 'all', 'id="status" class="form-control select2" onchange="get_items()"')?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Search</label>
								<div class="col-sm-9">
									<div class="input-group">
										<input type="text" name="search" value="" id="search" class="form-control" placeholder="Nama User">
										<div class="input-group-append">
											<button class="btn btn-sm btn-facebook" type="button"> <i class="mdi mdi-magnify"></i>
											</button>
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

	    $.post(site+'backend/users/list', {
	        search_field: $('#search').val(),
	        status: $('#status').val(),
	        page: page
	        }, function(data) {
	        $("#content_items").html(data);
	    });
	}

	function tambah(){
  		ajax_modal('backend/users/tambah');
	}
</script>