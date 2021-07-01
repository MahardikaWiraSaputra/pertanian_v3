<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive mailbox-messages">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th class="text-center" width="50">NO</th>
            <th>NAMA TOKO</th>
            <th>KATEGORI TOKO</th>
            <th>PEMILIK</th>
            <!-- <th width="120" class="text-center">STOK</th>-->
            <!-- <th width="140">HARGA</th> -->
            <th width="200px">KOMODITAS</th>
            <th width="200px">PASAR</th>
            <th width="120px">VIEW</th>
          </tr>
        </thead>
        <tbody>
          <?php $i='0' ; foreach($list_items as $row): $i++; ?>
          <tr>
            <td class="text-center">
              <?php echo ($limit*$page+$i)-$limit; ?>
            </td>
            <td class="">
              <?php echo $row->nama_usaha; ?>
            </td>
            <td class="">
            <?php echo ($row->kategori_store == '1' ? 'UMKM' : 'PASAR');?>
            </td>
            <td class="">
              <?php echo $row->nama_lengkap; ?><br>
              <?php echo $row->telp; ?>
            </td>
            <td class="">
              <?php echo $row->komoditi; ?>
            </td>
            <td class="">
              <?php echo $row->nama_pasar; ?>
            </td>
            <!-- <td class="">
            ini apa
              <?php if($row->status_stok == '1'): ?><button type="button" class="btn btn-outline-success btn-sm btn-stok">tersedia</button> <?php else: ?><button type="button" class="btn btn-outline-secondary btn-sm btn-stok">habis</button><?php endif; ?>
            </td>
            <td class="">
              Rp. <?php echo number_format($row->harga_produk,0,',','.'); ?>
            </td>
            <td class="">
              <?php echo $row->NAMA_USAHA; ?>
            </td>
            <td class="">
              <?php echo $row->view; ?> dilihat
            </td> -->
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-info btn-xs btn-info" onclick="edit('<?php echo $row->id; ?>')">Edit</button>
                <button type="button" class="btn btn-info btn-xs btn-danger" onclick="hapus('<?php echo $row->id; ?>')">Del</button>
              </div>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="row mt-5">
  <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="d-flex justify-content-between">
            <button class="btn btn-sm btn-outline-info"><span class="btn-label"></span> <b>JUMLAH DATA <?php echo $total_items; ?> </b></button>
            <div class="paginating-container pagination-default">
                <div id="show_paginator" align="center"></div>
            </div>
        </div>
    </div>
</div>


<?php $total_page = ( $total_items / $limit)+1; if ($total_page < 1){ $total_page='1' ; } ?>
<script>
	$('#show_paginator').bootpag({
	page : <?php echo $page?>,
	total: <?php echo $total_page ?>,
	maxVisible: 5
	}).on("page", function(event, num){
		var n = num;
		$(".page").html("Page " + num);
		get_items(n);
	});

    function edit(id){
        var title = 'Perbarui Data Toko';
		    $('.modal-title').html(title);
        ajax_modal('backend/toko/edit/'+id);
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