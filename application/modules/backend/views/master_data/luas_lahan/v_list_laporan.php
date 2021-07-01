<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive mailbox-messages">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th rowspan="2" >KECAMATAN</th>
            <th colspan="3" class="text-center">SUB ROUND I (JANUARI-APRIL)</th>
            <th colspan="3" class="text-center">SUB ROUND 2 (MEI-AGUSTUS)</th>
            <th colspan="3" class="text-center">SUB ROUND 3 (SEPTEMBER-OKTOBER)</th>
          </tr>
          <tr>
            <th>PROVITAS</th>
            <th>LUAS PANEN</th>
            <th>PRODUKTIVITAS</th>
            <th>PROVITAS</th>
            <th>LUAS PANEN</th>
            <th>PRODUKTIVITAS</th>
            <th>PROVITAS</th>
            <th>LUAS PANEN</th>
            <th>PRODUKTIVITAS</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="">
             PESANGARAN
            </td>
            <td class="">71.54</td>
            <td class="">533</td>
            <td class="">3956</td>
            <td class="">71.54</td>
            <td class="">533</td>
            <td class="">3956</td>
            <td class="">71.54</td>
            <td class="">533</td>
            <td class="">3956</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="row mt-5">
  <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="d-flex justify-content-between">
            <button class="btn btn-sm btn-outline-info"><span class="btn-label"></span> <b>JUMLAH DATA </b></button>
            <div class="paginating-container pagination-default">
                <div id="show_paginator" align="center"></div>
            </div>
        </div>
    </div>
</div>




<script>


    function edit(kategori,tahun){
        ajax_modal('backend/pertanian/edit/'+kategori+'/'+tahun);
    }

    function hapus(kategori,tahun) {
        swal({
            title: 'Anda yakin menghapus data?',
            text: "Data tidak dapat dikembalikan lagi!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            padding: '2em'
        }).then(function(result){
            if (result.value) {
                $.ajax({
                    url  : "<?php echo base_url()?>backend/pertanian/delete/"+kategori+'/'+tahun,
                    dataType: "JSON",
                    type: "POST",
                    success: function(response){
                        if(response.success == true) {
                            swal({
                              title: 'Sukses',
                              text: "Data berhasil dihapus",
                              type: 'success',
                              padding: '2em',
                              showConfirmButton: false, 
                              timer: 1500
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    get_items();
                                }
                            });
                        }
                        else {
                            swal({
                              title: 'Gagal',
                              text: "Data tidak dapat dihapus",
                              type: 'error',
                              padding: '2em',
                              showConfirmButton: false, 
                              timer: 1500
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    get_items();   
                                }
                            });
                        }
                    }
                });
            } 
            else if ( result.dismiss === swal.DismissReason.cancel ) {
                swal({
                  title: 'Hapus dibatalkan',
                  text: "Data tidak jadi dihapus",
                  type: 'error',
                  padding: '2em',
                  showConfirmButton: false, 
                  timer: 1500
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                    }
                });
            }
        })
    }

</script>