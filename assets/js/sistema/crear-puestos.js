document.getElementById("btnCrear").addEventListener('click',()=>{
    const camposVacios = validarCampos ();
    if(camposVacios== 0) {


        let action = document.getElementById("accion").value;
        let option;

        if(action == "crear"){
             option = "crear_puesto"
        }else{ 
            option = "modificar_puesto"

        }


    let formData = new FormData();

    formData.append('action', option);

    formData.append('codigo', document.getElementById('txtcodigoPuestos').value);  
    formData.append('descripcion', document.getElementById('txtnombrePuesto').value);  
    formData.append('id', document.getElementById('idP').value);     
    
    fetch('back/puestoProcesar.php', {
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

