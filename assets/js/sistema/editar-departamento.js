function editarDepartamento(idDepartamentos){
    let formData = new FormData();

    formData.append('action','obtener_informacion');
    formData.append('id',idDepartamentos);

    fetch('back/departamentoProcesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
            document.getElementById('txtNombre').value=data.codigo;
            document.getElementById('txtNombre2').value=data.nombre;
            document.getElementById('accion').value="modificar";
            document.getElementById('idD').value= idDepartamentos;
        }else{
            alert("Datos incorrectos");
        }
    })
    .catch(error => {
        alert('Ocurrió un error. Intente nuevamente');
    })
}