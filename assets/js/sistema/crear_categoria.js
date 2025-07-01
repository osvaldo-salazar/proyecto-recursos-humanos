document.getElementById("btnCrear").addEventListener('click',()=>{

    const camposVacios = validarCampos();

    if(camposVacios == 0){

         let accion=document.getElementById('accion').value;
        let opcion ="";
        if(accion =="crear"){
            opcion = "crear_registro"
        }else{
            opcion = "modicarCategoria"
        }


      let formData = new FormData();

      formData.append('action',opcion);

      formData.append('txtRegistro',document.getElementById('txtRegistro').value);
      formData.append('id',document.getElementById('idcat').value);
    
        fetch('back/categorias-procesar.php', {
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