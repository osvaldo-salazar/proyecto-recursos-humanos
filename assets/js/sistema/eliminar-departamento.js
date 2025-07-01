function eliminarDepartamento(idDepartamentos){
    let formData = new FormData();

    formData.append('action','eliminar_departamento');
    formData.append('id',idDepartamentos);

    fetch('back/departamentoProcesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
            document.getElementById("mensaje3").style.display = "block";
            setTimeout(() => {
                location.reload();
            }, 3000); 
        }else{
            alert("Datos incorrectos");
        }


    })
    .catch(error => {
        alert('Ocurrió un error. Intente nuevamente');
    });
}