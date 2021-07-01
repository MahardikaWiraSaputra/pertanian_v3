<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="box">
	<div class="box-body">
		<div class="table-responsive mailbox-messages">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center" width="50">NO</th>
						<th class="text-center" width="100">NO REQUEST</th>
						<th>NAMA LENGKAP</th>
						<th>INSTANSI</th>
            <th>TELEPON</th>
						<th class="">TANGGAL</th>
            <th class="text-center">BERKAS</th>
						<th class="text-center">STATUS</th>
					</tr>
				</thead>
				<tbody>
					<?php $i='0' ; foreach($list_items as $row): $i++; ?>
					<tr>
						<td class="text-center"><?php echo ($limit*$page+$i)-$limit; ?></td>
						<td class="text-center"><span data-toggle="tooltip" title="<?php echo $row->nama_lgkp; ?>">#<?php echo $row->request_id; ?></span>
						</td>
						<td class="mailbox-subject"><?php echo $row->nama_lgkp; ?></td>
						<td class="mailbox-subject"><?php echo $row->NM_UNOR; ?></td>
						<td class=""><?php echo $row->telp; ?></td>
            <td class=""><?php echo $row->created; ?></td>
            <td class=""><?php if($row->berkas != null){ ?><a href="<?php echo $row->berkas; ?>" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-file-pdf-o"></i> Lihat File</a> <?php } else { ?><a class="btn btn-xs btn-warning disabled"><i class="fa fa-file-pdf-o"></i> Tidak ada</a> <?php } ?></td>
						<td class="text-center">
              <?php if($row->status =='0'){ ?><span class="label label-info"><i class="fa fa-fw fa-clock-o"></i>Pending</span><?php } elseif($row->status =='1'){ ?> <span class="label label-success"><i class="fa fa-fw fa-check"></i>Diterima</span> <?php } else {?> <span class="label label-danger"><i class="fa fa-fw fa-ban"></i>Ditolak</span><?php } ?>
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


</script>