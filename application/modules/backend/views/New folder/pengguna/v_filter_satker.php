<?php echo form_dropdown('fil_satker', $get_satker, 'all', 'id="fil_satker", class="form-control select2", style="width:100%", onchange="get_items()"'); ?>
<script type="text/javascript">
	$(".select2").select2();
</script>