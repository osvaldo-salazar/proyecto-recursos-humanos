<?php

include '../includes/conexion.php';

ini_set('display_errors',1);
error_reporting(0);
session_start();

// Recibir la accion
$action = $_REQUEST['action'];

// Validar la accion a realizar
if($action == "validar_login"){


    $user = $_REQUEST['usuario'];
    $password = $_REQUEST['contra'];

    $sql = "SELECT * FROM usuarios";
    $consulta = mysqli_query($db,$sql);
    
    while($fila = mysqli_fetch_assoc($consulta)){
        
        if($fila['usuario'] == $user && $fila['contra'] == $password){

            $_SESSION["idUsuario"] = $fila['idUsuario'];
			$_SESSION["nomUsuario"] = $fila['usuario'];
            $_SESSION["tipo"] = $fila['id_tipo_usuario'];
        }

    }
   
   echo json_encode([
       'correcto' => true
   ]);
   
   
}