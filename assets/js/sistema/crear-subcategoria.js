document.getElementById("btnCrear").addEventListener('click',()=>{

    const camposVacios = validarCampos();

    if(camposVacios == 0){

        let accion=document.getElementById('accion').value;
        let opcion ="";
        if(accion =="crear"){
            opcion = "crear_subcategoria"
        }else{
            opcion = "modicarSubCategoria"
        }


        let formData = new FormData();

        formData.append('action',opcion);

        formData.append('txtSubCategoria',document.getElementById('txtSubCategoria').value);
        formData.append('slcCate',document.getElementById('slcCate').value);
        formData.append('id',document.getElementById('idsub').value);
        
        fetch('back/subcategoria-procesar.php', {
            method: 'POST',
            body:formData
        })
        .then(response => response.json())
        .then(data => {

            if(data.correcto){
                document.getElementById("mensaje").style.display = "block";

                setTimeout(() => {
                    location.reload();
                }, 2000);
                        
            }else{
                alert("Datos incorrectos");
            }

            //alert(data.correcto);

        })
        .catch(error => {
            alert('Ocurrió un error. Intente nuevamente');
        });
    }else{

        document.getElementById("mensaje2").style.display = "block";

        setTimeout(() => {
            document.getElementById("mensaje2").style.display = "none";
        }, 2000);
      };
});