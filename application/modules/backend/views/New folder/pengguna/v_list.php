<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="box">
	<div class="box-body">
		<div class="table-responsive mailbox-messages">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center" width="50">NO</th>
						<th class="text-center" width="140">NIP/NIAP</th>
						<th>NAMA</th>
						<th>SATUAN KERJA</th>
						<th class="text-center">STATUS</th>
            <th class="text-center">EXPIRED</th>
						<th class="text-center">SERTIFIKAT</th>
						<th class="text-center" width="100"></th>
					</tr>
				</thead>
				<tbody>
					<?php $i='0' ; foreach($list_items as $row): $i++; ?>
					<tr>
						<td class="text-center"><?php echo ($limit*$page+$i)-$limit; ?></td>
						<td class="mailbox-date"><span data-toggle="tooltip" onclick="detail_pengguna('<?php echo $row['nip']; ?>')" title="<?php echo $row['nama']; ?>"><?php echo $row['nip']; ?></span></td>
						<td class="mailbox-subject"><?php echo $row['nama']; ?></td>
						<td class="mailbox-subject"><?php echo $row['NM_UNOR']; ?></td>
						<td class="text-center"><?php if ($row['status'] == 'Aktif') { ?>
							<span class="label label-success"><i class="fa fa-fw fa-check"></i>Aktif</span>
							<?php } else { ?>
							<span class="label label-warning"><i class="fa fa-fw fa-close"></i>Nonaktif</span>
							<?php } ?>
						</td>
            <td class="mailbox-subject"><?php echo $row['valid_to']; ?></td>
						<td class="text-center">
							<?php if ($row['cert'] != null) { ?>
								<a href="javascript:void(0)" onclick="verify('pem','<?php echo $row['nip']; ?>')"><img width="24" height="24" src="<?php echo base_url();?>assets/default/img/icon_pem.png" class="rounded-circle m-r-5" alt=""></a>
							<?php } else { ?>
								<a href="javascript:void(0)" onclick="upload('pem','<?php echo $row['nip']; ?>')"><img width="24" height="24" src="<?php echo base_url();?>assets/default/img/icon_no_p12.png" class="rounded-circle m-r-5" alt=""></a>
							<?php } ?>

							<?php if ($row['p12'] != null) { ?>
								<a href="javascript:void(0)" onclick="verify('p12','<?php echo $row['nip']; ?>')"><img width="24" height="24" src="<?php echo base_url();?>assets/default/img/icon_p12.png" class="rounded-circle m-r-5" alt=""></a>
							<?php } else { ?>
								<a href="javascript:void(0)" onclick="upload('p12','<?php echo $row['nip']; ?>')"><img width="24" height="24" src="<?php echo base_url();?>assets/default/img/icon_no_p12.png" class="rounded-circle m-r-5" alt=""></a>
							<?php } ?>
						</td>
						<td class="text-center">
							<div class="btn-group">
		                      	<button type="button" class="btn btn-info btn-xs btn-info" onclick="edit('<?php echo $row['nip']; ?>')">Edit</button>
		                      	<button type="button" class="btn btn-info btn-xs btn-danger" onclick="hapus('<?php echo $row['nip']; ?>')">Del</button>
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

    function detail_pengguna(nip){
        ajax_modal('backend/pengguna/detail/'+nip);
    }

    function edit(nip){
        ajax_modal('backend/pengguna/edit/'+nip);
    }

    function verify(tipe,nip){
        ajax_modal('backend/pengguna/verify/'+tipe+'/'+nip);
    }

    function upload(tipe,nip){
        ajax_modal('backend/pengguna/upload/'+tipe+'/'+nip);
    }

    function hapus(nip) {
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
                    url  : "<?php echo base_url()?>backend/pengguna/delete/"+nip,
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
                                    // load('backend/pengguna/index', '#contents');
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
                                    // load('backend/pengguna/index', '#contents');
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