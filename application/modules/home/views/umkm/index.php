<div class="breadcrumb-section" style="background-image: url(<?php echo base_url()?>assets/home/images/breadcrumb/breadcrumb-1.jpg)">
    <div class="overlay op-5"></div>
    <div class="container">
        <div class="row align-items-center  pad-top-80">
            <div class="col-md-6 col-12">
                <div class="breadcrumb-menu">
                    <h2 class="page-title">Daftar UMKM</h2>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="breadcrumb-menu text-right sm-left">
                    <ul>
                        <li class="active"><a href="#">Beranda</a></li>
                        <li><a href="#">Daftar UMKM</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="filter-wrapper style1 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-12 option-box style1">
                <div class="filter-box style1 left">
                    <div class="sidebar-title">
                        <h2>Filter UMKM</h2>
                    </div>
                    <form id="filter_data">
                        <div class="form-group filter-group">
                            <input type="text" class="form-control filter-input" id="keyword" name="keyword" placeholder="Ketikkan kata kunci">
                            
                            <?php echo form_dropdown('kecamatan', $kecamatan, '', 'id="kecamatan" class="filter-input"')?>

                            <?php echo form_dropdown('sektor', $sektor_umkm, '', 'id="sektor" class="filter-input"')?>
                            
                        </div>
                        <a class="btn v1" onclick="get_items();">Cari</a>
                    </form>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12">
                <div id="content_items"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    get_items();

    var page = '1';
    function get_items(page){
        var image_load = "<div class='ajax_loading'></div>";
        $("#content_items").html(image_load);

        $.post(site+'list_umkm/get_umkm', {
            keyword: $('#keyword').val(),
            kecamatan: $('#kecamatan').val(),
            sektor: $('#sektor').val(),
            page: page
            }, function(data) {
            $("#content_items").html(data);
        });
    }
</script>