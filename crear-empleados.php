<?php
session_start();
ini_set('error_reporting',0);
include 'includes/conexion.php';
?>

<!doctype html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
        <title>Crear Empleados</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin Singular" name="description">
        <meta content="Osvaldo Vega" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/icono.png">
    
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
                                        <h4 class="card-title text-center">Formulario Crear Empleado</h4>
                                    </div> <!-- end card-body -->
                                </div>
                            </div> <!-- end col -->
                            
                            <div class="col-md-6">
                                <div class="card card-body">
                                    
                                    <div class="mb-3">
                                        <label class="form-label" for="txtNombre">Nombre Empleado</label>
                                        <input type="text" class="form-control form-control-lg validacion" id="txtNombre" value="" placeholder="Digite el nombre">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="txtCed">Cedula</label>
                                        <input type="text" class="form-control form-control-lg validacion" id="txtCed" value="" placeholder="Digite la cedula">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="txtTel">Telefono</label>
                                        <input type="text" class="form-control form-control-lg validacion" id="txtTel" value="" placeholder="Digite el telefono">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="txtEmail">Correo institucional</label>
                                        <input type="text" class="form-control form-control-lg validacion" id="txtEmail" value="" placeholder="Digite el Correo institucional">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="txtDepartamento">Departamento</label>
                                  
                                        <select class="form-control form-control-lg select2 validacion" id="txtDepartamento">
                                        <option value="0">Elija Departamento</option>

                                        <?php

                                            $sql = "SELECT * FROM departamentos";
                                            $consulta = mysqli_query($db,$sql);

                                            while($fila = mysqli_fetch_assoc($consulta)){
                                                echo"<option value='$fila[idDepartamentos]'>$fila[nombreDepartamento]</option>";
                                            }
                                            ?>

                                        </select>
                                  
                                  
                                  
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="txtPuesto">Puesto</label>

                                        <select class="form-control form-control-lg select2 validacion" id="txtPuesto">
                                        <option value="0">Elija Puesto</option>

                                        <?php

                                            $sql = "SELECT * FROM puestos";
                                            $consulta = mysqli_query($db,$sql);

                                            while($fila = mysqli_fetch_assoc($consulta)){
                                                echo"<option value='$fila[idPuestos]'>$fila[nombrePuesto]</option>";
                                            }
                                            ?>

                                        </select>
                                    
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="slcCategoria">Categoria</label>

                                        <select class="form-control form-control-lg select2 validacion" id="slcCategoria">
                                        <option value="0">Elija Categoria</option>

                                         <?php

                                            $sql = "SELECT * FROM categoria";
                                            $consulta = mysqli_query($db,$sql);

                                            while($fila = mysqli_fetch_assoc($consulta)){
                                                echo"<option value='$fila[idCategoria]'>$fila[nombreCategoria]</option>";
                                            }
                                            ?>

                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="slcSubCategoria">Sub Categoria</label>

                                        <select class="form-control form-control-lg select2 validacion" id="slcSubCategoria">
                                        <option value="0">Elija Sub Categoria</option>

                                        <?php

                                            $sql = "SELECT * FROM subcategoria";
                                            $consulta = mysqli_query($db,$sql);

                                            while($fila = mysqli_fetch_assoc($consulta)){
                                                echo"<option value='$fila[idSubCategoria]'>$fila[nombreSubCategoria]</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>

                                    
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card card-body">

                                    <div class="mb-3">
                                        <label class="form-label" for="txtNacimiento">Fecha de nacimiento</label>
                                        <input type="date" class="form-control form-control-lg validacion" id="txtNacimiento" value="" placeholder="Digite la Fecha de nacimiento">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="txtIngrEmpr">Fecha de ingreso a la empresa</label>
                                        <input type="date" class="form-control form-control-lg validacion" id="txtIngrEmpr" value="" placeholder="Digite la Fecha de ingreso a la empresa">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="txtIngrGob">Fecha de ingreso a gobierno</label>
                                        <input type="date" class="form-control form-control-lg validacion" id="txtIngrGob" value="" placeholder="Digite la Fecha de ingreso a gobierno">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="slcTipoPlanilla">Planilla</label>
                                        <select class="form-control form-control-lg validacion" id="slcTipoPlanilla">
                                        <option value="0">Elija Planilla</option>
                                        <option value="1">Gobierno</option>
                                        <option value="2">Propios</option>
                                        <option value="3">Mixta</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="slcTipoSeguro">Tipo de Seguro</label>
                                        <select class="form-control form-control-lg validacion" id="slcTipoSeguro">
                                        <option value="0">Elija Tipo de Seguro</option>
                                        <option value="1">A</option>
                                        <option value="2">C</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="txtPoliza">Número de Póliza</label>
                                        <input type="text" class="form-control form-control-lg validacion" id="txtPoliza" value="" placeholder="Digite el Número de Póliza">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="slcGradoAcademico">Grado Acádemico</label>
                                        <select class="form-control form-control-lg select2 validacion" id="slcGradoAcademico">
                                        <option value="0">Elija Grado Acádemico</option>

                                        <?php

                                            $sql = "SELECT * FROM gradoacademico";
                                            $consulta = mysqli_query($db,$sql);

                                            while($fila = mysqli_fetch_assoc($consulta)){
                                                echo"<option value='$fila[idGradoAcademico]'>$fila[nombre_grado]</option>";
                                            }
                                        ?>

                                        </select>
                                    </div>

                                    

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div style="width: 28%; text-align:center; display:none; margin:auto" id="mensaje" class="waves-light alert alert-info" role="alert">
                                            <strong>Información</strong> almacenada satisfactoriamente.    
                                        </div>        

                                        <div style="width: 28%; text-align:center; display:none; margin:auto" id="mensaje2" class="alert alert-danger" role="alert">
                                            <strong>Campos</strong> requeridos vacíos!!.
                                        </div>

                                        <div style="width: 100%;text-align:center">
                                            <button id="btnCrear" class="btn btn-primary w-md waves-effect " type="submit">Guardar</button>
                                        </div>
                                        
                                    </div> <!-- end card-body -->
                                </div>
                            </div> <!-- end col -->
                                
                        </div> <!-- end row -->
                           
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer text-center">
                    © <script>document.write(new Date().getFullYear())</script> Singular <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Ing.Osvaldo Vega A.</span>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        
        <script src="assets/libs/select2/js/select2.min.js"></script>
        <script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
        <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>
        <script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    
        <script src="assets/js/pages/form-advanced.init.js"></script>

        <!--tinymce js-->
        <script src="assets/libs/tinymce/tinymce.min.js"></script>

        <!-- init js -->
        <script src="assets/js/pages/form-editor.init.js"></script>

        <script src="assets/js/app.js"></script>
        <script src="assets/js/app/tours.js"></script>

        <script src="assets/js/sistema/validacions_campos.js"></script>

        <script src="assets/js/sistema/crear-empleados.js"></script>

    </body>
</html>
