<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Pengguna</h4></div>
        <div class="col-sm-8 col-9 text-right m-b-20"> <a href="#" class="btn btn btn-primary float-right" id="data_tambah"><i class="fa fa-plus"></i> Tambah Pengguna</a></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-border table-striped custom-table mb-0" id="datatable">
                    <thead>
                        <tr>
                            <th></th>
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


<div id="confirm_delete" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center modal-hapus">
                <img src="<?php echo base_url();?>assets/default/img/sent.png" alt="" width="50" height="46">
                <h3>apakah anda yakin menghapus pengguna?</h3>
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
                <h5 class="modal-title">Tambah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_tambah">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group" id="tipe_cert">
                                <label class="display-block"></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipe" value="1" checked="">
                                    <label class="form-check-label">
                                    Sertifikat BSrE
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipe" value="2">
                                    <label class="form-check-label">
                                    Sertifikat Pemkab
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NIP <span class="text-danger">*</span></label>
                                <div class="profile-upload">
                                    <div class="nip-input">
                                        <input class="form-control" type="text" name="nip" id="nonip">
                                    </div>
                                    <div class="nip-img" > 
                                        <img id="search_nip" src="<?php echo base_url();?>assets/default/img/reload.png">
                                        <img id="wait" src="<?php echo base_url();?>assets/default/img/loading.gif" style="display:none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama" id="nama">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Unit Kerja</label>
                                <input class="form-control" type="text" name="unit" id="unit">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Satuan Kerja</label>
                                <input class="form-control" type="text" name="satker" id="satker">
                            </div>
                        </div>                        

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <input type="text" class="form-control" name="kota" id="kota">
                                    </div>
                                </div> 
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input type="text" class="form-control" name="provinsi" id="provinsi">
                                    </div>
                                </div> 
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Negara</label>
                                        <input type="text" class="form-control" name="negara" id="negara">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phasphrase </label>
                                <input class="form-control" type="password" name="phasphrase" id="phasphrase">
                            </div>
                        </div>

                        <div style="display: none;" id="form_2" class="sert"></div>
                        <div class="row col-sm-12" id="form_1" class="sert">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sertifikat</label>
                                <div class="profile-upload">
                                    <div class="upload-img"> <img alt="" src="<?php echo base_url();?>assets/default/img/file-certificate.png"></div>
                                    <div class="upload-input">
                                        <input type="file" class="form-control" name="cert" id="cert">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Key</label>
                                <div class="profile-upload">
                                    <div class="upload-img"> <img alt="" src="<?php echo base_url();?>assets/default/img/file-key.png"></div>
                                    <div class="upload-input">
                                        <input type="file" class="form-control" name="key" id="key">
                                    </div>
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
                                        <input class="form-control" type="text" name="nip" id="edit_nip" >
                                    </div>
                                    <div class="nip-img" > 
                                        <img id="search_nip" src="<?php echo base_url();?>assets/default/img/reload.png">
                                        <img id="wait" src="<?php echo base_url();?>assets/default/img/loading.gif" style="display:none;">
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
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" id="edit_email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="edit_status" value="Aktif">
                                    <label class="form-check-label" for="patient_active"> Aktif </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="edit_status" value="Nonaktif">
                                    <label class="form-check-label" for="patient_inactive"> Nonaktif </label>
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


