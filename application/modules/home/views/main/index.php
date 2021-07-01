
    <section class="slider_section">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo base_url()?>uploads/images/banner/banner-1.png">
                <div class="container">
                    <div class="row">
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="produk-kategori mt-70 mb-64">
        <div class="container">
            <div class="row">
                <?php foreach ($list_kategori as $key => $rows): ?>
                <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                    <div class="category-box-layout1">
                        <a href="<?php echo base_url(); ?>kategori/<?php echo $rows->slug_kat; ?>">
                            <div class="item-icon"> 
                                <img src="<?php $res = str_replace("http://localhost/belanja/",base_url(),$rows->gambar); echo $res; ?>">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title"><?php echo $rows->nama_kategori; ?></h3>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="col-6 col-sm-6 col-md-2 col-lg-2">
                    <div class="category-box-layout1">
                        <a href="#">
                            <div class="item-icon"> 
                                <img src="<?php echo base_url()?>assets/shop/img/kategori/produk-lain.png">
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Produk Lainnya</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="product_area mb-64">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Produk Terlaris</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <?php foreach ($produk_terpopuler as $key => $row): ?>
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
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
                                                 <a class="produk_detail" href="<?php base_url(); ?>produk/<?php echo $row->slug_produk; ?>">
                                                <h4 class="product_name"><?php echo $row->nama_produk; ?></h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner_fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_full_content">
                        <p>PROMO SPESIAL</p>
                        <h2>Gratis Ongkir <span>semua jenis produk</span></h2>  <a href="#">belanja sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product_area mb-64">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Produk Terbaru</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <?php foreach ($produk_terbaru as $key => $row): ?>
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                
                                <div class="product_items">
                                    <div class="single_product">
                                        
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="<?php base_url(); ?>produk/<?php echo $row->slug_produk; ?>">
                                                    <?php if($row->url_image !== null): ?>
                                                    <img src="<?php $res = str_replace("http://localhost/belanja/",base_url(),$row->url_image); echo $res; ?>">
                                                    <?php else : ?>
                                                    <img src="<?php echo base_url(); ?>uploads/images/produk/no-photos.jpg" alt="">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="label_product"> <span class="label_sale">New</span>
                                                </div>
                                            </div>
                                            <figcaption class="product_content">
                                                <a class="produk_detail" href="<?php base_url(); ?>produk/<?php echo $row->slug_produk; ?>">
                                                <h4 class="product_name"><?php echo $row->nama_produk; ?></h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>