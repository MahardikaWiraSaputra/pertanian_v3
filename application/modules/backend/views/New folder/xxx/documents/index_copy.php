<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Documents</h4></div>
    </div>
    <div class="row filter-row">
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-12">
            <div class="form-group form-focus">
                <label class="focus-label">Kata Kunci</label>
                <input type="text" class="form-control floating" id="search_key">
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
            <div class="form-group form-focus select-focus focused">
                <label class="focus-label">Satuan Kerja</label>
                <select class="select floating" id="filter_instansi">
                    <option>THL Dinas Komunikasi, Informatika dan Persandian</option>
                    <option>Dinas Komunikasi, Informatika dan Persandian</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-border table-striped custom-table mb-0" id="datatable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Pengguna</th>
                            <th>Satuan Kerja</th>
                            <th>APIs</th>
                            <th class="text-center">Tanggal Dibuat</th>
                            <th class="text-center">File Documents</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        tabel = $('#datatable').DataTable({
            "searching": false,
            "info": false,
            "lengthChange": false,
            "paging": true,
            "processing": false,
            "serverSide": true,
            "ordering": true,
            "order": [[ 0, 'desc' ]],
            "ajax":
                {
                    "url": "<?php echo base_url('administrator/documents/get_documents') ?>",
                    "type": "POST",
                    "data": function(data) {
                        data.filterInstansi = $('#filter_instansi').val();
                        data.searchKey = $('#search_key').val();
                    }
                },
            "deferRender": true,
            "aLengthMenu": [[25, 50, 100],[25, 50, 100]], // Combobox Limit
            "columns": [
                { "visible": false, "data": "id_documents" },
                { "render": function ( data, type, row ) { 
                        var html = 
                        '<a class="avatar" href="'+row.files_url+'" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>'+
                        '<h2>'+row.nama+ '<span>'+row.pengguna+'</span></h2>'
                        return html
                    }
                },
                { "data": "satker" },
                { "render": function ( data, type, row ) { 
                        var html = 
                            '<h5 class="time-title p-0">'+row.user_id+'</h5>'+
                            '<p>'+row.url_domain+'</p>'
                        return html
                    }
                },
                { className:"text-center", "data": "tgl_created" },
                { className:"text-center","render": function ( data, type, row ) { 
                        var html = '<a href="'+row.files_url+'" target="_blank" class="btn btn-outline-primary take-btn">Lihat File</a>'
                        return html
                    }
                },
                { className:"text-right", "render": function ( data, type, row ) {
                        var html  = '<td class="text-right"><div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>'+
                                '<div class="dropdown-menu dropdown-menu-right">'+
                                '<a class="dropdown-item" id="data_delete" href="#" data-id='+row.pengguna+'><i class="fa fa-trash-o m-r-5"></i> Delete</a>'+
                                '</div>'+
                                '</div>'+
                                '</td>'
                        return html
                    }
                },
            ],
        });

        $('#filter_instansi').change(function(){
            tabel.draw();
        });
        $('#search_key').keyup(function(){
            tabel.draw();
        });
        // $("#paginations").append($(".dataTables_paginate"));

    });


    function reload_table(){
        $('#datatable').DataTable().ajax.reload();
    }


</script>

