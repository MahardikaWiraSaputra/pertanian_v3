<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead class="">
          <tr>
            <th class="text-center" width="50">NO</th>
            <th>DESA</th>
            <th>KECAMATAN</th>
            <th>KOMODITAS</th>
            <th>KATEGORI</th>
            <th>TAHUN</th>
            <th width="120">VIEW</th>
          </tr>
        </thead>
        <tbody>
          <?php $i='0' ; foreach($list_items as $row): $i++; ?>
          <tr>
            <td class="text-center">
              <?php echo ($limit*$page+$i)-$limit; ?>
            </td>
            <td class="">
              <?php echo $row->nama_desa; ?>
            </td>
            <td class="">
            <?php echo $row->nama_kecamatan; ?>
            </td>
            <td class="">
              <?php echo $row->komoditas; ?>
            </td>
            <td class="">
              <?php if($row->kategori == 'sub_round_1'){
                  $result = 'SUB ROUND 1 (JANUARI-APRIL)';
              } elseif($row->kategori == 'sub_round_2') {
                  $result = 'SUB ROUND 2 (MEI-AGUSTUS)';
              } else {
                  $result = 'SUB ROUND 3 (SEPTEMBER-DESEMBER)';
              }
              echo $result;
              ?>
            </td>
            <td class="">
              <?php echo $row->tahun; ?>
            </td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-success waves-effect waves-light" onclick="edit('<?php echo $row->kategori; ?>','<?=$row->tahun;?>')">Edit</button>&nbsp;
                <button type="button" class="btn btn-dark waves-effect waves-light" onclick="hapus('<?php echo $row->kategori; ?>','<?=$row->tahun;?>')">Hapus</button>
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