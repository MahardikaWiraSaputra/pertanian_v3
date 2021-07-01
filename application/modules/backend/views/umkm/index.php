<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed');?>
<div class="row">
    <div class="col-lg-8 grid-margin">
        <div class="d-lg-flex align-items-baseline">
            <h5 class="text-dark mb-0">DATA UMKM</h5>
        </div>
    </div>
    <div class="col-lg-4 text-lg-right grid-margin">
        <div class="d-lg-flex justify-content-end pageheader-icons">
        	<span onclick="tambah();" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i>&nbsp; Tambah Data</span>
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

	    $.post(site+'backend/umkm/list_data', {
	        search_field: $('#search').val(),
	        status: $('#status').val(),
	        page: page
	        }, function(data) {
	        $("#content_items").html(data);
	    });
	}

	function tambah(){
  		ajax_modal('backend/umkm/tambah');
	}
</script>