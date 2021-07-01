<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="box">
	<div class="box-body">
		<div class="table-responsive mailbox-messages">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center" width="50">NO</th>
						<th>NAMA RESPONDEN</th>
						<th>INSTANSI</th>
						<th class="text-center">PELAYANAN</th>
						<th class="text-center">KERAMAHAN</th>
						<th class="text-center">KETANGGAPAN</th>
						<th class="text-center">KEPUASAN</th>
						<th class="text-center" width="100"></th>
					</tr>
				</thead>
				<tbody>
					<?php $i='0' ; foreach($list_items as $row): $i++; ?>
					<tr>
						<td class="text-center"><?php echo ($limit*$page+$i)-$limit; ?></td>
						<td class="mailbox-subject"><?php echo $row['nama']; ?></td>
						<td class="mailbox-subject"><?php echo $row['instansi']; ?></td>
						<td class="text-center"><?php if ($row['pelayanan'] == '4') { echo 'Sangat Cepat'; } elseif ($row['pelayanan'] == '3'){ echo 'Cepat'; } elseif ($row['pelayanan'] == '2'){ echo 'Kurang Cepat'; } else { echo 'Tidak Cepat'; } ?></td>
						<td class="text-center"><?php if ($row['kesopanan'] == '4') { echo 'Sangat Ramah'; } elseif ($row['kesopanan'] == '3'){ echo 'Ramah'; } elseif ($row['kesopanan'] == '2'){ echo 'Kurang Ramah'; } else { echo 'Tidak Ramah'; } ?></td>
						<td class="text-center"><?php if ($row['ketanggapan'] == '4') { echo 'Sangat Tanggap'; } elseif ($row['ketanggapan'] == '3'){ echo 'Tanggap'; } elseif ($row['ketanggapan'] == '2'){ echo 'Kurang Tanggap'; } else { echo 'Tidak Tanggap'; } ?></td>
						<td class="text-center"><?php if ($row['kepuasan'] == '4') { echo 'Sangat Puas'; } elseif ($row['kepuasan'] == '3'){ echo 'Puas'; } elseif ($row['kepuasan'] == '2'){ echo 'Kurang Puas'; } else { echo 'Tidak Puas'; } ?></td>
						<td class="text-center">
							<div class="btn-group">
		                      	<button type="button" class="btn btn-xs btn-info" onclick="detail('<?php echo $row['id']; ?>')">View</button>
		                      	<button type="button" class="btn btn-xs btn-danger" onclick="hapus('<?php echo $row['id']; ?>')">Del</button>
		                    </div>
						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-12">
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

    function detail(id){
        ajax_modal('backend/kuesioner/detail/'+id);
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
                    url  : "<?php echo base_url()?>backend/kuesioner/delete/"+id,
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