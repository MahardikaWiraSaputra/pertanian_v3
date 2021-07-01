<?php echo form_dropdown('satker', $get_satker, 'all', 'id="satker", class="form-control select2", style="width:100%", onchange="get_items()"'); ?>
<script type="text/javascript">
	$(".select2").select2();
</script>