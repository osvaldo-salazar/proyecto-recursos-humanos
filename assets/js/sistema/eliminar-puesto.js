function eliminarPuesto(idPuestos){
    let formData = new FormData();

    formData.append('action','eliminar_puesto');
    formData.append('id',idPuestos);

    fetch('back/puestoProcesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
            document.getElementById("mensaje5").style.display = "block";
            setTimeout(() => {
                location.reload();
            }, 2000); 
        }else{
            alert("Datos incorrectos");
        }


    })
    .catch(error => {
        alert('Ocurrió un error. Intente nuevamente');
    });
}