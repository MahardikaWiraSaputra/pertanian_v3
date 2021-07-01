<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="box">
	<div class="box-body">
		<div class="table-responsive mailbox-messages">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center" width="50">NO</th>
						<th class="text-center" width="100">NO TICKET</th>
						<th>NAMA LENGKAP</th>
						<th>INSTANSI</th>
						<th class="">TANGGAL</th>
						<th class="text-center">STATUS</th>
						<th class="text-center">RESPONSE</th>
						<th class="text-center" width="100"></th>
					</tr>
				</thead>
				<tbody>
					<?php $i='0' ; foreach($list_items as $row): $i++; ?>
					<tr>
						<td class="text-center"><?php echo ($limit*$page+$i)-$limit; ?></td>
						<td class="text-center"><span data-toggle="tooltip" onclick="detail('<?php echo $row['no_ticket']; ?>')" title="<?php echo $row['nama']; ?>">#<?php echo $row['no_ticket']; ?></span>
						</td>
						<td class="mailbox-subject"><?php echo $row['nama']; ?></td>
						<td class="mailbox-subject"><?php echo $row['instansi']; ?></td>
						<td class=""><?php echo $row['submit_date']; ?></td>
						
						<td class="text-center"><?php if($row['status'] =='open'){ ?><span class="label label-success"><i class="fa fa-fw fa-clock-o"></i><?php echo $row['status'];?></span><?php } else { ?> <span class="label label-danger"><i class="fa fa-fw fa-ban"></i><?php echo $row['status'];?></span> <?php } ?></td>
						<td class="text-center"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-comments"></i> <?php echo $row['jml_response']; ?></button></td>
						<td class="text-center">
							<div class="btn-group">
								<?php if ($row['status'] == 'open') { ?>
		                      	<button type="button" class="btn btn-xs btn-warning" onclick="solved('<?php echo $row['id']; ?>')">Solve</button>
		                      	<?php } else { ?>
		                      	<button type="button" class="btn btn-xs btn-success" onclick="buka('<?php echo $row['id']; ?>')">Open</button>
		                      	<?php } ?>
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

    function detail(no_ticket){
        ajax_modal('backend/aduan/detail/'+no_ticket);
    }

    function solved(id) {
        swal({
            title: 'Anda yakin menutup ticket aduan?',
            text: "Aduan ditutup tidak dapat direspons kembali!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Solved',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            padding: '2em'
        }).then(function(result){
            if (result.value) {
                $.ajax({
                    url  : "<?php echo base_url()?>backend/aduan/solved/"+id,
                    dataType: "JSON",
                    type: "POST",
                    success: function(response){
                        if(response.success == true) {
                            swal({
                              title: 'Sukses',
                              text: "Ticket aduan ditutup",
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
                              text: "Ticket aduan gagal ditutup",
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
                  title: 'Solved dibatalkan',
                  text: "Ticket aduan batal ditutup",
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

    function buka(id) {
        swal({
            title: 'Anda yakin membuka ticket aduan?',
            text: "Ticket aduan akan kembali diaktifkan",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Open',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            padding: '2em'
        }).then(function(result){
            if (result.value) {
                $.ajax({
                    url  : "<?php echo base_url()?>backend/aduan/open/"+id,
                    dataType: "JSON",
                    type: "POST",
                    success: function(response){
                        if(response.success == true) {
                            swal({
                              title: 'Sukses',
                              text: "Ticket aduan berhasil dibuka",
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
                              text: "Ticket aduan gagal dibuka",
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
                  title: 'Open Ticket dibatalkan',
                  text: "Ticket aduan batal diopen",
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
                    url  : "<?php echo base_url()?>backend/aduan/delete/"+id,
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