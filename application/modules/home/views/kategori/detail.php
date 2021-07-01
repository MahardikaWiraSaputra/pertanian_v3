    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Kategori <?php echo $detail->nama_kategori; ?></h3>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">home</a></li>
                            <li>Kategori</li>
                            <li><?php echo $detail->nama_kategori; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop_area shop_reverse mt-70 mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <aside class="sidebar_widget">
                        <div class="widget_inner">

                            <div class="widget_list widget_color">
                                <h3>Kategori</h3>
                                <ul>
                                    <?php foreach ($list_kategori as $key => $kat): ?>
                                     <li><a href="<?php echo base_url(); ?>kategori/<?php echo $kat->slug_kat; ?>"><?php echo $kat->nama_kategori; ?></a></li>
                                     <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="widget_list widget_color">
                                <h3>Filter Lokasi Pasar</h3>
                                <form id="filter_data">
                                    <ul>
                                        <?php foreach ($list_pasar as $key => $psr): ?>
                                        <li class="filter-data"> <input type="checkbox" class="form-check-filter" id="pasar" name="pasar[]" value="<?php echo $psr->id; ?>"> <?php echo $psr->nama_pasar; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </form>
                                <a href="javascript:void(0)" class="btn btn-filter" onclick="get_items()">Terapkan</a>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12">


                    <div id="content_items"></div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

    get_items();

    function get_items(page){
        var image_load = "<div class='ajax_loading'></div>";
        $("#content_items").html(image_load);

        var page = '1';
        var kat = <?php echo $detail->id_kategori; ?>;

        var pasar = [];
        $(".form-check-filter").each(function(){
            if ($(this).is(":checked")) {
                pasar.push($(this).val());
            }
        });

        pasar = pasar.toString();

        // var order = $('select[name=orderby]').find(':selected').text();
        var order = $('#orderby option:selected').text();

        $.post(site+'home/kategori/get_produk', {
            keyword: $('#keyword').val(),
            pasar: pasar,
            kat: kat,
            page: page,
            order: order
            }, function(data) {
            $("#content_items").html(data);
        });
    }
</script>