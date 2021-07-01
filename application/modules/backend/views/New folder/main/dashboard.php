<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed');?>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $total_sertifikat; ?></h3>
                    <p>Sertifikat Aktif</p>
                </div>
                <div class="icon"> <i class="fa fa-expeditedssl"></i>
                </div> <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo number_format($total_dokumen, 0); ?></h3>
                    <p>Dokumen TTE</p>
                </div>
                <div class="icon"> <i class="fa fa-cloud"></i>
                </div> <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $total_request; ?></h3>
                    <p>Request TTE</p>
                </div>
                <div class="icon"> <i class="fa fa-file-pdf-o"></i>
                </div> <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo $total_aduan; ?></h3>
                    <p>Aduan Masuk</p>
                </div>
                <div class="icon"> <i class="fa fa-comments-o"></i>
                </div> <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header ui-sortable-handle" style="cursor: move;"> <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">ADUAN PENDING</h3>
                </div>
                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>TICKET</th>
                                <th>NAMA</th>
                                <th>TANGGAL</th>
                                <th class="text-center">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; foreach ($aduan_status as $status => $row) : $i++;?>
                            <tr>
                                <td><?php echo $i; ?>.</td>
                                <td><?php echo $row->no_ticket; ?></td>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row->submit_date)); ?></td>
                                <td class="text-center">
                                    <?php if ($row->respons == 0) { ?>
                                        <span class="label label-danger">Belum Direspons</span>
                                    <?php } else { ?>
                                        <span class="label label-warning">Belum Selesai</span>
                                    <?php } ?>
                                        
                                    </td>
                            </tr>
                           <?php endforeach; ?>
                        </tbody>
                    </table>
                   
                </div>

                <div class="box-footer clearfix no-border">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="box box-primary">
                <div class="box-header ui-sortable-handle" style="cursor: move;"> <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">REQUEST PENDING</h3>
                </div>
                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>REQUEST ID</th>
                                <th>NAMA</th>
                                <th>TANGGAL</th>
                                <th>REQUEST</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; foreach ($request_status as $request => $row) : $i++;?>
                            <tr>
                                <td><?php echo $i; ?>.</td>
                                <td><?php echo $row->request_id; ?></td>
                                <td><?php echo $row->nama_lgkp; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row->created)); ?></td>
                                <td><?php echo $row->jenis_request; ?></td>
                            </tr>
                           <?php endforeach; ?>
                        </tbody>
                    </table>
                   
                </div>

                <div class="box-footer clearfix no-border">
                </div>
            </div>
        </div>
    </div>
</section>
