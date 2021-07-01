    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Login</h3>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">home</a></li>
                            <li>Account</li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form id="form_login">
                            <p>
                                <label>Username or email <span>*</span></label>
                                <input type="text" id="username" name="username" placeholder="Username">
                            </p>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input type="password" id="password" name="password" autocomplete="off" placeholder="Password">
                            </p>
                            <div class="login_submit"> 
                                <a class="account_form button" href="javascript:void(0)" id="submit-login">login</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form action="#">
                            <p>
                                <label>Email address <span>*</span>
                                </label>
                                <input type="text">
                            </p>
                            <p>
                                <label>Passwords <span>*</span>
                                </label>
                                <input type="password">
                            </p>
                            <div class="login_submit">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        url  : "<?php echo base_url('account/login')?>",
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