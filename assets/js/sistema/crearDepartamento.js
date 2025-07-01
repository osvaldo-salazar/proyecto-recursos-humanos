document.getElementById("btnCrear").addEventListener('click',()=>{
    const camposVacios = validarCampos ();
    if(camposVacios== 0) {

        let action = document.getElementById("accion").value;
        let option;

        if(action == "crear"){
             option = "crear_departamento"
        }else{ 
            option = "modificar_departamento"

        }//


        let formData = new FormData();

        formData.append('action',option);
    
        formData.append('codigo', document.getElementById('txtNombre').value);  
        formData.append('descripcion', document.getElementById('txtNombre2').value);  
        formData.append('id', document.getElementById('idD').value); //    
        
        fetch('back/departamentoProcesar.php', {
            method: 'POST',
            body:formData
        })
        .then(response => response.json())
        .then(data => {

            if(data.correcto){
                document.getElementById("mensaje").style.display = "block";
                setTimeout(() => {
                    location.reload();
                }, 3000); 
            }else{
                alert("Datos incorrectos");
            }

            //alert(data.correcto);

        })
        .catch(error => {
            alert('Ocurrió un error. Intente nuevamente');
        });

    }else{
     ///alert("camposVacios");
    document.getElementById("mensaje4").style.display = "block";
    setTimeout(() => {
        document.getElementById("mensaje4").style.display = "none ";
    }, 3000);
};
});