<div class="modal fade" id="modal_detail" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Certificate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Certificate</label>
                                <textarea class="form-control" id="detail_crt" rows="8">Certifacate</textarea>
                            </div>
                            <div>
                                <a id="url_crt" target="_blank" class="btn btn-outline-primary take-btn">Download File</a>
                            </div>                            
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Private Key</label>
                                <textarea class="form-control" id="detail_pkey" rows="8">Private Key</textarea>
                            </div>
                            <div>
                                <a id="url_key" target="_blank" class="btn btn-outline-primary take-btn">Download File</a>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 30px;">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Certificate + Private Key</label>
                                <textarea class="form-control" id="detail_crtkey" rows="8">Certificate + Private Key</textarea>
                            </div>
                        </div>
                    </div>                    
                </form>

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
                    "url": "<?php echo base_url('administrator/pengguna/get_data') ?>",
                    "type": "POST"
                },
            "deferRender": true,
            "aLengthMenu": [[15, 30, 50],[ 15, 30, 50]], // Combobox Limit
            "columns": [
                { "visible": false, "data": "id" },
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
                { "data": "nip" },
                { "data": "email" },
                { "width": "25%","data": "satker" },
                {   "width": "5%", 
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

   $(document).on("click", "#data_tambah", function() {
        $('#modal_tambah').modal('show');

        $('#search_nip').on('click', function(e){
            $(document).ajaxStart(function(){
                $("#search_nip").css("display", "none");
                $("#wait").css("display", "block");
            });
        
            $(document).ajaxComplete(function(){
                $("#search_nip").css("display", "block");
                $("#wait").css("display", "none");
            });

            var nip = $('#nonip').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('administrator/pengguna/get_nip')?>",
                dataType : "JSON",
                data : {nip: nip},
                cache:false,
                success: function(data){
                   $.each(data,function(nip, nama, satker){
                       $('[name="nama"]').val(data.nama);
                       $('[name="satker"]').val(data.satker);
                       $('[name="unit"]').val('Pemerintah Kabupaten Banyuwangi');
                       $('[name="kota"]').val('Banyuwangi');
                       $('[name="provinsi"]').val('Jawa Timur');
                       $('[name="negara"]').val('ID');
                   });
                }
            });
            return false;
        });
        
        $(document).ready(function() {
            $("input[name$='tipe']").click(function() {
                var sertifikat = $(this).val();
                $("#form_1").hide();
                $("#form_" + sertifikat).show();
            });
        });


        $('#modal_tambah').on('click','#btn_tambah',function(e){
            e.preventDefault();
            
            var formData = new FormData($('#form_tambah')[0]);
    
            $.ajax({
                type: "POST",
                url  : "<?php echo base_url()?>administrator/pengguna/tambah",
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
                url  : "<?php echo base_url()?>administrator/pengguna/delete",
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
            url:"<?php echo base_url(); ?>administrator/pengguna/get_data_nip",  
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
                if (data.status == 'Aktif') { $("input[name=status][value=Aktif]").prop('checked', true); }
                else { $("input[name=status][value=Nonaktif]").prop('checked', true); }
            }  
        });


        $('#modal_edit').on('click','#search_nip',function(e){
        // $('#search_nip').on('click', function(e){
            $(document).ajaxStart(function(){
                $("#search_nip").css("display", "none");
                $("#wait").css("display", "block");
            });
        
            $(document).ajaxComplete(function(){
                $("#search_nip").css("display", "block");
                $("#wait").css("display", "none");
            });

            var nip = $('#edit_nip').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('administrator/pengguna/get_nip')?>",
                dataType : "JSON",
                data : {nip: nip},
                cache:false,
                success: function(data){
                   $.each(data,function(nip, nama, satker){
                       $('[name="nama"]').val(data.nama);
                       $('[name="satker"]').val(data.satker);
                   });
                }
            });
            return false;
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
            var status = $("input[name='status']:checked").val();
    
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>administrator/pengguna/update",
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


        //GET Detail
    $('#datatable').on('click','#data_detail',function(){
        var nip = $(this).attr("data-id");  
        $.ajax({  
            url:"<?php echo base_url(); ?>administrator/pengguna/get_data_crt",  
            method:"POST",  
            data:{nip:nip},  
            dataType:"json",
            success:function(data){
                $('#modal_detail').modal('show');
                $('#url_crt').prop("href", data.crturl );
                $('#url_key').prop("href", data.keyurl );
                $('#detail_crt').val(data.crt);  
                $('#detail_pkey').val(data.key);  
                $('#detail_crtkey').val(data.crtkey);  

            }  
        });


      });



</script>

