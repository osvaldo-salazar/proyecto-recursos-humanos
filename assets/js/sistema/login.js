document.getElementById("btnLogin").addEventListener('click',()=>{

    /*alert(document.getElementById('username').value);
    alert(document.getElementById('userpassword').value)*/

    let formData = new FormData();

    formData.append('action','validar_login');

    formData.append('usuario',document.getElementById('username').value);
    formData.append('contra',document.getElementById('userpassword').value);

    fetch('back/login-procesar.php', {
        method: 'POST',
        body:formData
    })
    .then(response => response.json())
    .then(data => {

        if(data.correcto){
            window.location.replace('main.php');
        }else{
            alert("Datos incorrectos");
        }

        //alert(data.correcto);

    })
    .catch(error => {
        alert('Ocurrió un error. Intente nuevamente');
    });

});