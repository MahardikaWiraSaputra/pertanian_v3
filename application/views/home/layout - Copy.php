<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="" />
    <meta name="Description" CONTENT="">
    <meta name="robots" content="noindex,nofollow">
    <link rel="icon" type="image/png" href="#" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/home/css/plugin.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/home/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/home/css/switcher/skin-aqua.css" media="screen" id="style-colors" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/home/modules/izitoast/css/iziToast.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>assets/home/js/jquery.js"></script>
    <script type="text/javascript"> var site = '<?php echo base_url();?>';</script>
    <title>Banyuwangi Belanja Online</title>
</head>
<body>
    <div class="page-wrapper">
        <header class="header transparent scroll-hide">
            <div class="site-navbar-wrap v2">
                <div class="container">
                    <div class="site-navbar">
                        <div class="row align-items-center">
                            <div class="col-md-3 col-6">
                                <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url()?>assets/home/images/logotes.png" alt="logo" class="img-fluid"></a>
                            </div>
                            <div class="col-md-9 col-6">
                                <nav class="site-navigation float-left">
                                    <div class="container">
                                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                                            <li style="font-size: 15px;font-weight: 600;letter-spacing: 1px;margin-right: 10px;">
                                                <a href="#">Beranda</a>
                                            </li>
                                            <li style="font-size: 15px;letter-spacing: 1px;margin-right: 10px;">
                                                <a href="<?php echo base_url(); ?>list_produk">Shop</a>
                                            </li>
                                            <li style="font-size: 15px;letter-spacing: 1px;margin-right: 10px;">
                                                <a href="#">Kontak</a>
                                            </li>
                                            <li style="font-size: 15px;letter-spacing: 1px;margin-right: 10px;">
                                                <a href="#">Tentang Kami </a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                                <div class="d-lg-none sm-right">
                                    <a href="#" class="mobile-bar js-menu-toggle">
                                        <span class="ion-android-menu"></span>
                                    </a>
                                </div>
                                <div class="add-list float-right">
                                    <a class="btn v8" href="<?php echo base_url()?>akun/register">Daftar Sekarang <i class="ion-plus-round"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-mobile-menu">
                        <div class="site-mobile-menu-header">
                            <div class="site-mobile-menu-close  js-menu-toggle">
                                <span class="ion-ios-close-empty"></span>
                            </div>
                        </div>
                        <div class="site-mobile-menu-body"></div>
                    </div>
                </div>
            </div>
        </header>
        
        <?php if(isset($layout)) { $this->load->view($layout); } ?>

        <span class="scrolltotop"><i class="ion-arrow-up-c"></i></span>
    </div>
    <div class="footer-wrapper no-pad-tb v1" style="background-image: url(<?php echo base_url()?>assets/home/images/bg/footer-bg-1.png)">
        <div class="footer-top-area section-padding">
            <div class="container">
                <div class="row nav-folderized">
                    <div class="col-lg-3 col-md-12">
                        <div class="footer-logo">
                            <a href="index.html"> <img src="<?php echo base_url()?>assets/home/images/logotes.png" alt="logo"></a>
                            <div class="company-desc">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio excepturi nam totam sequi, ipsam consequatur repudiandae libero illum.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="footer-content nav">
                            <h2 class="title">Link</h2>
                            <ul class="list">
                                <li><a class="link-hov style2" href="#">Login</a></li>
                                <li><a class="link-hov style2" href="#">My Account</a></li>
                                <li><a class="link-hov style2" href="#">Daftarkan UMKM</a></li>
                                <li><a class="link-hov style2" href="#">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="footer-content nav">
                            <h2 class="title">Kategori</h2>
                            <ul class="list">
                                <li><a class="link-hov style2" href="#">Konveksi</a></li>
                                <li><a class="link-hov style2" href="#">Makanan</a></li>
                                <li><a class="link-hov style2" href="#">Minuman</a></li>
                                <li><a class="link-hov style2" href="#">Pariwisata</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="footer-content nav">
                            <h2 class="title">Hubungi Kami</h2>
                            <ul class="list footer-list">
                                <li>
                                    <div class="contact-info">
                                        <div class="icon">
                                            <i class="ion-ios-location"></i>
                                        </div>
                                        <div class="text">Jalan A. Yani 100 Banyuwangi Jawa Timur</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-info">
                                        <div class="icon">
                                            <i class="ion-email"></i>
                                        </div>
                                        <div class="text"><a href="#">info@listumkm.com</a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-info">
                                        <div class="icon">
                                            <i class="ion-ios-telephone"></i>
                                        </div>
                                        <div class="text">(0333) 711711</div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="social-buttons style2">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <p>&copy; 2020 Direktori UMKM. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url()?>assets/home/js/plugin.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDP-whoPJd-vZifgGmMDl0h7HRBCZQftOg&libraries=geometry&sensor=false"></script>
    <script src="<?php echo base_url()?>assets/home/js/markerclusterer.js"></script>
    <script src="<?php echo base_url()?>assets/home/js/maps.js"></script>
    <script src="<?php echo base_url()?>assets/home/js/infobox.min.js"></script>
    <script src="<?php echo base_url()?>assets/home/js/main.js"></script>
    <script src="<?php echo base_url()?>assets/home/js/jquery.bootpag.js"></script>
    <script src="<?php echo base_url()?>assets/home/modules/izitoast/js/iziToast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <?php echo $this->load->view('home/js');?>
</body>

</html>