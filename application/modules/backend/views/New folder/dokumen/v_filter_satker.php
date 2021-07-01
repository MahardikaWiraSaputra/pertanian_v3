<?php echo form_dropdown('satker', $get_satker, 'all', 'id="satker", class="form-control select2", style="width:100%", onchange="get_pengguna(),get_items()"'); ?>
<script type="text/javascript">
	$(".select2").select2();
	get_pengguna();

	function get_pengguna(){
		var id = $('select[id="satker"]').val();
		$("#filter_pengguna").html('<i class="fa fa-refresh fa-spin"></i>');
		load('backend/dokumen/get_pengguna/'+id, '#filter_pengguna');
	}
</script>