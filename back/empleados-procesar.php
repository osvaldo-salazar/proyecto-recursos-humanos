<?php

include '../includes/conexion.php';

ini_set('display_errors',1);
error_reporting(0);

// Recibir la accion
$action = $_REQUEST['action'];

if($action == "crear_empleados"){

    $nombre = $_REQUEST['txtNombre'];
    $cedula = $_REQUEST['txtCed'];
    $telefono = $_REQUEST['txtTel'];
    $email = $_REQUEST['txtEmail'];
    $departamento = $_REQUEST['txtDepartamento'];
    $puesto = $_REQUEST['txtPuesto'];
    $nacimiento = $_REQUEST['txtNacimiento'];
    $ingreso_empresa = $_REQUEST['txtIngrEmpr'];
    $ingreso_gobierno = $_REQUEST['txtIngrGob'];
    $tipo_planilla = $_REQUEST['slcTipoPlanilla'];
    $tipo_seguro = $_REQUEST['slcTipoSeguro'];
    $poliza = $_REQUEST['txtPoliza'];
    $categoria = $_REQUEST['slcCategoria'];
    $sub_categoria = $_REQUEST['slcSubCategoria'];
    $grado_academico = $_REQUEST['slcGradoAcademico'];

    $sql = "INSERT INTO empleados (nombre, cedula, telefono, correo_institucional, id_departamento, id_puesto, fecha_nacimiento, fecha_ingreso_empresa, fecha_ingreso_gobierno, id_tipo_planilla, id_tipo_seguro, numero_poliza, id_categoria, id_sub_categoria, id_grado_academico) 
    VALUES ('$nombre', '$cedula', '$telefono', '$email', '$departamento', '$puesto', '$nacimiento', '$ingreso_empresa', '$ingreso_gobierno', '$tipo_planilla', '$tipo_seguro', '$poliza', '$categoria', '$sub_categoria', '$grado_academico')";
    mysqli_query($db,$sql);
   

    echo json_encode([
        'correcto' => true
    ]);
}else if($action == "editar_empleados"){

    $idEmpleado = $_REQUEST['id'];

    $nombre = $_REQUEST['txtNombre'];
    $cedula = $_REQUEST['txtCed'];
    $telefono = $_REQUEST['txtTel'];
    $email = $_REQUEST['txtEmail'];
    $departamento = $_REQUEST['txtDepartamento'];
    $puesto = $_REQUEST['txtPuesto'];
    $nacimiento = $_REQUEST['txtNacimiento'];
    $ingreso_empresa = $_REQUEST['txtIngrEmpr'];
    $ingreso_gobierno = $_REQUEST['txtIngrGob'];
    $tipo_planilla = $_REQUEST['slcTipoPlanilla'];
    $tipo_seguro = $_REQUEST['slcTipoSeguro'];
    $poliza = $_REQUEST['txtPoliza'];
    $categoria = $_REQUEST['slcCategoria'];
    $sub_categoria = $_REQUEST['slcSubCategoria'];
    $grado_academico = $_REQUEST['slcGradoAcademico'];

    $sql = "UPDATE empleados  SET 
    nombre = '$nombre', 
    cedula = '$cedula', 
    telefono = '$telefono', 
    correo_institucional = '$email', 
    id_departamento = '$departamento', 
    id_puesto = '$puesto',
    fecha_nacimiento = '$nacimiento', 
    fecha_ingreso_empresa = '$ingreso_empresa', 
    fecha_ingreso_gobierno = '$ingreso_gobierno', 
    id_tipo_planilla = '$tipo_planilla', 
    id_tipo_seguro = '$tipo_seguro', 
    numero_poliza = '$poliza',
    id_categoria = '$categoria', 
    id_sub_categoria = '$sub_categoria', 
    id_grado_academico = '$grado_academico' 
    WHERE idEmpleado = $idEmpleado";
    mysqli_query($db,$sql);


    echo json_encode([
        'correcto' => true
    ]);
}else if($action == "eliminar_empleados"){

    $idEmpleado = $_REQUEST['id'];

    $sql = "DELETE FROM empleados WHERE idEmpleado = $idEmpleado";
    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);
}