<div class="block type-10 style-1">
    <img class="center-image" src="<?php echo base_url();?>assets/home/img/header-bg/cyber-security.jpg" />
    <div class="main-banner-height">
        <div class="swiper-container" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="center-image" src="<?php echo base_url();?>assets/home/img/header-bg/cyber-security.jpg" />
                </div>
                <div class="swiper-slide">
                    <img class="center-image" src="<?php echo base_url();?>assets/home/img/header-bg/insiden-response.jpg" />
                </div>
            </div>
            <div class="pagination style-1"></div>
        </div>
    </div>
</div>

<div class="latest">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="news-list">
                    <div class="section-header">
                        <h2>Info Terbaru</h2>
                    </div>
                    <div class="section-content">
                        <?php foreach ($last_news as $key => $row):?>
                        <div class="news-item">
                            <div class="row">
                                <div class="col-xs-3 col-md-3">
                                    <a href="#"> 
                                        <img src="<?php echo $row->featured_img; ?>" alt="image">
                                    </a>
                                </div>
                                <div class="col-xs-9 col-md-9">
                                    <h3><a href="#"><?php echo $row->judul; ?></a></h3>
                                    <p><?php echo substr($row->konten, 0, 100); ?>..</p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="event-list">
                    <div class="section-header">
                        <h2>Agenda Events</h2>
                    </div>
                    <div class="section-content">
                        <div class="event-content">
                            <?php foreach ($last_event as $key => $row):?>
                                <?php $tanggal = mediumdate_indo(date('Y-m-d', strtotime($row->created))); ?>
                            <div class="event-item">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <ul class="event-date">
                                            <li class="month"><?php echo str_replace('-',' ',substr($tanggal,3, 3)); ?></li>
                                            <li class="date"><?php echo substr($tanggal, 0,2); ?></li>
                                            <li class="day"><?php echo str_replace('-',' ',substr($tanggal,6)); ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-9">
                                        <h4><a href="#"><?php echo $row->event; ?></a></h4>
                                        <p><?php echo $row->penyelenggara; ?></p>
                                        <span class="event-location">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row->lokasi; ?>
                                        </span>
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
</div>

<div class="block type-8 scroll-to-block" style="background-image: url(images/bg/07.jpg);background-size: cover;position: relative;    z-index: 1;">
    <div class="container">
        <div class="row wow fadeInDown">
            <div class="block-header col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0">
                <h2 class="title">Alur Pengaduan Insiden</h2>
                <div class="text">Laporkan segera jika anda menemukan Insiden Siber agar cepat tertangani dan dampak tidak semakin luas. </div>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-sm-4 mb-4 mb-sm-0">
                <div class="feature-info text-center">
                    <div class="feature-info-icon"> <i class="glyphicon glyphicon-screenshot fa-4x text-dark bg-white rounded-circle"></i>
                        <img class="d-lg-block d-none" src="<?php echo base_url();?>assets/home/img/arrow-01.png" alt="">
                    </div>
                    <h4 class="title">Kumpulkan Bukti</h4>
                    <p class="text">Bukti Insiden berupa foto / screenshoot insiden/ log file yang ditemukan </p>
                </div>
            </div>
            <div class="col-sm-4 mb-4 mb-sm-0">
                <div class="feature-info text-center">
                    <div class="feature-info-icon"> <i class="glyphicon glyphicon-envelope fa-4x text-dark bg-white rounded-circle"></i>
                        <img class="d-lg-block d-none" src="<?php echo base_url();?>assets/home/img/arrow-02.png" alt="">
                    </div>
                    <h4 class="title">Laporkan Insiden</h4>
                    <p class="text">Laporkan insiden yang ditemukan beserta bukti insiden melalui website atau email.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature-info text-center">
                    <div class="feature-info-icon"> <i class="glyphicon glyphicon-time fa-4x text-dark bg-white rounded-circle"></i>
                    </div>
                    <h4 class="title">Aduan Ditangani</h4>
                    <p class="text">Aduan yang masuk akan segera diverifikasi dan segera ditangani untuk mengurangi dampak yang ditimbulkan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block type-15 scroll-to-block" data-rel="4">
    <div class="container">
        <div class="row wow fadeInDown">
            <div class="block-header col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0">
                <h2 class="title">Peringatan Keamanan Siber</h2>
                <div class="text">Dapatkan Informasi terbaru mengenai keamanan informasi atau celah kerawanan website / sistem.</div>
            </div>
        </div>
        <div class="news-wrapper wow fadeInUp">
            <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="1" data-md-slides="3" data-lg-slides="3">
                <div class="swiper-wrapper">
                    <?php foreach ($last_info_keamanan as $key => $row):?>
                    <div class="swiper-slide">
                        <div class="news-entry">
                            <div class="blog-single">
                                <div class="blog-img"> 
                                    <a href="#"><img src="<?php echo $row->featured_img; ?>" alt=""></a>
                                </div>
                                <div class="blog-post">
                                    <a href="#"><h4><?php echo $row->judul; ?></h4></a>
                                    <p><?php echo substr($row->konten, 0, 100); ?>..</p>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="pagination"></div>
            </div>
        </div>
    </div>
</div>