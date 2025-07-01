<?php

include '../includes/conexion.php';

ini_set('display_errors',1);
error_reporting(0);
session_start();


// Recibir la accion
$action = $_REQUEST['action'];

 if($action == "crear_puesto"){
       

    $codigo = $_REQUEST['codigo'];
    $descripcionPuesto= $_REQUEST['descripcion'];

   

    $sql = "INSERT INTO puestos (codigoPuestos,nombrePuesto)
    VALUES (' $codigo','$descripcionPuesto')";
    mysqli_query($db,$sql);
   

    echo json_encode([
        'correcto' => true
    ]);



}else if($action == "editar_puesto"){

    $idPuestos = $_REQUEST['id'];

    $sql = "SELECT * FROM puestos";
    $consulta = mysqli_query($db,$sql);

    while($fila = mysqli_fetch_assoc($consulta)){
        if($fila['idPuestos'] ==  $idPuestos){
            $codigo = $fila['codigoPuestos'];
            $nombre = $fila['nombrePuesto'];
           

        }
    
    }

    echo json_encode([
        'correcto' => true,
        'nombre'=> $nombre,
        'codigo'=> $codigo
    ]);
    
    
}else if($action == "eliminar_puesto"){

    $idPuestos = $_REQUEST['id'];

    $sql = "DELETE FROM puestos WHERE idPuestos = $idPuestos";
    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);


}else if($action == "modificar_puesto"){

    $idPuestos = $_REQUEST['id'];
    $codigo = $_REQUEST['codigo'];
    $descripcionPuesto= $_REQUEST['descripcion'];

   $sql = "UPDATE puestos  SET 
    codigoPuestos= '$codigo', 
    nombrePuesto = '$descripcionPuesto'
    WHERE idPuestos =  $idPuestos";
    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);


}