<div class="shop_toolbar_wrapper">
    <div class="page_amount">
        <p>Menampilkan <?php echo $total_produk; ?> of <?php echo $total_produk_filter; ?> Produk</p>
    </div>
        <div class="nice-select select_option">
            <form class="select_option" action="#">
            <select name="orderby" id="orderby" onchange="get_items()">
                <option value="harga terendah">Urutkan harga terendah</option>
                <option value="harga tertinggi">Urutkan harga tertinggi</option>
                <option value="produk terbaru">Urutkan produk terbaru</option>
            </select>
        </form>
    </div>
</div>
<div class="row shop_wrapper">
    
    <?php foreach ($list_produk as $key => $row): ?>
    <div class="col-6 col-sm-6 col-md-4 col-lg-4">
        <div class="product_items">
            <div class="single_product">
                <figure>
                    <div class="product_thumb">
                        <a class="primary_img" href="#">
                            <?php if($row->url_image !== null): ?>
                            <img src="<?php $res = str_replace("http://localhost/belanja/",base_url(),$row->url_image); echo $res; ?>">
                            <?php else : ?>
                            <img src="<?php echo base_url(); ?>uploads/images/produk/no-photos.jpg" alt="">
                            <?php endif; ?>
                        </a>
                    </div>
                    <figcaption class="product_content">
                         <a class="produk_detail" href="<?php $url = 'https://bobawangi.com/'; echo $url ?>produk/<?php echo $row->slug_produk; ?>">
                        <h4 class="product_name"><?php echo $row->nama_produk; ?> </h4>
                        <div class="price_box"> 
                            <span class="current_price">Rp. <?php echo number_format($row->harga , 0,',','.'); ?></span>
                            <span class="promosi"><img src="<?php echo base_url(); ?>assets/shop/img/gratis-ongkir.png" title="Gratis Ongkir"></span>
                        </div>
                        <div class="lihat_detail">lihat produk</div>
                         </a>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

</div>
<div class="shop_toolbar t_bottom">
    <div class="pagination">
        <div id="show_paginator" align="center"></div>
    </div>
</div>

<?php $total_page = ( $total_produk / $limit); if ($total_page < 1){ $total_page = '1' ; } ?>
<script type="text/javascript">

    // $('.select_option').niceSelect();

    $('#show_paginator').bootpag({
        page : <?php echo $page?>,
        total: <?php echo $total_page ?>,
        maxVisible: 10
        }).on("page", function(event, num){
            var n = num;
            $(".page").html("Page " + num);
            get_items(n);
    });
</script>