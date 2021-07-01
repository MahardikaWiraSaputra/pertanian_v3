<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIDATAN</title>
    <link href="<?php echo base_url();?>assets/theme/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/theme/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/theme/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/theme/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/select2.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/css/sweetalert.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/umkm/images/favicon.png" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/umkm/vendors/jquery-toast-plugin/jquery.toast.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript">var site = '<?php echo base_url(); ?>';</script>
    <script src="<?php echo base_url();?>assets/theme/js/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/umkm/js/vendor.bundle.base.js"></script> -->
</head>

<body>

    <!-- Begin page -->
    <div class="accountbg"></div>
        <div class="home-btn d-none d-sm-block">
                <a href="index-2.html" class="text-white"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">
                                <a href="index-2.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="24"></a>
                        </div>
                        <h5 class="font-18 text-center">Sidatan</h5>
    
                        <form class="form-horizontal m-t-30" action="" id="form_login">
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Username</label>
                                    <input class="form-control" id="username" name="username" type="text" required="" placeholder="Username">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-12">
                                        <label>Password</label>
                                    <input class="form-control" type="password" id="password"  name="password" required="" placeholder="Password">
                                </div>
                            </div>
    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <a href="javascript:void(0)" id="submit-login" class="btn btn-primary btn-block btn-lg waves-effect waves-light">Log In</a>
                                </div>
                            </div>
    
                        </form>
                    </div>
    
                </div>
            </div>
        <!-- END wrapper -->
    
    <!-- jQuery  -->
    <script src="<?php echo base_url();?>assets/umkm/js/jquery.bootpag.js"></script>
    <script src="<?php echo base_url();?>assets/theme/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/theme/js/metismenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/theme/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url();?>assets/theme/js/waves.min.js"></script>

    <script src="<?php echo base_url();?>assets/theme/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url();?>assets/theme/js/app.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/custom.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/js/select2.min.js"></script>
    <script src="<?php echo base_url();?>assets/umkm/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
             $('#submit-login').on('click',function(e){
                e.preventDefault();
                var username = $('#username').val();
                var password = $('#password').val();

                if (username == '' || password == '') {
                    $.toast({
                      heading: 'LOGIN GAGAL',
                      text: 'Username & Password tidak boleh kosong.',
                      showHideTransition: 'slide',
                      icon: 'warning',
                      loaderBg: '#57c7d4',
                      position: 'top-right'
                    })
                }
                else {
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('backend/login/sign')?>",
                        dataType : "JSON",
                        data : {username: username, password: password},
                        cache : false,
                        success: function(data){
                            if(data.success == true) {
                                $.toast({
                                    heading: 'LOGIN BERHASIL',
                                    text: data.message,
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    loaderBg: '#f96868',
                                    position: 'top-right'
                                })

                                window.location = data.url;
                                setTimeout(function(){
                                    window.location = data.url;
                                }, 3000);
                            }
                            else {

                                $.toast({
                                    heading: 'LOGIN GAGAL',
                                    text: data.message,
                                    showHideTransition: 'slide',
                                    icon: 'error',
                                    loaderBg: '#f2a654',
                                    position: 'top-right'
                                })
                            }                       
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>

