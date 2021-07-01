<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Pertanian</title>

    <link href="<?php echo base_url();?>assets/theme/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/theme/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/theme/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/theme/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/select2.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/sweetalert.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/umkm/images/favicon.png" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript">var site = '<?php echo base_url(); ?>';</script>
    <script src="<?php echo base_url();?>assets/theme/js/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/umkm/js/vendor.bundle.base.js"></script> -->
</head>
<body>
<!-- Begin page -->
<div id="wrapper">
	<!-- Top Bar Start -->
	<div class="topbar">
		<!-- LOGO -->
		<div class="topbar-left">
			<a href="index-2.html" class="logo">
				<span class="logo-light">
					<i class="mdi mdi-camera-control"></i> Sidatan
                        
				</span>
				<span class="logo-sm">
					<i class="mdi mdi-camera-control"></i>
				</span>
			</a>
		</div>
		<nav class="navbar-custom">
			<ul class="navbar-right list-inline float-right mb-0">
				<!-- language-->
				
				<!-- full screen -->
				<li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
					<a class="nav-link waves-effect" href="#" id="btn-fullscreen">
						<i class="mdi mdi-arrow-expand-all noti-icon"></i>
					</a>
				</li>
				<!-- notification -->
				<li class="dropdown notification-list list-inline-item">
					<a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
						<i class="mdi mdi-bell-outline noti-icon"></i>
						<!-- <span class="badge badge-pill badge-danger noti-icon-badge">3</span> -->
					</a>
					
				</li>
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/flags/us_flag.jpg" class="mr-2" height="12" alt=""> <?php echo $this->session->userdata('full_name'); ?>
                    </a>
                </li>
				<li class="dropdown notification-list list-inline-item">
					<div class="dropdown notification-list nav-pro-img">
						<a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="<?php echo base_url();?>assets/theme/images/users/user-4.jpg" alt="user" class="rounded-circle">
							</a>
							<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
								<!-- item-->
								<a class="dropdown-item" href="#">
									<i class="mdi mdi-account-circle"></i> Profile
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item text-danger" href="<?php echo base_url();?>backend/login/logout">
									<i class="mdi mdi-power text-danger"></i> Logout
								</a>
							</div>
						</div>
					</li>
				</ul>
				<ul class="list-inline menu-left mb-0">
					<li class="float-left">
						<button class="button-menu-mobile open-left waves-effect">
							<i class="mdi mdi-menu"></i>
						</button>
					</li>
				</nav>
			</div>
			<!-- Top Bar End -->
			<!-- ========== Left Sidebar Start ========== -->
			<div class="left side-menu">
				<div class="slimscroll-menu" id="remove-scroll">
					<!--- Sidemenu -->
					<div id="sidebar-menu">
						<!-- Left Menu Start -->
						<ul class="metismenu" id="side-menu">                    
							<li class="menu-title">Menu</li>
                            <li id="mn" onclick="load('backend/main/dashboard','#contents'); switch_menu(this);">
                                <a class="waves-effect mm-active" href="javascript:void(0)"> <i class="icon-accelerator"></i>
                                <span class="">Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-title">Data</li>
                            <li class="">
                                <a href="javascript:void(0);" class="waves-effect" aria-expanded="false"><i class="icon-mail-open"></i><span> Tanaman Pangan <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu mm-collapse" style="height: 0px;">
                                    <li onclick="load('backend/pertanian','#contents'); switch_menu(this);"><a href="javascript:void(0)"><i class="mdi mdi-database-edit"></i>&nbsp; List Data</a></li>
                                    <li onclick="load('backend/pertanian/laporan','#contents'); switch_menu(this);"><a href="javascript:void(0)"><i class="mdi mdi-google-spreadsheet"></i>&nbsp; Laporan</a></li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript:void(0);" class="waves-effect" aria-expanded="false"><i class="icon-mail-open"></i><span> Hortikultura <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu mm-collapse" style="height: 0px;">
                                    <li onclick="load('backend/horti','#contents'); switch_menu(this);"><a href="javascript:void(0)"><i class="mdi mdi-database-edit"></i>&nbsp; List Data</a></li>
                                    <li onclick="load('backend/horti/laporan','#contents'); switch_menu(this);"><a href="javascript:void(0)"><i class="mdi mdi-google-spreadsheet"></i>&nbsp; Laporan</a></li>
                                </ul>
                            </li>
                            <li class="menu-title">Data </li>
                            <li class="">
                                <a href="javascript:void(0);" class="waves-effect" aria-expanded="false">
                                <i class="icon-mail-open"></i><span> Neraca <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu mm-collapse" style="height: 0px;">
                                    <li onclick="load('backend/neraca','#contents'); switch_menu(this);"><a href="javascript:void(0)"><i class="mdi mdi-database-edit"></i>&nbsp; List Data</a></li>
                                    <li onclick="load('backend/neraca/laporan','#contents'); switch_menu(this);"><a href="javascript:void(0)"><i class="mdi mdi-google-spreadsheet"></i>&nbsp; Laporan</a></li>
                                </ul>
                            </li>
                            <li class="menu-title">Master Data </li>
                            <li id="mn" onclick="load('backend/master_data/index_lahan_pertanian','#contents'); switch_menu(this);">
                                <a class="waves-effect" href="javascript:void(0)"> <i class="icon-mail-open"></i>
                                <span class="">Luas Lahan Pertanian</span>
                                </a>
                            </li>
                            <li class="menu-title">Hak Akses </li>
                            <li class="">
                                <a href="javascript:void(0);" class="waves-effect" aria-expanded="false">
                                <i class="icon-mail-open"></i><span> Hak Akses <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu mm-collapse" style="height: 0px;">
                                    <li onclick="load('backend/users','#contents'); switch_menu(this);"><a href="javascript:void(0)"><i class="mdi mdi-database-edit"></i>&nbsp; Pengguna</a></li>
                                    <li onclick="load('backend/group_permissions','#contents'); switch_menu(this);"><a href="javascript:void(0)"><i class="mdi mdi-google-spreadsheet"></i>&nbsp; Hak Akses</a></li>
                                </ul>
                            </li>


						</ul>
					</div>
					<!-- Sidebar -->
					<div class="clearfix"></div>
				</div>
				<!-- Sidebar -left -->
			</div>
			<!-- Left Sidebar End -->
			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                    <!-- Start content -->
                    <?php $this->load->view($page);?>
                    </div>
                </div>
			</div>

                <div class="modal fade" id="ajax-modal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="modal_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ajax-modal-sm" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="modal_content_sm"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
    <!-- 
    <script src="<?php echo base_url();?>assets/umkm/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/off-canvas.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/template.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/settings.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/todolist.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/select2.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/umkm/js/sweetalert2.min.js"></script> -->

    <!-- jQuery  -->
    <script src="<?php echo base_url();?>assets/umkm/js/jquery.bootpag.js"></script>
    <script src="<?php echo base_url();?>assets/theme/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/theme/js/metismenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/theme/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url();?>assets/theme/js/waves.min.js"></script>

    <script src="<?php echo base_url();?>assets/theme/pages/dashboard.init.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url();?>assets/theme/js/app.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/custom.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/select2.min.js"></script>
    </body>
</html>