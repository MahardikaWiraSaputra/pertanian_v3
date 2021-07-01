<div class="umkm-detail-section" style="background: linear-gradient(rgba(14, 18, 68, 0.5), rgba(14, 18, 68, 0.5)), url(<?php echo base_url()?>uploads/images/banner/heading-batik.jpg) no-repeat scroll center center;">
    <div class="overlay op-2"></div>
    <div class="container">
        <div class="list-single-header-item fl-wrap">
            <div class="row">
                <div class="col-md-9">
                    <h1><?php echo $detail->NAMA_USAHA; ?></h1>
                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> KECAMATAN <?php echo $detail->NAMA_KEC; ?></a> 
                        <a href="#"> <i class="fal fa-phone"></i><?php echo $detail->TELP; ?></a> <a href="#"><i class="fal fa-envelope"></i> yourmail@domain.com</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <a class="fl-wrap list-single-header-column custom-scroll-link " href="#sec6">
                        <div class="listing-rating-count-wrap single-list-count">
                            <div class="review-score">4.1</div>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <div class="card-popup-rainingvis_bg"><span class="card-popup-rainingvis_bg_item"></span><span class="card-popup-rainingvis_bg_item"></span><span class="card-popup-rainingvis_bg_item"></span><span class="card-popup-rainingvis_bg_item"></span><span class="card-popup-rainingvis_bg_item"></span>
                                    <div></div>
                                </div>
                            </div>
                            <br>
                            <div class="reviews-count">2 reviews</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="list-single-header_bottom fl-wrap">
            <div class="geodir_status_date gsd_close"><i class="fas fa-tags"></i>PERDAGANGAN</div>
            <div class="list-single-stats">
                <ul class="no-list-style">
                    <li><span class="viewed-counter"><i class="fas fa-eye"></i> 256 kali dilihat </span></li>
                </ul>
            </div>
            <div class="list-share-btn text-right sm-left">
             <a data-id="#" id="simpan_produk" class="btn v3" id="simpan_produk"><i class="ion-heart"></i> Hubungi Owner</a>
             <a href="#" class="btn v3"><i class="ion-android-share-alt"></i> Share</a>
                <ul class="social-share">
                    <li class="bg-fb"><a href="#"><i class="ion-social-facebook"></i></a></li>
                    <li class="bg-tt"><a href="#"><i class="ion-social-twitter"></i></a></li>
                    <li class="bg-ig"><a href="#"><i class="ion-social-instagram"></i></a></li>
                </ul>
            </div>
        </div>        
    </div>
</div>

<div class="list-details-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">

                <div id="list-menu" class="list_menu">
                    <ul class="list-details-tab fixed_nav">
                        <li class="nav-item active"><a href="#overview" class="active">Overview</a></li>
                        <li class="nav-item"><a href="#gallery">List Produk</a></li>
                        <li class="nav-item"><a href="#reviews">Reviews</a></li>
                    </ul>
                </div>

                <div class="list-details-wrap">
<!--                     <div id="overview" class="list-details-section">
                        <h4>Overview</h4>
                        <div class="overview-content">
                            <p class="mar-bot-10"><?php echo $detail->NAMA_USAHA; ?>.</p>
                        </div>
                    </div> -->


                    <div class="block-card mb-4">
                       <div class="block-card-header">
                           <h4>Overview</h4>
                           <div class="stroke-shape"></div>
                       </div><!-- end block-card-header -->
                        <div class="block-card-body">
                            <div class="info-list-box">
                                <p class="mar-bot-10"><?php echo $detail->NAMA_USAHA; ?>.</p>
                            </div>
                        </div>
                    </div>

                    <div class="block-card mb-4">
                       <div class="block-card-header">
                           <h4>List Produk</h4>
                           <div class="stroke-shape"></div>
                       </div>
                        <div class="block-card-body">
                            <div class="info-list-box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="listing">
                                            <div class="listing-thumbnail">
                                                <a href="#">
                                                    <img src="<?php echo base_url(); ?>/uploads/images/produk/498484-2.png" alt="listing">
                                                </a>
                                            </div>
                                            <div class="listing-body">
                                                <div class="listing-author">
                                                    <div class="dropdown options-dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul>
                                                                <li>
                                                                    <a href="tel:+123456789"> <i class="fas fa-phone"></i> Call Agent</a>
                                                                </li>
                                                                <li>
                                                                    <a href="mailto:+123456789"> <i class="fas fa-envelope"></i> Send Message</a>
                                                                </li>
                                                                <li>
                                                                    <a href="listing-details-v1.html"> <i class="fas fa-bookmark"></i> Book Tour</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="listing-title"> 
                                                    <a href="#" title="The Muse Sarovar Portico">Produk UMKM 1</a> 
                                                </h5>
                                                <span class="listing-price">3,500$ <span>/Person</span> </span>
                                                <p class="listing-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="acr-listing-icons">
                                                    <div class="acr-listing-icon" data-toggle="tooltip" title="" data-original-title="Price">
                                                        <img src="assets/img/svg/cost.svg" alt="icon"> <span class="acr-listing-icon-value">2,499</span>
                                                    </div>
                                                    <div class="acr-listing-icon" data-toggle="tooltip" title="" data-original-title="Guest">
                                                        <img src="assets/img/svg/guest.svg" alt="icon"> <span class="acr-listing-icon-value">200</span>
                                                    </div>
                                                    <div class="acr-listing-icon" data-toggle="tooltip" title="" data-original-title="Vendor">
                                                        <img src="assets/img/svg/vendor.svg" alt="icon"> <span class="acr-listing-icon-value">1</span>
                                                    </div>
                                                </div>
                                                <div class="listing-gallery-wrapper"> <a href="listing-details-v1.html" class="btn-custom btn-sm secondary">View Details</a>
                                                    <a href="#" data-toggle="tooltip" title="" class="listing-gallery" data-original-title="Gallery"> <i class="fas fa-camera"></i> 
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="listing">
                                            <div class="listing-thumbnail">
                                                <a href="#">
                                                    <img src="<?php echo base_url(); ?>/uploads/images/produk/498484-2.png" alt="listing">
                                                </a>
                                            </div>
                                            <div class="listing-body">
                                                <h5 class="listing-title"> 
                                                    <a href="#" title="The Muse Sarovar Portico">Produk UMKM 2</a>
                                                </h5>
                                                <p class="listing-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="acr-listing-icons">
                                                    
                                                </div>
                                                <div class="listing-gallery-wrapper"> <a href="listing-details-v1.html" class="btn-custom btn-sm secondary">View Details</a>
                                                    <a href="#" data-toggle="tooltip" title="" class="listing-gallery" data-original-title="Gallery"> <i class="fas fa-camera"></i> 
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
