<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>">home</a></li>
                        <li>product</li>
                        <li><?php echo $detail->nama_produk; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product_details mt-70 mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php if($list_img->num_rows() > 0): ?>
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="<?php $res = str_replace("http://localhost/belanja/",base_url(),$detail->url_image); echo $res; ?>" data-zoom-image="<?php $res = str_replace("http://localhost/belanja/",base_url(),$detail->url_image); echo $res; ?>" alt="big-1">
                        </a>
                    </div>
                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            <?php foreach ($list_img->result() as $key => $rows): ?>
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php $res = str_replace("http://localhost/belanja/",base_url(),$rows->url_image); echo $res; ?>" data-zoom-image="<?php echo $rows->url_image; ?>">
                                    <img src="<?php $res = str_replace("http://localhost/belanja/",base_url(),$rows->url_image); echo $res; ?>" alt="zo-th-1" />
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php else : ?>
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="<?php echo base_url(); ?>uploads/images/produk/no-photos.jpg" data-zoom-image="img/product/productbig4.jpg" alt="big-1">
                        </a>
                    </div>
                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php echo base_url(); ?>uploads/images/produk/no-photos.jpg" data-zoom-image="<?php echo base_url(); ?>uploads/images/produk/no-photos.jpg">
                                    <img src="<?php echo base_url(); ?>uploads/images/produk/no-photos.jpg" alt="zo-th-1" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="#">
                        <div class="info_tops">
                            <span class="stock tersedia">stok tersedia</span>
                        </div>
                        <h1><a href="#"><?php echo $detail->nama_produk; ?></a></h1>
                        <div class="price_box"> <span class="current_price">Rp. <?php echo number_format($detail->harga , 0,',','.'); ?></span>
                        </div>
                        <div class="product_desc">
                            <p><?php echo $detail->deskripsi; ?></p>
                        </div>
                        <div class="product_meta"> <span>Kategori: <a href="#"><?php echo $detail->kategori; ?></a></span>
                        </div>
                        <div class="product_variant quantity">
                            <label>Jumlah</label>
                            <input min="1" max="100" value="1" type="number">
                            <button class="button" type="submit">Beli</button>
                        </div>
                    </form>
                    <div class="product_pengiriman">
                        <h4>JADWAL PENGIRIMAN</h4>
                        <p>
                            Pemesanan sebelum jam 12.00 WIB dikirim di hari yang sama<br>
                            Pemesanan di atas jam 12.00 WIB dikirim besok<br>
                            Jam kirim : 07.00 WIB, 12.00 WIB dan 16.00 WIB
                        </p>
                    </div>
                    <div class="box-penjual">
                        <div class="info-penjual">
                             <div class="thumb">
                            <img class="profil-penjual" src="<?php echo base_url(); ?>assets/shop/img/store.png" alt="">
                        </div>
                        <div class="body">
                            <h6><?php echo $detail_toko->nama_usaha; ?> <span>(<?php echo $detail_toko->pasar; ?>)</span></h6>
                            <p>Jumlah Produk : <?php echo $detail_toko->jml_produk; ?> </p>
                            <a class="kunjungi" href="#">Kunjungi Penjual</a>
                        </div>
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<section class="product_area related_products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($related_produk as $key => $row): ?>
            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                <div class="product_items">
                    <div class="single_product">
                        <figure>
                            <div class="product_thumb">
                                <a class="primary_img" href="#">
                                    <?php if($row->url_image !== null): ?>
                                    <img src="<?php $res = str_replace("http://localhost/belanja/",base_url(),$row->url_image); echo $res; ?>" alt="">
                                    <?php else : ?>
                                    <img src="<?php echo base_url(); ?>uploads/images/produk/no-photos.jpg" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <figcaption class="product_content">
                                 <a class="produk_detail" href="<?php base_url(); ?><?php echo $row->slug_produk; ?>">
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
    </div>
</section>
