    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Cari Produk</h3>
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
                                     <li><a href="#">Sayuran</a></li>
                                     <li><a href="#">Buah-Buahan</a></li>
                                     <li><a href="#">Daging Ayam</a></li>
                                     <li><a href="#">Daging Sapi</a></li>
                                     <li><a href="#">Seafood</a></li>
                                     <li><a href="#">Susu dan telur</a></li>
                                     <li><a href="#">Bumbu Dapur</a></li>
                                     <li><a href="#">Beras</a></li>
                                     <li><a href="#">Gula</a></li>
                                     <li><a href="#">Minyak Goreng</a></li>
                                     <li><a href="#">Siap Saji</a></li>
                                </ul>
                            </div>
                            
                            <div class="widget_list widget_color">
                                <h3>Pasar</h3>
                                <ul>
                                    <li> <a href="#"> Pasar Blambangan</a></li>
                                    <li> <a href="#"> Pasar Banyuwangi</a></li>
                                    <li> <a href="#"> Pasar Rogojampi</a></li>
                                    <li> <a href="#"> Pasar Srono</a></li>
                                    <li> <a href="#"> Pasar Jajag</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="shop_toolbar_wrapper">
                        <div class=" niceselect_option">
                            <form class="select_option" action="#">
                                <select name="orderby" id="short">
                                    <option selected value="1">Urutkan harga terendah</option>
                                    <option value="2">Urutkan harga tertinggi</option>
                                    <option value="3">Urutkan produk terbaru</option>
                                </select>
                            </form>
                        </div>
                        <div class="page_amount">
                            <p>Showing 1–9 of 21 results</p>
                        </div>
                    </div>
                    <div class="row shop_wrapper">
                        <?php foreach ($list_sementara as $key => $row): ?>
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
                                             <a class="produk_detail" href="<?php base_url(); ?>produk/<?php echo $row->slug_produk; ?>">
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
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a>
                                </li>
                                <li><a href="#">3</a>
                                </li>
                                <li class="next"><a href="#">next</a>
                                </li>
                                <li><a href="#">>></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>