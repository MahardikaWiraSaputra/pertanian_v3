<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="box">
	<div class="box-body">
		<div class="table-responsive mailbox-messages">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center" width="50">NO</th>
						<th class="text-center" width="140">ID DOKUMEN</th>
						<th>NIP</th>
						<th>NAMA</th>
						<th>SATUAN KERJA</th>
						<th class="text-center">TANGGAL</th>
						<th class="text-center">URL FILES</th>
					</tr>
				</thead>
				<tbody>
					<?php $i='0' ; foreach($list_items as $row): $i++; ?>
					<tr>
						<td class="text-center"><?php echo ($limit*$page+$i)-$limit; ?></td>
						<td class="mailbox-date"><span data-toggle="tooltip" onclick="detail_regis('<?php echo $row['id_documents']; ?>')" title="<?php echo $row['id_doc']; ?>"><?php echo $row['id_doc']; ?></span>
						</td>
						<td class="mailbox-subject"><?php echo $row['pengguna']; ?></td>
						<td class="mailbox-subject"><?php echo $row['nama']; ?></td>
						<td class="mailbox-subject"><?php echo $row['NM_UNOR']; ?></td>
						<td class="text-center"><?php echo $row['tgl_created']; ?></td>
						<td class="text-center"><a href="<?php echo $row['files_url']; ?>" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o"></i> Lihat File</a></td>
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
	maxVisible: 10
	}).on("page", function(event, num){
		var n = num;
		$(".page").html("Page " + num);
		get_items(n);
	});

	function del_regis(nip){
		$('#ajax-delete').modal();
		$('#btn-delete').on('click',function(e){
            e.preventDefault();
            $.ajax({
                url  : "<?php echo base_url()?>registrasi/delete/"+nip,
                dataType: "JSON",
                success: function(response){
	                if(response.success == true) {
	               		$('#ajax-delete').modal('hide');
	    				get_items();
	                    toastr.remove();
	                    toastr['success'](response.message, '', {
	                        positionClass: 'toast-bottom-right'
	                    });
	                }
	                else {
	                	$('#ajax-delete').modal('hide');
	                	get_items();
	                    toastr.remove();
	                    toastr['error'](response.message, '', {
	                        positionClass: 'toast-bottom-right'
	                    });
	                }
                }
            });
            return false;
        });
	}
</script>