<?php
session_start();
?>

<!doctype html>
<html lang="es">

    <head>
    
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
    
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    
    </head>

    <body>

    
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="account-pages mt-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-5 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="d-flex p-3">
                                    <div>
                                        <a href="index.html" class="">
                                            <img src="assets/images/small/logo.png" alt="" height="70" class="auth-logo logo-dark">
                                            <img src="assets/images/small/logo.png" alt="" height="70" class="auth-logo logo-light">
                                        </a>
                                    </div>
                                    <div class="ms-auto text-end">
                                    <!-- <h1><?php echo $_SESSION['nombre']; ?></h1> -->
                                        <h4 class="font-size-18">Bienvenido!</h4>
                                        <p class="text-muted mb-0">Ingresa a Validación GEI.</p>
                                    </div>
                                </div>
                                <div class="p-3">
    
                                    <div class="form-horizontal">
    
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Usuario</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                                        </div>
    
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Contraseña</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                        </div>
    
                                        <div class="row mt-4" >
                                            <div align="center">
                                                <button id="btnLogin" class="btn btn-primary w-md waves-effect waves-light">Log In</button>
                                            </div>
                                        </div>
    
                                        <div class="mb-0 row">
                                            <div class="col-12 mt-4 text-center">
                                                <!-- <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a> -->
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

                             
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/js/home.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/js/app.js"></script>

        <script src="assets/js/sistema/login.js"></script>

    </body>
</html>
