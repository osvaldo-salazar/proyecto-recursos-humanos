function validarCampos(){

    let camposVacios = 0;

    const campos = document.querySelectorAll('.validacion');

    campos.forEach(campo => {

        // Validar inputs normales (text, email, etc.)
        if (campo.tagName === 'SELECT') {
            // Validar si el select tiene la opción vacía (value === '0')
            if (campo.value === '0') {
                campo.style.border = '2px solid red';
                camposVacios = 1;
            } else {
                campo.style.border = '2px solid gray';
            }
        }else{
            if (campo.value === '') {
                campo.style.border = '2px solid red';
                camposVacios = 1;
            } else {
                campo.style.border = '1px solid gray';
            }
        }
    });

    return camposVacios;

}