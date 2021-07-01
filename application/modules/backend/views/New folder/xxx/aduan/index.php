<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Daftar Aduan</h4></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-border table-striped custom-table mb-0" id="datatable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No Ticket</th>
                            <th>Nama</th>
                            <th>Instansi</th>
                            <th>Telp</th>
                            <th>Tanggal</th>
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


<div id="confirm_delete" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center modal-hapus">
                <img src="<?php echo base_url();?>assets/default/img/sent.png" alt="" width="50" height="46">
                <h3>apakah anda yakin menghapus api key?</h3>
                <input type="hidden" name="nip" id="nip" value="">
                <div class="m-t-20"> 
                    <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="submit" id="btn_delete" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_tambah" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Api Key</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_tambah">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>User ID<span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="user_id" id="user_id">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Api Key</label>
                                <input class="form-control" type="text" name="api_key" id="api_key">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>URL DOMAIN</label>
                                <input class="form-control" type="text" name="url_domain" id="url_domain">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="text" name="password" id="password">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="api_key_activated" id="status_active" value="yes" checked>
                                    <label class="form-check-label" for="patient_active"> Active </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="api_key_activated" id="status_inactive" value="no">
                                    <label class="form-check-label" for="patient_inactive"> Inactive </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Sign Image</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <input class="form-control" type="file" name="imgapi" id="imgapi">
                                        <span class="form-text text-muted">Rekomendasi gambar 200px x 40px</span>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="img-thumbnail float-right"><img src="<?php echo base_url();?>uploads/img_api/default.png" class="img-fluid" alt="" width="100" height="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>

            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-primary submit-btn btn-center" id="btn_tambah">Simpan</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NIP <span class="text-danger">*</span></label>
                                <div class="profile-upload">
                                    <div class="nip-input">
                                        <input class="form-control" type="text" name="nip" id="edit_nip" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama" id="edit_nama">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" id="edit_email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No. Handphone <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="telp" id="edit_telp">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Unit Kerja</label>
                                <input class="form-control" type="text" name="unit" id="edit_unit">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Satuan Kerja</label>
                                <input class="form-control" type="text" name="satker" id="edit_satker">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <input type="text" class="form-control" name="kota" id="edit_kota">
                                    </div>
                                </div> 
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input type="text" class="form-control" name="provinsi" id="edit_provinsi">
                                    </div>
                                </div> 
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Negara</label>
                                        <input type="text" class="form-control" name="negara" id="edit_negara">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="patient_active" value="option1" checked>
                                    <label class="form-check-label" for="patient_active"> Active </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="patient_inactive" value="option2">
                                    <label class="form-check-label" for="patient_inactive"> Inactive </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>

            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-primary submit-btn btn-center" id="btn_update">Update</button>
            </div>

        </div>
    </div>
</div>


<script src="<?php echo base_url();?>assets/default/js/jquery-3.2.1.min.js"></script>

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
                    "url": "<?php echo base_url()?>administrator/aduan/get_data",
                    "type": "POST"
                },
            "deferRender": true,
            "aLengthMenu": [[15, 30, 50],[ 15, 30, 50]], // Combobox Limit
            "columns": [
                { "visible": false, "data": "id" },
                { "data": "no_ticket" },
                { "data": "nama" },
                { "data": "instansi" },
                { "data": "telp" },
                { "data": "submit_date" },
                { "data": "status" },
                { className:"text-right", "render": function ( data, type, row ) {
                        var html  = '<td class="text-right"><div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>'+
                                '<div class="dropdown-menu dropdown-menu-right">'+
                                '<a class="dropdown-item" id="data_update" href="#" data-id='+row.id+'><i class="fa fa-pencil m-r-5"></i> Edit</a>'+
                                '<a class="dropdown-item" id="data_delete" href="#" data-id='+row.id+'><i class="fa fa-trash-o m-r-5"></i> Delete</a>'+
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

   $(document).on("click", "#data_tambah", function() {
        $('#modal_tambah').modal('show');

        $('#user_id').on('change', function(e){
            var user_id = $('#user_id').val();
            if(user_id != ''){
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url()?>administrator/api/generate_api",
                    dataType : "JSON",
                    data : {user_id: user_id},
                    success: function(data){
                       $.each(data,function(user_id, api_key){
                           $('[name="api_key"]').val(data.api_key);
                       });
                    }
                });
            }
            return false;
        });
        

        $('#modal_tambah').on('click','#btn_tambah',function(e){
            e.preventDefault();
            
            var formData = new FormData($('#form_tambah')[0]);
    
            $.ajax({
                type: "POST",
                url  : "<?php echo base_url()?>administrator/api/tambah",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data){
                    $('#modal_tambah').modal('hide');
                    reload_table();
                }
            });
            return false;
        });

        $('#modal_tambah').on('hidden.bs.modal', function(e){
           $(this).find('#form_tambah')[0].reset();           
        });

    });



    //GET delete
    $('#datatable').on('click','#data_delete',function(){
        var nip = $(this).attr('data-id');
        $('#confirm_delete').modal('show');
        $('[name="nip"]').val(nip);

        $('#btn_delete').on('click',function(e){
            e.preventDefault();
            var nip = $('#nip').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>administrator/api/delete",
                data : {nip: nip},
                success: function(data){
                    $("#confirm_delete").modal('hide');
                    reload_table();
                }
            });
            return false;
        });
    });

    $('#datatable').on('click','#data_update',function(){
        var nip = $(this).attr("data-id");  
        $.ajax({  
            url:"<?php echo base_url(); ?>administrator/api/get_data_nip",  
            method:"POST",  
            data:{nip:nip},  
            dataType:"json",
            success:function(data){
                $('#modal_edit').modal('show');
                $('#edit_nip').val(data.nip);  
                $('#edit_nama').val(data.nama);
                $('#edit_email').val(data.email);
                $('#edit_telp').val(data.telp);
                $('#edit_unit').val(data.unit);
                $('#edit_satker').val(data.satker);
                $('#edit_kota').val(data.kota);
                $('#edit_provinsi').val(data.provinsi);
                $('#edit_negara').val(data.negara);
                $('#edit_status').val(data.status);
            }  
        });

        $('#modal_edit').on('click','#btn_update',function(e){
        // $('#btn_update').on('click', function(e){
            e.preventDefault();
            var nip = $('#edit_nip').val();
            var nama = $('#edit_nama').val();
            var email = $('#edit_email').val();
            var telp = $('#edit_telp').val();
            var unit = $('#edit_unit').val();
            var satker = $('#edit_satker').val();
            var kota = $('#edit_kota').val();
            var provinsi = $('#edit_provinsi').val();
            var negara = $('#edit_negara').val();
            var status = $('#edit_status').val();
    
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>administrator/api/update",
                data : {
                    nip:nip, 
                    nama:nama, 
                    email:email, 
                    telp:telp, 
                    unit:unit, 
                    satker:satker, 
                    kota:kota, 
                    provinsi:provinsi, 
                    negara:negara, 
                    status:status
                },
                success: function(data){
                    $("#modal_edit").modal('hide');
                    reload_table();
                }
            });
            return false;
        });

        $('#modal_edit').on('hidden.bs.modal', function(e){
           $(this).find('#form_edit')[0].reset();           
        });

      });



</script>

