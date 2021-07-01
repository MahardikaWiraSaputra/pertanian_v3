<?php echo form_dropdown('pengguna', $get_pengguna, 'all', 'id="pengguna", class="form-control select2", style="width:100%", onchange="get_items()"'); ?>
<script type="text/javascript">
	$(".select2").select2();
</script>