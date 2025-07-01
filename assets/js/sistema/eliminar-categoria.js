function eliminar_categoria(idBorraCategoria){
    let formData = new FormData();

    formData.append('action','eliminar_categoria');
    formData.append('id',idBorraCategoria);
    

    fetch('back/categorias-procesar.php', {
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