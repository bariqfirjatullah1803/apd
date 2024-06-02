<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login page | SIMPERDINSETDA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <!-- <div class="home-btn"><a href="/" class="text-white router-link-active"><i class="fas fa-home h2"></i></a></div> -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">

                                    <div class="text-center">
                                        <!-- LOGO MORVIN -->
                                        <img src="assets/images/logo-renkeu-land.png" height="100" alt="logo">

                                        <h6 class="text-primary mb-2 mt-4">Selamat Datang di SIMPERDINSETDA</h6>
                                        <!-- <p class="text-muted"> Masukkan Username dan Password Anda.</p> -->
                                    </div>

                                    <!-- Action where login button will go -->
                                    <form class="form-horizontal mt-4 pt-2 login-form" method="POST" action="<?= base_url(); ?>login/createSession">

                                        <div class="mb-3">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name='user' placeholder="Masukkan username" autocomplete="off">
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" name='pass' placeholder="Masukkan password" autocomplete="off">
                                        </div>

                                        <div class="mb-3" style="display: none;">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userid" name='idbag' placeholder="idbagian">
                                        </div>

                                        <div>
                                            <button id='btnlogin' class="mt-3 btn btn-primary w-100 waves-effect waves-light">Log In</button>
                                        </div>
                                    </form>

                                    <script>
                                        // Disable username and userpassword Enter Key
                                        document.getElementById('username').addEventListener('keypress', function(event) {
                                            if (event.keyCode == 13) {
                                                event.preventDefault();
                                            }
                                        })
                                        document.getElementById('userpassword').addEventListener('keypress', function(event) {
                                            if (event.keyCode == 13) {
                                                event.preventDefault();
                                            }
                                        })


                                        document.getElementById('userpassword').onchange = function() {
                                            getid();
                                        }

                                        function getid() {
                                            var username = document.getElementById('username').value;
                                            var password = document.getElementById('userpassword').value;
                                            if (username != '' && password != '') {
                                                //nama password
                                                $.post('assets/ajax/processlogin.php', {
                                                    user_name: username,
                                                    user_pass: password
                                                }, function(data) {
                                                    if (data == '') {
                                                        alert("Username/Password salah");
                                                    } else {
                                                        console.log(data);
                                                        document.getElementById('userid').value = data;
                                                    }
                                                });
                                            } else if (username == trim('') && password == trim('')) {
                                                alert("Username/Password kosong");
                                            }
                                        }
                                    </script>

                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            Version : 0.8 <br>
                            <!-- <p>Don't have an account ?<a href="auth-register.html" class="fw-bold text-white"> Register</a> </p> -->
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> Ari Mahardika. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>