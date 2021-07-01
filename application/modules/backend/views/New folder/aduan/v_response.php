<?php if (count($list_items) > 0) { ?>
	
<div class="box box-primary" >
	<div class="box-body no-padding">
		<ul class="timeline">
			<?php foreach ($list_items as $key => $row) :?>
			<li> <i class="fa fa-envelope bg-blue"></i>
				<div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo $row->response_date; ?></span>
					<h3 class="timeline-header">Direspon oleh <a href="#"><?php echo $row->response_by; ?></a></h3>
					<div class="timeline-body"><?php echo $row->response; ?></div>
				</div>
			</li>
			<?php endforeach; ?>
			<li> <i class="fa fa-clock-o bg-gray"></i>
			</li>
		</ul>
	</div>
</div>
<?php } else { ?>
<div class="box box-primary" >
	<div class="box-body no-padding">
		<div class="text-center"><h3>Belum ada balasan</h3></div>
	</div>
</div>
<?php } ?>
