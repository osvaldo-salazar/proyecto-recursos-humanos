function editar_categoria(idCategoria){

    let formData = new FormData();

    formData.append('action','editar_Categoria');
    formData.append('id',idCategoria);
    

    fetch('back/categorias-procesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
           document.getElementById('txtRegistro').value=data.nombreCategoria;
          

           document.getElementById('idcat').value=idCategoria;
           document.getElementById('accion').value="modificar";

        }else{
            alert("Datos incorrectos");
        }

        //alert(data.correcto);

    })
    .catch(error => {
        alert('Ocurrió un error. Intente nuevamente');
    });
}