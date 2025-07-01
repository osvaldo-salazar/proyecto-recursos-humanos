document.getElementById("btnCrear").addEventListener('click',()=>{

    const camposVaciosToeic = validarCamposToeic();

    if (camposVaciosToeic== 0) {

    let accion = document.getElementById('accion').value;

    let opcion ="";

    if(accion == "crear"){
         opcion = "nuevoToiec"
    }else{
         opcion = "modificarToeic"
    }

    let formData = new FormData();

    formData.append('action',opcion);


    formData.append('nuevoToiec', document.getElementById('nuevoToiec').value);
    
    formData.append('fechaEmision', document.getElementById('fechaEmision').value);

    formData.append('fechaVencimiento', document.getElementById('fechaVencimiento').value);

    formData.append('idT', document.getElementById('idT').value);

    fetch('back/toeic-procesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
            document.getElementById('mensaje1').style.display = "block";

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
    document.getElementById('mensajeError').style.display = "block";

    setTimeout(() => {
        document.getElementById('mensajeError').style.display = "none";
    }, 3000);
};

});