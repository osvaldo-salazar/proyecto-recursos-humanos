<?php
session_start();
ini_set('error_reporting',0);
include 'includes/conexion.php';

mysqli_set_charset($db, 'utf8mb4');
?>

<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Departamentos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon2.ico">
        
        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    
        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
        <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
        <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
        <!-- Dialog Confirm Css-->
        <link rel="stylesheet" href="assets/css/jquery-confirm.min.css">

    </head>

    <body data-sidebar="colored">
        
    <input type="hidden" id="idD" value="0">
    <input type="hidden" id="accion" value="crear">

	
   <?php include 'includes/header.php'; ?>                


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

					<div class="row">
                        <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 align="center" class="card-title">Lista Departametos</h4>
                                
                                <div class="p-3" style="width:100%;margin: 0 auto;">
                                    <div class="form-horizontal" action="">

                                        <div class="mb-3">
                                            <label class="form-label" for="txtNombre">Código</label>
                                            <input type="text" class="form-control validacion form-control-lg" id="txtNombre" value="" placeholder="Ingrese el código">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="txtNombre2">Descripción</label>
                                            <input type="text" class="form-control validacion form-control-lg" id="txtNombre2" value="" placeholder="Ingrese la descripcion">
                                        </div>

                                        <div style="display: none; margin: 0 auto; width: 35%; text-align: center; font-size: 0.9rem; padding: 10px;" id="mensaje" class="alert alert-info" role="alert"><strong>Información:</strong> almacenada satisfactoriamente.
                                        </div><br>

                                         <div style="display: none; margin: 0 auto; width: 35%; text-align: center; font-size: 0.9rem; padding: 10px; " id="mensaje4" class="alert alert-danger" role="alert">
                                         <strong>Campos</strong> requeridos vacíos!!.
                                         </div> <br>

                                        <div style="display: none; margin: 0 auto; width: 35%; text-align: center; font-size: 0.9rem; padding: 10px;" id="mensaje3" class="alert alert-info" role="alert"><strong>Información:</strong> Eliminada.
                                        </div><br>
                                        
                                        <div align="center">
                                            <button id="btnCrear" class="btn btn-primary w-md waves-effect waves-light crearLugar" type="submit">Guardar</button>
                                        </div>
                                        
                                    </div>
                                </div>

                                                                        
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descripción</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php

                                            $sql = "SELECT * FROM departamentos";
                                            $consulta = mysqli_query($db,$sql);

                                            while($fila = mysqli_fetch_assoc($consulta)){

                                                echo "<tr>
                                                    <td>$fila[codigo]</td>
                                                    <td>$fila[nombreDepartamento]</td>
                                                     <td>
                                                        
                                                        <a onclick='editarDepartamento($fila[idDepartamentos])' class='btn btn-outline-secondary btn-sm' title='Edit'>
                                                            <i class='fas fa-pencil-alt'></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a onclick='eliminarDepartamento($fila[idDepartamentos])' class='btn btn-outline-secondary btn-sm' title='Eliminar'>
                                                            <i class='fas fa-trash-alt'></i>
                                                        </a>
                                                    </td>
                                                </tr>";


                                            }

                                            ?>


                                    </tbody>
                                    
                                </table>

                            </div> <!-- end card-body -->
                        </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                           
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                
                <footer class="footer text-center">
                    © <script>document.write(new Date().getFullYear())</script> Foxia <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-end">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0">
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch">
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox"  id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div style="width: 100%;text-align:center">
                                            <button id="btnCrear" class="btn btn-primary w-md waves-effect waves-light" type="submit">Guardar</button>
                                        </div>
                                        
                                    </div> <!-- end card-body -->
                                </div>
                            </div> <!-- end co
            
            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

                             
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        
        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script> 

        <script src="assets/libs/select2/js/select2.min.js"></script>
        <script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
        <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>
        <script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    
        <script src="assets/js/pages/form-advanced.init.js"></script>

        <!--tinymce js-->
        <script src="assets/libs/tinymce/tinymce.min.js"></script>

        <script src="assets/js/app.js"></script>
        
        <script src="assets/js/jquery-confirm.min.js"></script>
       
        <script src="assets/js/sistema/validacions_campos.js"></script>
        <script src="assets/js/sistema/crearDepartamento.js"></script>
        <script src="assets/js/sistema/eliminar-departamento.js"></script>
        <script src="assets/js/sistema/editar-departamento.js"></script>

        
</body>