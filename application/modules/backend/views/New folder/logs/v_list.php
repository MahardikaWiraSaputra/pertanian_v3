<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="box">
	<div class="box-body">
		<div class="table-responsive mailbox-messages">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center" width="50">NO</th>
						<th>NIP</th>
						<th>NAMA</th>
						<th>SATUAN KERJA</th>
						<th class="text-center">TANGGAL</th>
						<th class="text-center" width="100">AKTIVITAS</th>
						<th class="text-center">RESPONSE</th>
					</tr>
				</thead>
				<tbody>
					<?php $i='0' ; foreach($list_items as $row): $i++; ?>
					<tr>
						<td class="text-center"><?php echo ($limit*$page+$i)-$limit; ?></td>
						<td class="mailbox-subject"><?php echo $row['nip']; ?></td>
						<td class="mailbox-subject"><?php echo $row['nama']; ?></td>
						<td class="mailbox-subject"><?php echo $row['NM_UNOR']; ?></td>
						<td class="text-center"><?php echo $row['date_request']; ?></td>
						<td class="text-center"><?php echo $row['activity']; ?></td>
						<td class="text-center">
							<?php if ($row['response_code'] == '200') { ?>
							<span class="badge bg-green" data-toggle="tooltip" title="<?php echo $row['response_msg']; ?>" data-placement="left" data-original-title="<?php echo $row['response_msg']; ?>"><?php echo $row['response_code']; ?></span>
							<?php } else { ?>
							<span class="badge bg-yellow" data-toggle="tooltip" title="<?php echo $row['response_msg']; ?>" data-placement="left" data-original-title="<?php echo $row['response_msg']; ?>"><?php echo $row['response_code']; ?></span>
							<?php } ?>
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