<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="box">

	<div class="box-body">
		<div class="col-md-12">
			<table class="table">
				<tr>
					<td width="20%">Nama Lengkap </td>
					<td width="3%"> : </td>
					<td><?php echo $detail->nama; ?></td>
				</tr>
				<tr>
					<td>Instansi </td>
					<td width="3%"> : </td>
					<td><?php echo $detail->instansi; ?></td>
				</tr>
				<tr>
					<td>Jabatan </td>
					<td width="3%"> : </td>
					<td><?php echo $detail->jabatan; ?></td>
				</tr>
				<tr>
					<td>Tanggal </td>
					<td width="3%"> : </td>
					<td><?php echo $detail->submit_date; ?></td>
				</tr>
				<tr>
					<td>Saran </td>
					<td width="3%"> : </td>
					<td><?php echo $detail->saran; ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="box-body">
		<div class="col-md-12">
		<div class="table-responsive mailbox-messages">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center">PELAYANAN</th>
						<th class="text-center">KERAMAHAN</th>
						<th class="text-center">KETANGGAPAN</th>
						<th class="text-center">KEPUASAN</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center"><?php if ($detail->pelayanan == '4') { echo 'Sangat Cepat'; } elseif ($detail->pelayanan == '3'){ echo 'Cepat'; } elseif ($detail->pelayanan == '2'){ echo 'Kurang Cepat'; } else { echo 'Tidak Cepat'; } ?></td>
						<td class="text-center"><?php if ($detail->kesopanan == '4') { echo 'Sangat Ramah'; } elseif ($detail->kesopanan == '3'){ echo 'Ramah'; } elseif ($detail->kesopanan == '2'){ echo 'Kurang Ramah'; } else { echo 'Tidak Ramah'; } ?></td>
						<td class="text-center"><?php if ($detail->ketanggapan == '4') { echo 'Sangat Tanggap'; } elseif ($detail->ketanggapan == '3'){ echo 'Tanggap'; } elseif ($detail->ketanggapan == '2'){ echo 'Kurang Tanggap'; } else { echo 'Tidak Tanggap'; } ?></td>
						<td class="text-center"><?php if ($detail->kepuasan == '4') { echo 'Sangat Puas'; } elseif ($detail->kepuasan == '3'){ echo 'Puas'; } elseif ($detail->kepuasan == '2'){ echo 'Kurang Puas'; } else { echo 'Tidak Puas'; } ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
