<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive mailbox-messages">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th rowspan="2" class="text-center" width="50">NO</th>
            <th rowspan="2" class="text-center">KOMODITAS</th>
            <th rowspan="2" class="text-center">BULAN/TAHUN</th>
            <th rowspan="2" class="text-center">KETERSEDIAAN PRODUKSI (TON)</th>
            <th rowspan="2" class="text-center">KEBUTUHAN PER BULAN</th>
            <th rowspan="2" class="text-center">NERACA BULANAN (TON)</th>
            <th rowspan="2" class="text-center">KETERANGAN</th>
            <th colspan="4" class="text-center">HARGA MINGGUAN</th>
          </tr>
          <tr>
            <th class="text-center">I</th>
            <th class="text-center">II</th>
            <th class="text-center">III</th>
            <th class="text-center">IV</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">1</td>
            <td class="text-center">BERAS</td>
            <td class="text-center">JANUARI-2021</td>
            <td class="text-center">21.903,91</td>
            <td class="text-center">12.825,48</td>
            <td class="text-center">9.078,43</td>
            <td class="text-center"><button type="button" class="btn btn-outline-success btn-sm btn-stok">DEFISIT</button></td>
            <td class="text-center">10.200</td>
            <td class="text-center">10.200</td>
            <td class="text-center">10.200</td>
            <td class="text-center">10.500</td>
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



<!-- <?php $total_page = ( $total_items / $limit)+1; if ($total_page < 1){ $total_page='1' ; } ?> -->
<script>
	// $('#show_paginator').bootpag({
	// page : <?php echo $page?>,
	// total: <?php echo $total_page ?>,
	// maxVisible: 5
	// }).on("page", function(event, num){
	// 	var n = num;
	// 	$(".page").html("Page " + num);
	// 	get_items(n);
	// });

    function edit(id){
        ajax_modal('backend/neraca/edit/'+id);
    }

    function hapus(id) {
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
                    url  : "<?php echo base_url()?>backend/api_key/delete/"+id,
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