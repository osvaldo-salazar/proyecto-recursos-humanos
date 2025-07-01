<?php

include '../includes/conexion.php';


ini_set('display_errors',1);
error_reporting(0);
session_start();

// Recibir la accion
$action = $_REQUEST['action'];


if($action == "nuevoToiec"){

    $nuevoToeic = $_REQUEST['nuevoToiec'];
    
    $fechaEmision= $_REQUEST['fechaEmision'];

    $fechaVencimiento= $_REQUEST['fechaVencimiento'];

    $sql = "INSERT INTO toeic(idDocente,fechaEmision,fechaVencimiento) 
            VALUES ('$nuevoToeic','$fechaEmision','$fechaVencimiento')";

        mysqli_query($db,$sql);

        echo json_encode(['correcto' => true]);

}else if($action == "eliminarToeic"){

    $idElimarToeic = $_REQUEST['idEliminarToeic'];

    $sql = "DELETE FROM toeic WHERE idToeic = $idElimarToeic";

    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);
}else if($action == "editarToeic"){

    

     $idEditarToeic = $_REQUEST['idEditarToeic'];

    $sql = "SELECT * FROM toeic";
    $consulta = mysqli_query($db,$sql);

    while($fila = mysqli_fetch_assoc($consulta)){
        if($fila['idToeic'] ==  $idEditarToeic){


             $nombreDocente = $fila['idDocente'];
             $nuevaFechaEmision = $fila['fechaEmision'];
             $nuevaFechaVencimiento = $fila['fechaVencimiento'];
            
            

        }
    
    }

    echo json_encode([
        'correcto' => true,
        'docenteNombre'=> $nombreDocente,
        'nuevaFechaE' => $nuevaFechaEmision,
        'nuevafechaV' =>  $nuevaFechaVencimiento

    ]);

}elseif ($action == "modificarToeic"){

    $toeic = $_REQUEST['nuevoToiec'];
    $fechaEmision = $_REQUEST['fechaEmision'];
    $fechaVencimiento = $_REQUEST['fechaVencimiento'];
    $idT = $_REQUEST['idT'];

    $sql = "UPDATE toeic SET 
    idDocente = '$toeic',
    fechaEmision ='$fechaEmision',
    fechaVencimiento = '$fechaVencimiento'
    WHERE idToeic = $idT";

    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);
}
