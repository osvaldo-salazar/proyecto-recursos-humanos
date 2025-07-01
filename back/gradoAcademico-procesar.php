<?php



include '../includes/conexion.php';

ini_set('display_errors',1);
error_reporting(0);
session_start();


// Recibir la accion
$action = $_REQUEST['action'];

if($action == "crearGradoAcademico"){
    
    $gradoAcademico = $_REQUEST['nuevoGradoAcademico'];

    $sql = "INSERT INTO gradoacademico (nombre_grado) 
            VALUES ('$gradoAcademico')";

        mysqli_query($db,$sql);

        echo json_encode(['correcto' => true]);

}else if($action == "eliminarGradoAcademico"){

    $idEliminar = $_REQUEST['idEliminarGrado'];

    $sql = "DELETE FROM gradoacademico WHERE idGradoAcademico = $idEliminar";

    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);

}else if($action == "editarGradoAcademico"){

    

    $idEditar = $_REQUEST['idEditarGrado'];

    $sql = "SELECT * FROM gradoacademico";
    $consulta = mysqli_query($db,$sql);

    while($fila = mysqli_fetch_assoc($consulta)){
        if($fila['idGradoAcademico'] ==  $idEditar){
            $nombre = $fila['nombre_grado'];
            
           

        }
    
    }

    echo json_encode([
        'correcto' => true,
        'nombre'=> $nombre 
    ]);

}elseif ($action == "modificarGradoAcademico"){
    $gradoAcademico = $_REQUEST['nuevoGradoAcademico'];
    $idG= $_REQUEST['idG'];

    $sql = "UPDATE gradoacademico SET 
    nombre_grado = '$gradoAcademico' 
    WHERE idGradoAcademico = $idG";

    mysqli_query($db,$sql);

    echo json_encode([
        'correcto' => true
    ]);
}