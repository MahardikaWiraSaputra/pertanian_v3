<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Info Sertikat</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="card-title">Upload File Sertifikat</h4>
                <form id="form_upload" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input class="form-control" type="file" name="files" id="files">
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn" type="submit" id="uploads">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="result"></div>

</div>

<script src="<?php base_url();?>/assets/default/js/clipboard.js"></script>

<script>
    var clipboard = new ClipboardJS('.btn');

    clipboard.on('success', function(e) {
        toastr.remove();
        toastr['info']('data berhasil dicopy', '', {
            positionClass: 'toast-bottom-right'
        });
    });

    clipboard.on('error', function(e) {
        toastr.remove();
        toastr['info']('data gagal dicopy', '', {
            positionClass: 'toast-bottom-right'
        });
    }); 
</script>

<script>
    $(document).ready(function() {
        $('#form_upload').on('submit', function(e) {
            e.preventDefault();
            var form_data = new FormData($('#form_upload')[0]);

            if ($('#file_crt').val() == '') {
                alert("Please Select the File");
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>administrator/certs/uploads",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        console.log(form_data);
                        if (data.success == true) {
                            toastr.remove();
                            toastr['success'](data.message, '', {
                                positionClass: 'toast-bottom-right'
                            });
                            $('#result').html(data.result);
                            $("#form_upload")[0].reset();
                        } else {
                            toastr.remove();
                            toastr['error'](data.message, '', {
                                positionClass: 'toast-bottom-right'
                            });
                        }
                    }
                });
            }
        });
    });
</script>