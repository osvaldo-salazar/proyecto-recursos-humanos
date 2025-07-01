function editar_subcategoria(idSubCategoria){

   

    let formData = new FormData();

    formData.append('action','editar_subCategoria');
    formData.append('id',idSubCategoria);
    

    fetch('back/subcategoria-procesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
           document.getElementById('txtSubCategoria').value=data.nombre;
           document.getElementById('slcCate').value=data.lista;

           document.getElementById('idsub').value=idSubCategoria;
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