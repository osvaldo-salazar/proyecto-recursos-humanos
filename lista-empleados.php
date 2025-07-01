<?php
session_start();
ini_set('error_reporting',0);
include 'includes/conexion.php';
?>

<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Lista Empleados</title>
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
                                    	
                                    	<h4 class="card-title text-center">Lista de Empleados</h4>

                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Cedula</th>
                                                    <th>Telefono</th>
                                                    <th>Correo Institucional</th>
                                                    <th>Departamento</th>
                                                    <th>Puesto</th>
                                                    <th>Fecha Nacimiento</th>
                                                    <th>Fecha Ingreso Empresa</th>
                                                    <th>Fecha Ingreso Gobierno</th>
                                                    <th>Tipo Planilla</th>
                                                    <th>Tipo Seguro</th>
                                                    <th>Numero Poliza</th>
                                                    <th>Categoria</th>
                                                    <th>Sub Categoria</th>
                                                    <th>Grado Acádemico</th>
                                                    <th>Editar</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php

                                            $sql = "SELECT * FROM empleados";
                                            $consulta = mysqli_query($db,$sql);

                                            while($fila = mysqli_fetch_assoc($consulta)){
                                                echo "<tr>
                                                    <td>$fila[nombre]</td>       
                                                    <td>$fila[cedula]</td>                                           
                                                    <td>$fila[telefono]</td>                                           
                                                    <td>$fila[correo_institucional]</td>";
                                                    $sql2 = "SELECT nombreDepartamento FROM departamentos WHERE idDepartamentos  = $fila[id_departamento]";
                                                    $consulta2 = mysqli_query($db,$sql2);

                                                    while($fila2 = mysqli_fetch_assoc($consulta2)){
                                                        echo "<td>$fila2[nombreDepartamento]</td>";
                                                    }

                                                    $sql2 = "SELECT nombrePuesto FROM puestos WHERE idPuestos  = $fila[id_puesto]";
                                                    $consulta2 = mysqli_query($db,$sql2);

                                                    while($fila2 = mysqli_fetch_assoc($consulta2)){
                                                        echo "<td>$fila2[nombrePuesto]</td>";
                                                    }

                                                    echo "                                                    
                                                    <td>$fila[fecha_nacimiento]</td>
                                                    <td>$fila[fecha_ingreso_empresa]</td>
                                                    <td>$fila[fecha_ingreso_gobierno]</td>";
                                                    
                                                    if($fila['id_tipo_planilla'] == 1){
                                                        echo "<td>Gobierno</td>";
                                                    }else if($fila['id_tipo_planilla'] == 2){
                                                        echo "<td>Propios</td>";
                                                    }else
                                                        echo "<td>Mixta</td>";

                                                    if($fila['id_tipo_seguro'] == 1){
                                                        echo "<td>A</td>";
                                                    }else 
                                                        echo "<td>C</td>";

                                                    echo"
                                                    <td>$fila[numero_poliza]</td>";

                                                    $sql2 = "SELECT nombreCategoria FROM categoria WHERE idCategoria  = $fila[id_categoria]";
                                                    $consulta2 = mysqli_query($db,$sql2);

                                                    while($fila2 = mysqli_fetch_assoc($consulta2)){
                                                        echo "<td>$fila2[nombreCategoria]</td>";
                                                    }

                                                    $sql2 = "SELECT nombreSubCategoria FROM subcategoria WHERE idSubCategoria  = $fila[id_sub_categoria]";
                                                    $consulta2 = mysqli_query($db,$sql2);

                                                    while($fila2 = mysqli_fetch_assoc($consulta2)){
                                                        echo "<td>$fila2[nombreSubCategoria]</td>";
                                                    }

                                                    $sql2 = "SELECT nombre_grado FROM gradoacademico WHERE idGradoAcademico  = $fila[id_grado_academico]";
                                                    $consulta2 = mysqli_query($db,$sql2);

                                                    while($fila2 = mysqli_fetch_assoc($consulta2)){
                                                        echo "<td>$fila2[nombre_grado]</td>";
                                                    };

                                                    // $sql2 = "SELECT nombre_tipo_empresa FROM tipoempresa WHERE idTipoEmpresa  = $fila[id_tipo_empresa]";
                                                    // $consulta2 = mysqli_query($db,$sql2);

                                                    // while($fila2 = mysqli_fetch_assoc($consulta2)){
                                                    //     echo "<td>$fila2[nombre_tipo_empresa]</td>";
                                                    // }

                                                    echo "<td>
                                                        <a href='editar-empleados.php?idE=$fila[idEmpleado]' target='_blank' class='btn btn-outline-secondary btn-sm' title='Edit'>
                                                            <i class='fas fa-pencil-alt'></i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a onclick='eliminarEmpleado($fila[idEmpleado])' class='btn btn-outline-secondary btn-sm' title='Eliminar'>
                                                            <i class='fas fa-trash-alt'></i>
                                                        </a>
                                                    </td>
                                                </tr>";
                                            }

                                            ?>

                                        
                                            </tbody>
                                        </table>
                                    	
                                    </div>
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

        <script src="assets/js/app.js"></script>

        <script src="assets/js/sistema/eliminar-empleados.js"></script>
        
    </body>
</html>
