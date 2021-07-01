<?php if ( ! defined( 'BASEPATH')) exit( 'No direct script access allowed');?>
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">NO TICKET : #<?php echo $detail->no_ticket; ?></h3>
		<div class="box-tools pull-right"> 
			<?php if ($detail->status == 'open') { ?>
			<button type="button" class="btn bg-olive btn-xs"> <i class="fa fa-fw fa-clock-o"></i> <?php echo $detail->status; ?></button>
			<?php } else { ?>
			<button type="button" class="btn bg-maroon  btn-xs"> <i class="fa fa-fw fa-ban"></i> <?php echo $detail->status; ?></button>
			<?php } ?>
		</div>
	</div>
	<div class="box-body no-padding">
		<div class="mailbox-read-info">
			<h5>Dari: <strong><?php echo $detail->nama; ?></strong> - <?php echo $detail->instansi; ?><span class="mailbox-read-time pull-right"><?php echo $detail->submit_date; ?></span></h5>
		</div>
		<?php if ($detail->status == 'open') { ?>
		<div class="mailbox-controls with-border">
			<button type="button" class="btn btn-info" id="show_reply"><i class="fa fa-reply"></i> Balas</button>
			<button type="button" class="btn bg-maroon"><i class="fa fa-check-square-o"></i> Solved</button>
		</div>
		<?php } ?>
		<div class="mailbox-read-message">
			<p><?php echo $detail->aduan; ?></p>
		</div>
	</div>
	<?php if($detail->berkas != null) { ?>
	<div class="box-footer" id="aduan_attachment" style="display: none;">
		<ul class="mailbox-attachments clearfix">
			<li> 
				<span class="mailbox-attachment-icon has-img"><img src="<?php echo base_url(); ?>uploads/aduan/<?php echo $detail->berkas; ?>"></span>
				<div class="mailbox-attachment-info"> 
					<a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> <?php echo $detail->berkas; ?></a>
				</div>
			</li>
		</ul>
	</div>
	<div class="timeline-footer text-center">
        <a class="btn btn-default btn-flat btn-xs" id="show_attach">Screenshot Attachment</a>
    </div>
	<?php } ?>
</div>


<div id="list_balasan"></div>

<div class="box box-primary" id="form_balasan" style="display: none;">
	<div class="box-header with-border">
		<h3 class="box-title">Balas No Ticket : #<?php echo $detail->no_ticket; ?></h3>
	</div>
	<div class="box-body no-padding">
		<div class="mailbox-read-message">
			<form id="form_replay">
				<div class="form-group">
					<?php echo form_hidden('aduan_id',  $detail->id); ?>
					<?php echo form_textarea(['name' => 'response', 'id' => 'response', 'class' => 'form-control input-sm', 'rows'=>'4', 'placeholder' => 'Balasan']); ?>
                </div>
			</form>
		</div>
	</div>
	<div class="box-footer">
		<button type="button" class="btn btn-default" onclick="reply()"><i class="fa fa-send"></i> Kirim</button>
		<div class="pull-right">
            <button type="button" class="btn btn-default" id="close_reply"><i class="fa fa-trash"></i></button>
        </div>
	</div>
</div>

<script>
	get_balasan();

    $(document).ready(function() {
        $("#show_reply").click(function() {
            $("#form_balasan").show();
        });
    });

    $(document).ready(function() {
        $("#close_reply").click(function() {
            $("#form_balasan").hide();
        });
    });
    $(document).ready(function() {
        $("#show_attach").click(function() {
            $("#aduan_attachment").toggle();
        });
    });

	$(function(){
	  	
	})
	
	function get_balasan(){
		var id = '<?php echo $detail->id; ?>';
	    var image_load = "<div class='ajax_loading'></div>";
	    $("#list_balasan").html(image_load);

	    $.post(site+'backend/aduan/response', {
	        id : id
	    }, function(data) {
	        $("#list_balasan").html(data);
	    });
	}

	function reply(){
        $.ajax({
            type: "POST",
            url  : "<?php echo base_url()?>backend/aduan/reply",
           	data: $("#form_replay").serializeArray(),
            dataType: "JSON",
            success: function(response){
                if(response.success == true) {
                    swal({
				      title: 'Sukses',
				      text: "Data berhasil disimpan",
				      type: 'success',
				      padding: '2em',
				      showConfirmButton: false, 
				      timer: 1500
				    }).then((result) => {
					    if (result.dismiss === Swal.DismissReason.timer) {
					       	$('#ajax-modal').modal('hide');
					       	get_items();          
					    }
					});
                }
                else {
                    swal({
				      title: 'Gagal',
				      text: "Data tidak dapat disimpan",
				      type: 'error',
				      padding: '2em',
				      showConfirmButton: false, 
				      timer: 1500
				    }).then((result) => {
					    if (result.dismiss === Swal.DismissReason.timer) {
					    	$('#ajax-modal').modal('hide');
					    }
					});
                }
            }

        });
        return false;
	}	
</script>