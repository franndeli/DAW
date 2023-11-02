function validarFormulario() {
    var nombre = document.getElementById('nombre');
    var contraseña = document.getElementById('contraseña');
    var mensajeNombre = document.getElementById('mensaje-nombre');
    var mensajeContraseña = document.getElementById('mensaje-contraseña');

    mensajeNombre.textContent = '';
    mensajeContraseña.textContent = '';
    
    var nombreValor = nombre.value.trim();
    var contraseñaValor = contraseña.value.trim();

    if (nombreValor === "" && contraseñaValor === "") {
        mensajeNombre.textContent = 'Por favor, ingresa tu nombre';
        mensajeContraseña.textContent = 'Por favor, ingresa tu contraseña';
        nombre.focus();
        return false;
    }

    if (nombreValor === "") {
        mensajeNombre.textContent = 'Por favor, ingresa tu nombre';
        contraseña.focus();
        return false;
    }

    if (contraseñaValor === "") {
        mensajeContraseña.textContent = 'Por favor, ingresa tu contraseña';
        contraseña.focus();
        return false;
    }
    return true;
}