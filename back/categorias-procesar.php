<?php

include '../includes/conexion.php';

ini_set('display_errors',1);
error_reporting(0);
session_start();

// Recibir la accion
$action = $_REQUEST['action'];

// Validar la accion a realizar
if($action == "crear_registro"){


    $categoria= $_REQUEST['txtRegistro'];

    $sql = "INSERT INTO categoria (nombreCategoria)
    VALUES ('$categoria')";
    mysqli_query($db,$sql);
    
   
   echo json_encode([
       'correcto' => true
   ]);
   
}else if($action== "eliminar_categoria"){


    $idBorraCategoria = $_REQUEST['id'];

    $sql = "DELETE FROM categoria WHERE idCategoria = $idBorraCategoria";
    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);
}else if($action=="editar_Categoria"){


    $idCategoria = $_REQUEST['id'];
    $sql = "SELECT * FROM categoria";
    $consulta =  mysqli_query($db,$sql);

    while($fila = mysqli_fetch_assoc($consulta)){
        if($fila['idCategoria'] == $idCategoria){
            $nombre = $fila['nombreCategoria'];
        }
    }
    echo json_encode([
        'correcto' => true,
        'nombreCategoria' => $nombre

    ]);
}elseif ($action == "modicarCategoria") {

    $categoria=$_REQUEST['txtRegistro'];
    $idcat=$_REQUEST['id'];


    $sql = "UPDATE categoria SET
    nombreCategoria = '$categoria'
    WHERE idCategoria = $idcat";

    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);
}