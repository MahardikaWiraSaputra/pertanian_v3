 <div class="content">
    <div class="row" style="margin-bottom: 70px;">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget"> <span class="dash-widget-bg1"><i class="fa fa-users" aria-hidden="true"></i></span>
                <div class="dash-widget-info text-right">
                    <h3><?php echo $jml_pengguna; ?></h3> <span class="widget-title1"> Total Sertifikat <i class="fa fa-check" aria-hidden="true"></i></span></div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget"> <span class="dash-widget-bg2"><i class="fa fa-key"></i></span>
                <div class="dash-widget-info text-right">
                    <h3><?php echo $jml_cert_bsre; ?></h3> <span class="widget-title2"> Sertifikat BSrE <i class="fa fa-check" aria-hidden="true"></i></span></div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget"> <span class="dash-widget-bg4"><i class="fa fa-key" aria-hidden="true"></i></span>
                <div class="dash-widget-info text-right">
                    <h3><?php echo $jml_cert_pemkab; ?></h3> <span class="widget-title4"> Sertifikat Lokal <i class="fa fa-check" aria-hidden="true"></i></span></div>
            </div>
        </div>        
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="dash-widget"> <span class="dash-widget-bg3"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
                <div class="dash-widget-info text-right">
                    <h3><?php echo $jml_document; ?></h3> <span class="widget-title3"> Documents <i class="fa fa-check" aria-hidden="true"></i></span></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 col-md-6 col-lg-8 col-xl-8">
            <div class="card last-docs">
                <div class="card-header">
                    <h4 class="card-title d-inline-block">Dokumen Hari Ini</h4> <a href="<?php echo base_url('administrator/documents/') ?>" class="btn btn-primary float-right">Lihat Semua</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 new-patient-table">
                            <tbody id="show_data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-4">
            <div class="card user-panel">
                <div class="card-header bg-white">
                    <h4 class="card-title mb-0">Pengguna TTE</h4>
                </div>
                <div class="card-body">
                    <div class="bar-chart">
                            <div class="chart clearfix" id="show_apis">

                            </div>
                    </div>
                </div>
                <div class="card-footer text-center bg-white"> <a href="#" class="text-muted" id="show_statistik">Lihat Statistik</a></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalStatistik" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Statistik Pengguna TTE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
							<div class="card-header float-right">
								<span class="float-right">
							        <div class="dropdown action-label">
                                        <a class="custom-badge status-purple dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Semua Dokumen</a>
                                        <div class="dropdown-menu dropdown-menu-right" >
                                            <a class="dropdown-item" href="#" id="filter" data-id="all">Semua Dokumen</a>
                                            <a class="dropdown-item" href="#" id="filter" data-id="daily">Dokumen Hari Ini</a>
                                            <a class="dropdown-item" href="#" id="filter" data-id="weekly">Dokumen Minggu Ini</a>
                                        </div>
                                    </div>
								</span>
			                </div>
                            <div class="card-body sticky-container">
                                <div class="table-responsive">
                                    <table class="table mb-0 new-patient-table">
                                        <thead>
                                            <tr>
                                                <td class="text-left">NO</td>
                                                <td>INSTANSI</td>
                                                <td class="text-right">TOTAL DOKUMEN</td>
                                            </tr>
                                        </thead>
                                        <tbody id="data_tte">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="modal-footer text-center">
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        tampil_last_docs();
        tampil_top_tte();
         
        function tampil_last_docs(){
            $.ajax({
                type  : "ajax",
                url   : "<?php echo base_url('administrator/dashboard/list_data') ?>",
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += 
                        '<tr>'+
                            '<td style="min-width: 200px;">'+
                                '<a class="avatar" href="'+data[i].files_url+'" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>'+
                                '<h2><a href="'+data[i].files_url+'" target="_blank">'+data[i].nama+ '<span>'+data[i].nip+'</span></a></h2>'+
                            '</td>'+
                            '<td>'+
                                '<h5 class="time-title p-0">'+data[i].satker+'</h5>'+
                                '<p>'+data[i].url_domain+'</p>'+
                            '</td>'+
                            '<td>'+
                                '<h5 class="time-title p-0">Tanggal</h5>'+
                                '<p>'+data[i].tgl_created+'</p>'+
                            '</td>'+
                            '<td class="text-right">'+
                                '<a href="'+data[i].files_url+'" target="_blank" class="btn btn-outline-primary take-btn">File</a>'
                            '</td>'
                        '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }

        function tampil_top_tte(){
            $.ajax({
                type  : "ajax",
                url   : "<?php echo base_url('administrator/dashboard/top_tte') ?>",
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += 
                        '<div class="item">'+
                            '<div class="bar">'+
                                '<span class="percent">'+data[i].total_satker+'</span>'+
                                '<div class="item-progress" data-percent="'+data[i].total_satker+'" style="width:'+data[i].total_satker / data[i].total_all *100+'%">'+
                                    '<span class="title">'+data[i].satker+'</span>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    }
                    $('#show_apis').html(html);
                }
 
            });
        }

        function get_data_all(){
        	$.ajax({
                type  : "ajax",
                url   : "<?php echo base_url('administrator/dashboard/statistik_tte') ?>",
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += 
                        '<tr>'+
                            '<td class="text-left">'+(i + 1)+'</td>'+
                            '<td>'+data[i].satker+'</td>'+
                            '<td class="text-right">'+data[i].total_satker+'</td>'+
                        '</tr>';
                    }
                    $('#data_tte').html(html);
                }
            });
        }

        $(document).on("click", "#show_statistik", function() {
            $('#modalStatistik').modal('show');
            get_data_all();

            $('#modalStatistik').on('click','#filter',function(){
            	var filter_data = $(this).attr('data-id');

	            $.ajax({
	                type  : "ajax",
	                url   : "<?php echo base_url('administrator/dashboard/statistik_tte') ?>",
	                async : false,
	                method:"POST",  
            		data:{filter:filter_data},  
	                dataType : 'json',
	                success : function(data){
	                    var html = '';
	                    var i;
	                    for(i=0; i<data.length; i++){
	                        html += 
	                        '<tr>'+
	                            '<td class="text-left">'+(i + 1)+'</td>'+
	                            '<td>'+data[i].satker+'</td>'+
	                            '<td class="text-right">'+data[i].total_satker+'</td>'+
	                        '</tr>';
	                    }
	                    $('#data_tte').html(html);
	                }
	            });

        	});
        });
 
    }); 
</script>