<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="row">
	<div class="col-md-12">
    	<div class="box">
		    <div class="box-body">
		        <div class="col-md-12">
		            <table class="table">
		                <tr>
		                    <td width="20%"><strong>NIP</strong></td>
		                    <td width="3%"> : </td>
		                    <td><?php echo $detail->nip ?></td>
		                </tr>
		                <tr>
		                    <td><strong>NAMA LENGKAP</strong></td>
		                    <td> : </td>
		                    <td><?php echo $detail->nama; ?></td>
		                </tr>
		                <tr>
		                    <td><strong>SATUAN KERJA</strong></td>
		                    <td> : </td>
		                    <td><?php echo $detail->satker; ?></td>
		                </tr>
		                <tr>
		                    <td><strong>EMAIL</strong></td>
		                    <td> : </td>
		                    <td><?php echo $detail->email; ?></td>
		                </tr>
		                <tr>
		                    <td><strong>TELP</strong></td>
		                    <td> : </td>
		                    <td><?php echo $detail->telp; ?></td>
		                </tr>
		                <tr>
		                    <td><strong>STATUS</strong></td>
		                    <td> : </td>
		                    <td><?php echo $detail->status; ?></td>
		                </tr>
		                <tr>
		                    <td><strong>VALID</strong></td>
		                    <td> : </td>
		                    <td><strong><?php echo $detail->valid_start; ?></strong> Sampai <strong><?php echo $detail->valid_to; ?></strong>
		                    	<?php $exp = date_diff( date_create($detail->valid_to), date_create() ); ?>  (<?php echo $exp->y ?> Tahun <?php echo $exp->m ?> Bulan <?php echo $exp->d ?> Hari )
		                    </td>
		                </tr>
		                <tr>
		                    <td><strong>SERTIFIKAT</strong></td>
		                    <td> : </td>
		                    <td>
		                    	<span class="btn btn-info btn-sm"><a href="<?php echo base_url() ?>uploads/certs/<?php echo $detail->cert; ?>" target="_blank"><i class="glyphicon glyphicon-download"></i>&nbsp; DOWNLOAD CRT</a></span>
		                    	<span class="btn btn-info btn-sm"><a href="<?php echo base_url() ?>uploads/keys/<?php echo $detail->key; ?>" target="_blank"><i class="glyphicon glyphicon-download"></i>&nbsp; DOWNLOAD KEY</a></span>
		                    	<span class="btn btn-info btn-sm"><a href="<?php echo base_url() ?>uploads/p12/<?php echo $detail->p12; ?>" target="_blank"><i class="glyphicon glyphicon-download"></i>&nbsp; DOWNLOAD P12</a></span>
		                    </td>
		                </tr>

		            </table>
		        </div>
		    </div>
		</div>
	</div>
</div>
