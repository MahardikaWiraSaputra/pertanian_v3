<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed');?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">EXTRACT INFO SERTIFIKAT</h3>
                    <div class="box-tools pull-right">
                    </div>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" id="form_cert_extract">
                        <div class="row">
                            <?php echo form_label('Sertifikat', 'sertifikat', array('class' => 'col-md-2 control-label-left')); ?>
                            <div class="col-md-10">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="file" name="files" id="files">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group btn-simpan">
                            <?php echo form_label('', '', array('class' => 'col-md-2 control-label-left')); ?>
                            <div class="col-md-2">
                                <a class="btn btn-success btn-block" onclick="extract();">Upload</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="result"></div>
        </div>
    </div>
</section>

<script>
    function extract(){
        var formData = new FormData($('#form_cert_extract')[0]);
        if ($('#files').val() == '')
        {
            alert("File tidak boleh kosong");
        } 
        else
        {
            $.ajax({
                type: "POST",
                url  : "<?php echo base_url()?>backend/cert_extract/extract",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(response){
                    if(response.success == true) {
                        swal({
                          title: 'Sukses',
                          text: response.message,
                          type: 'success',
                          padding: '2em',
                          showConfirmButton: false, 
                          timer: 1500
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                $('#result').html(response.result);
                            }
                        });
                    }
                    else {
                        swal({
                          title: 'Gagal',
                          text: response.message,
                          type: 'error',
                          padding: '2em',
                          showConfirmButton: false, 
                          timer: 1500
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                            }
                        });
                    }
                }
            });
        }
        return false;
    }

</script>