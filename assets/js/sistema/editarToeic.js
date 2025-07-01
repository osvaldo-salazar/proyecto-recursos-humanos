function editarToeic(idToeic){
    let formData = new FormData();

    formData.append('action','editarToeic');


    formData.append('idEditarToeic',idToeic);


    fetch('back/toeic-procesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
            document.getElementById('nuevoToiec').value=data.docenteNombre;
            document.getElementById('fechaEmision').value=data.nuevaFechaE;
            document.getElementById('fechaVencimiento').value=data.nuevafechaV;
            document.getElementById('accion').value="modificar";
            document.getElementById('idT').value=idToeic;
        }else{
            alert("Datos incorrectos");
        }

        //alert(data.correcto);

    })
    .catch(error => {
        alert('Ocurrió un error. Intente nuevamente');
    });
}