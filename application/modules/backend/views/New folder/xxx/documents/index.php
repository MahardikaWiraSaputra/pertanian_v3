<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Documents</h4></div>
    </div>
    <div class="row filter-row">
        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-12">
            <div class="form-group form-focus">
                <label class="focus-label">Kata Kunci</label>
                <input type="text" class="form-control floating" id="keywords" onkeyup="searchFilter();">
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-12">
            <div class="form-group form-focus select-focus focused">
                <label class="focus-label">Satuan Kerja</label>
                <select class="select floating" id="filters" onchange="searchFilter();">
                    <option>THL Dinas Komunikasi, Informatika dan Persandian</option>
                    <option>Dinas Komunikasi, Informatika dan Persandian</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"> <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-border table-striped custom-table mb-0" id="dokumen">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Pengguna</th>
                            <th>Satuan Kerja</th>
                            <th>APIs</th>
                            <th class="text-center">Tanggal Dibuat</th>
                            <th class="text-center">File Documents</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        searchFilter();
    });

    var page_num = page_num?page_num:1;
    function searchFilter(page_num){
        var keywords = $('#keywords').val();
        var filters = $('#filters').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>administrator/documents/list_data',
            data:{page:page_num, keywords:keywords, filters:filters},
            beforeSend: function(){
                $('.loading').show();
            },
            success: function(html){
                $('#dataList').html(html);
                $('.loading').fadeOut("slow");
            }
        });
    }




</script>

