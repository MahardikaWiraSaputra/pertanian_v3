<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">CEK SERTIFIKAT EXPIRED</h4></div>
        <div class="col-sm-8 col-9 text-right m-b-20"> <a href="#" class="btn btn btn-primary float-right" id="validity"><i class="fa fa-plus"></i> Cek</a></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-border table-striped custom-table mb-0" id="datatable">
                    <thead>
                        <tr>
                            <th></th>
                            <th style="width: 18px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="" id="checkall" name="checkall" value="1">
                                </div>
                            </th>
                            <th>Nama Lengkap</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>Instansi</th>
                            <th>Status</th>
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
    var tabel = null;
    $(document).ready(function() {
        tabel = $('#datatable').DataTable({
            "processing": false,
            "serverSide": true,
            "ordering": true,
            "order": [[ 0, 'desc' ]],
            "ajax":
                {
                    "url": "<?php echo base_url('administrator/validasi/get_data') ?>",
                    "type": "POST"
                },
            "deferRender": true,
            "aLengthMenu": [[50, 100],[50, 100]], // Combobox Limit
            "columns": [
                { "visible": false, "data": "id" },
                {    
                    sortable:false, "render": function ( data, type, row ) { 
                        var html  = '<div class="custom-control custom-checkbox">'+
                                    '<input type="checkbox" class="checkbox" name="nip" class="checklist" value="'+row.nip+'">'+
                                    '</div>'
                        return html
                    }
                },
                {   "width": "25%", 
                    "render": function ( data, type, row ) { 
                        if (row.tipe == '1') {
                                    var html  = '<a id="data_detail" href="#" data-id='+row.nip+'><img width="28" height="28" src="<?php echo base_url();?>assets/default/img/user_bsre.png" class="rounded-circle m-r-5" alt=""></a>'
                        } else {
                            var html  = '<a id="data_detail" href="#" data-id='+row.nip+'><img width="28" height="28" src="<?php echo base_url();?>assets/default/img/user_pemkab.png" class="rounded-circle m-r-5" alt=""></a>'
                        }
                        html += row.nama
                        return html
                    }
                },
                {"data": "nip" },
                {"data": "email" },
                {"width": "25%","data": "satker" },
                {"width": "5%", 
                    "render": function ( data, type, row ) { 
                        if (row.status == 'Aktif') {
                            var html  = '<span class="custom-badge status-green">Aktif</span>'
                        } else {
                            var html  = '<span class="custom-badge status-grey">Nonaktif</span>'
                        }
                        return html
                    }
                },
                { className:"text-right", "render": function ( data, type, row ) {
                        var html  = '<td class="text-right"><div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>'+
                                '<div class="dropdown-menu dropdown-menu-right">'+
                                '<a class="dropdown-item" id="data_update" href="#" data-id='+row.nip+'><i class="fa fa-pencil m-r-5"></i> Edit</a>'+
                                '<a class="dropdown-item" id="data_delete" href="#" data-id='+row.nip+'><i class="fa fa-trash-o m-r-5"></i> Delete</a>'+
                                '</div>'+
                                '</div>'+
                                '</td>'
                        return html
                    }
                },
            ],
        });

    });


    function reload_table(){
        $('#datatable').DataTable().ajax.reload();
    }

    $(document).ready(function(){
        $("#checkall").change(function(){
           var checked = $(this).is(':checked');
           if(checked) {
                $(".checkbox").each(function(){
                    $(this).prop("checked",true);
                });
            }
            else {
                $(".checkbox").each(function(){
                    $(this).prop("checked",false);
                });
            }
        });

        $(".checkbox").click(function(){
            if($(".checkbox").length == $(".checkbox:checked").length) {
                $("#checkall").prop("checked", true);
            } 
            else {
                $("#checkall").prop("checked",false);
            }

        });

        $('#validity').click(function(){
            var users_arr = [];
            $(".checkbox:checked").each(function(){
                var nip = $(this).val();
                users_arr.push(nip);
            });

            var length = users_arr.length;

            if(length > 0) {
                $.ajax({
                    url : "<?php echo base_url()?>administrator/validasi/check_expire",
                    type: 'POST',
                    data: {nip: users_arr},
                    success: function(data){
                        records = JSON.parse(data);
                        alert(data);
                        // for(var i=0;i<records.length;i++){
                        //     var tablink = records[i].url;
                        //     window.open(tablink, '_blank');  
                        // }
                        $(".checkbox:checked").each(function(){
                           var nip = $(this).val();
                           $('#tr_'+nip).remove();
                        });
                    }
                });
            }
        });
    });
   
</script>