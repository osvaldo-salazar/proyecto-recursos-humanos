function validarCampos(){

    let camposVacios = 0;

    const campos = document.querySelectorAll('.validacion');

    campos.forEach(campo => {

        const id = campo.id; // Obtener el ID del elemento

        if (campo.classList.contains('select2-hidden-accessible')) {
            // Validar selects de Select2
            const value = campo.value; // Obtener el valor del select oculto
            const container = document.querySelector(`#select2-${campo.id}-container`).closest('.select2-container'); // Contenedor visible

            if (value === '0') {
                container.style.border = '2px solid red'; // Borde rojo si no hay selección válida
                camposVacios = 1;
            } else {
                container.style.border = '2px solid gray'; // Borde gris si hay selección válida
            }
        }else if (campo.tagName === 'SELECT') {
            // Validar si el select tiene la opción vacía (value === '0')
            if (campo.value === '0') {
                campo.style.border = '2px solid red';
                camposVacios = 1;
            } else {
                campo.style.border = '2px solid gray';
            }
        }else {
            // Validar inputs normales (text, email, etc.)
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