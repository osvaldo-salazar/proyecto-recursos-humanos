function editarGradoAcademico(idGradoAcademico){

    let formData = new FormData();

    formData.append('action','editarGradoAcademico');


    formData.append('idEditarGrado',idGradoAcademico);

    fetch('back/gradoAcademico-procesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
            document.getElementById('nuevoGradoAcademico').value=data.nombre;
            document.getElementById('accion').value="modificar";
            document.getElementById('idG').value=idGradoAcademico;
        }else{
            alert("Datos incorrectos");
        }

        //alert(data.correcto);

    })
    .catch(error => {
        alert('Ocurrió un error. Intente nuevamente');
    });
}