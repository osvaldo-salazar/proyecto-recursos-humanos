<?php

include '../includes/conexion.php';

ini_set('display_errors',1);
error_reporting(0);
session_start();

// Recibir la accion
$action = $_REQUEST['action'];

// Validar la accion a realizar
if($action == "crear_subcategoria"){


    $subcategoria= $_REQUEST['txtSubCategoria'];
    $seleccion= $_REQUEST['slcCate'];

    $sql = "INSERT INTO subcategoria (nombreSubCategoria,id_categoria)
    VALUES ('$subcategoria','$seleccion')";
    mysqli_query($db,$sql);
    
   
   echo json_encode([
       'correcto' => true
   ]);
   
}else if($action== "eliminar_subCategoria"){


    $idBorraSubCategoria = $_REQUEST['id'];

    $sql = "DELETE FROM subcategoria WHERE idSubCategoria = $idBorraSubCategoria";
    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);
}else if($action=="editar_subCategoria"){


    $idSubCategoria = $_REQUEST['id'];
    $sql = "SELECT * FROM subcategoria";
    $consulta =  mysqli_query($db,$sql);

    while($fila = mysqli_fetch_assoc($consulta)){
        if($fila['idSubCategoria'] == $idSubCategoria){
            $nombre = $fila['nombreSubCategoria'];
            $lista = $fila['id_categoria'];
        }
    }
    echo json_encode([
        'correcto' => true,
        'nombre' => $nombre,
        'lista' => $lista

    ]);
}elseif ($action == "modicarSubCategoria") {

    $subcategoria=$_REQUEST['txtSubCategoria'];
    $edit=$_REQUEST['slcCate'];
    $idSub=$_REQUEST['id'];

    $sql = "UPDATE subcategoria SET
    nombreSubCategoria = '$subcategoria',
    id_categoria = '$edit'
    WHERE idSubCategoria = $idSub";

    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);
}