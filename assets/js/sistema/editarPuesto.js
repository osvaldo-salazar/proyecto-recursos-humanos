function editarpuesto(idPuestos){
    let formData = new FormData();

    formData.append('action','editar_puesto');
    formData.append('id',idPuestos);

    fetch('back/puestoProcesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
            document.getElementById('txtcodigoPuestos').value=data.codigo;
            document.getElementById('txtnombrePuesto').value=data.nombre;
            document.getElementById('accion').value="modificar";
            document.getElementById('idP').value=idPuestos;
        }else{
            alert("Datos incorrectos");
        }

        //alert(data.correcto);

    })
    .catch(error => {
        alert('Ocurrió un error. Intente nuevamente');
    })
}
