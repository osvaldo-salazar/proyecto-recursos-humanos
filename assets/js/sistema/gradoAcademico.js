document.getElementById("btnCrear").addEventListener('click',()=>{

    const camposVacios = validarCampos();

    if (camposVacios== 0) {
        
    

    let accion = document.getElementById('accion').value;

    let opcion ="";

    if(accion == "crear"){
         opcion = "crearGradoAcademico"
    }else{
         opcion = "modificarGradoAcademico"
    }

    let formData = new FormData();

    formData.append('action',opcion);


    formData.append('nuevoGradoAcademico', document.getElementById('nuevoGradoAcademico').value);      // Tipo de grado academico
    
    formData.append('idG', document.getElementById('idG').value);

    fetch('back/gradoAcademico-procesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
            document.getElementById('mensaje').style.display = "block";

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
    document.getElementById('mensaje4').style.display = "block";

    setTimeout(() => {
        document.getElementById("mensaje4").style.display = "none";
    }, 3000);
};

});