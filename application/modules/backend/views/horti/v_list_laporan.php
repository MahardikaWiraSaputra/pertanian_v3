<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive mailbox-messages">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th rowspan = "2"class="text-center" width="50">NO</th>
            <th rowspan = "2">KECAMATAN</th>
            <th rowspan = "2">BULAN/TAHUN</th>
            <th rowspan = "2">KOMODITAS</th>
            <th colspan ="2" class="text-center">LUAS PANEN (HEKTAR)</th>
            <th colspan="2" class="text-center">PRODUKSI (KWINTAL)</th>
            <th rowspan ="2">HARGA JUAL</th>
          </tr>
          <tr>
            <th>Habis/Dibongkar</th>
            <th>Belum Habis</th>
            <th>Dipanen Habis/Dibongkar</th>
            <th>Belum Habis</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">
              1
            </td>
            <td class="text-center">Pesanggaran</td>
            <td class="text-center">Januari - 2021</td>
            <td class="text-center">Cabe Rawit</td>
            <td class="text-center">0</td>
            <td class="text-center">9</td>
            <td class="text-center">0</td>
            <td class="text-center">200</td>
            <td class="text-center">30.000</td>
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
        ajax_modal('backend/horti/edit/'+id);
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