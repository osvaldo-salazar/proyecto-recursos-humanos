document.getElementById("btnCrear").addEventListener('click',()=>{

    const condicion = validarCampos ();

    if (condicion == 0) {

        let formData = new FormData();

        formData.append('action','crear_empleados');

        formData.append('txtNombre', document.getElementById('txtNombre').value);  
        formData.append('txtCed', document.getElementById('txtCed').value);      
        formData.append('txtTel', document.getElementById('txtTel').value);        
        formData.append('txtEmail', document.getElementById('txtEmail').value);        
        formData.append('txtDepartamento', document.getElementById('txtDepartamento').value);    
        formData.append('txtPuesto', document.getElementById('txtPuesto').value);        
        formData.append('txtNacimiento', document.getElementById('txtNacimiento').value); 
        formData.append('txtIngrEmpr', document.getElementById('txtIngrEmpr').value); 
        formData.append('txtIngrGob', document.getElementById('txtIngrGob').value); 
        formData.append('slcTipoPlanilla', document.getElementById('slcTipoPlanilla').value); 
        formData.append('slcTipoSeguro', document.getElementById('slcTipoSeguro').value); 
        formData.append('txtPoliza', document.getElementById('txtPoliza').value); 
        formData.append('slcCategoria', document.getElementById('slcCategoria').value); 
        formData.append('slcSubCategoria', document.getElementById('slcSubCategoria').value); 
        formData.append('slcGradoAcademico', document.getElementById('slcGradoAcademico').value); 

        fetch('back/empleados-procesar.php', {
            method: 'POST',
            body:formData
        })
        .then(response => response.json())
        .then(data => {

            if(data.correcto){
                document.getElementById("mensaje").style.display = "block";
                setTimeout(() => {
                    location.reload();
                },2000);
                
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
        },2000);
    }

});