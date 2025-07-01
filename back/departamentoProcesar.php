<?php

include '../includes/conexion.php';

ini_set('display_errors',1);
error_reporting(0);
session_start();


// Recibir la accion
$action = $_REQUEST['action'];

 if($action == "crear_departamento"){
       

    $codigo = $_REQUEST['codigo'];
    $descripcionDepartamento= $_REQUEST['descripcion'];

   

    $sql = "INSERT INTO departamentos (codigo,nombreDepartamento)
    VALUES (' $codigo','$descripcionDepartamento')";
    mysqli_query($db,$sql);
   

    echo json_encode([
        'correcto' => true
    ]);



}else if($action == "eliminar_departamento"){

    $idDepartamentos = $_REQUEST['id'];

    $sql = "DELETE FROM departamentos WHERE idDepartamentos = $idDepartamentos";
    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);



}else if($action == "obtener_informacion"){

    $idDepartamentos = $_REQUEST['id'];

    $sql = "SELECT * FROM departamentos";
    $consulta = mysqli_query($db,$sql);

    while($fila = mysqli_fetch_assoc($consulta)){
        if($fila['idDepartamentos'] ==  $idDepartamentos){
            $codigo = $fila['codigo'];
            $nombre = $fila['nombreDepartamento'];
           

        }
    
    }

    echo json_encode([
        'correcto' => true,
        'nombre'=> $nombre,
        'codigo'=> $codigo 
    ]);

}else if($action == "modificar_departamento"){

    $codigo = $_REQUEST['codigo'];
    $descripcionDepartamento= $_REQUEST['descripcion'];
    $idDepartamento = $_REQUEST['id'];

   $sql = "UPDATE departamentos  SET 
    codigo= '$codigo', 
    nombreDepartamento = '$descripcionDepartamento'
    WHERE idDepartamentos =  $idDepartamento";
    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);



}
