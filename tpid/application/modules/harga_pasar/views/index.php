<div class="breadcrumb--area white-bg-breadcrumb" style="height: 250px!important;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="breadcrumb-title">Harga Komoditas Pasar</h2>
                        <!-- <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="#">Shop</a></li>
                            </ol>
                        </nav> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Meta-->
    <div class="shop-meta section-padding-120-0">
        <div class="container">
            <div class="row">
                <!-- Shop Meta Data-->
                <div class="col-12">
                    <div class="shop-meta-data d-sm-flex align-items-center justify-content-between">
                        <div class="col-md-5">
                            <!-- Total Product View-->
                            <div class="total-product-view mb-4 mb-sm-0">
                                <span>Menampilkan<span class="rs-counter">74</span>Komoditas
                                <span class="rs-counter">74</span>
                                </span>
                            </div>
                        </div>
                        <!-- Sorting Data-->
                        <div class="col-md-3 p-4">
                            <select class="form-select" id="price_pasar" onchange="get_price_pasar()">
                                <option>Pilih Pasar</option>
                                <?php foreach($get_pasar as $pasar):?>
                                  <?php if($pasar == 'PASAR BANYUWANGI'):?>
                                    <option value="<?=$pasar['KET'];?>" selected><?=$pasar['KET'];?></option>
                                  <?php else:?>
                                    <option value="<?=$pasar['KET'];?>"><?=$pasar['KET'];?></option>
                                  <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <!-- <div class="col-md-4 p-4"> -->
                            <!-- <select class="form-select">
                                <option selected>Urutkan Berdasarkan</option>
                                <option value="2">Termahal</option>
                                <option value="3">Termurah</option>
                            </select> -->
                            <!-- <div class="single-widget-area"> -->
                            <!-- Search Form-->
                            <!-- <form class="widget-form" action="#" method="post">
                              <input class="form-control" type="search" placeholder="Masukkan komoditas yang dicari">
                              <button type="submit"><i class="fa fa-search"></i></button>
                            </form> -->
                          <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Area-->
    <div class="shop--area shop-fullwidth section-padding-120">
    <img src="<?=base_url()?>assets/img/core-img/hero-4.png" alt="" style="position: absolute;top: 260px;z-index: -1;">
    <img src="<?=base_url()?>assets/img/core-img/hero-4-2.png" alt="" style="position: absolute;top: 260px;right: -1px;z-index: -1;">
        <div class="container">
          <div class="section-heading text-center">
                <h2 style="text-shadow: 2px 2px #dcd4d4;">Harga Komoditas <b id="title_price_pasar">Pasar Banyuwangi</b></h2>
                <p>Harga di bandingkan tanggal 28 Maret 2021</p>
          </div>
            <div class="row g-5 here_price">
                <!-- Single Shop Card-->
                
            </div>
        </div>
        <!-- Pagination Area-->
        <!-- <div class="saasbox-pagination-area section-padding-0-120">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">9</a></li>
                </ul>
            </nav>
        </div> -->
    </div>