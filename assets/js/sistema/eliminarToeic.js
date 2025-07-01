function eliminarToeic(idToeic){
    let formData = new FormData();

    formData.append('action','eliminarToeic');


    formData.append('idEliminarToeic',idToeic);


    fetch('back/toeic-procesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
            alert("informacion eliminada correctamente")
            location.reload();
        }else{
            alert("Datos incorrectos");
        }

        //alert(data.correcto);

    })
    .catch(error => {
        alert('Ocurrió un error. Intente nuevamente');
    });
}