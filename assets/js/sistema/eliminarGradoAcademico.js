function eliminarGradoAcademico(idGradoAcademico){


    let formData = new FormData();

    formData.append('action','eliminarGradoAcademico');


    formData.append('idEliminarGrado',idGradoAcademico);

    fetch('back/gradoAcademico-procesar.php', {
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