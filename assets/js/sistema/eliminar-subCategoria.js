function eliminar_subCategoria(idBorraSubCategoria){



    let formData = new FormData();

    formData.append('action','eliminar_subCategoria');
    formData.append('id',idBorraSubCategoria);
    

    fetch('back/subcategoria-procesar.php', {
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