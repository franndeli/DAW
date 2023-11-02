function validarRegistro(){
    var nombre = document.getElementById('nombre_r').value.trim();
    var contraseña = document.getElementById('contraseña_r').value;
    var repetirContraseña = document.getElementById('repetir_contraseña').value;
    var email = document.getElementById('email').value.trim();
    var sexo = document.getElementById('sexo').value;
    var fechaNacimiento = document.getElementById('fechaNacimiento').value;

    var mensajeNombre = document.getElementById('mensaje-nombre_r');
    var mensajeContraseña = document.getElementById('mensaje-contraseña_r');
    var mensajeRepetirContraseña = document.getElementById('mensaje-repetir-contraseña');
    var mensajeEmail = document.getElementById('mensaje-email');
    var mensajeSexo = document.getElementById('mensaje-sexo');
    var mensajeNacimiento = document.getElementById('mensaje-nacimiento');

    mensajeNombre.textContent = '';
    mensajeContraseña.textContent = '';
    mensajeRepetirContraseña.textContent = '';
    mensajeEmail.textContent = '';
    mensajeSexo.textContent = '';
    mensajeNacimiento.textContent = '';


    // Validar nombre de usuario
    var nombreValidador = /^[a-zA-Z][a-zA-Z0-9]{2,14}$/;

    if(nombre===""){
        mensajeNombre.textContent = "Por favor, introduce un nombre";
        var nombre_focus = document.getElementById('nombre_r');
        nombre_focus.focus();
        return false;
    }

    if (!nombreValidador.test(nombre)) {
        mensajeNombre.textContent = "Nombre inválido. Solo letras y números permitidos, no puede comenzar con un número, longitud mínima 3 y máxima 15.";
        return false;
    }

    // Validar contraseña
    var contraseñaRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d-_]{6,15}$/;

    if(contraseña===""){
        mensajeContraseña.textContent = "Por favor, introduce una contraseña";
        var contraseña_focus = document.getElementById('contraseña_r');
        contraseña_focus.focus();
        return false;
    }

    if (!contraseñaRegex.test(contraseña)) {
        mensajeContraseña.textContent = "Contraseña inválida. Debe contener al menos una letra mayúscula, una letra minúscula y un número, longitud mínima 6 y máxima 15.";
        return false;
    }

    // Validar repetir contraseña
    if (contraseña !== repetirContraseña) {
        mensajeRepetirContraseña.textContent = "Las contraseñas no coinciden.";
        return false;
    }

    // Validar email
    if (!validarEmail(email) || email.length > 254) {
        var mensajeEmail = document.getElementById('mensaje-email');
        mensajeEmail.textContent = "Correo electrónico inválido.";
        return false;
    }

    // Validar sexo
    if (sexo === "") {
        mensajeSexo.textContent = "Por favor, selecciona una opción.";
        return false;
    }

    // Validar fecha de nacimiento
    var fechaActual = new Date();
    var fechaNac = new Date(fechaNacimiento);
    var edad = fechaActual.getFullYear() - fechaNac.getFullYear();
    var m = fechaActual.getMonth() - fechaNac.getMonth();
    if (m < 0 || (m === 0 && fechaActual.getDate() < fechaNac.getDate())) {
        edad--;
    }
    if (isNaN(edad) || edad < 18) {
        mensajeNacimiento.textContent = "Debes tener al menos 18 años para registrarte.";
        return false;
    }

    return true;
}

function validarEmail(email) {
    //Validar Email
    var mensajeEmail = document.getElementById('mensaje-email');

    // Separar la parte local y el dominio del correo electrónico
    var partesEmail = email.split('@');

    if (partesEmail.length !== 2) {
        mensajeEmail.textContent = "Correo electrónico inválido.";
        return false;
    }

    var parteLocal = partesEmail[0];
    var parteDominio = partesEmail[1];

    // Verificar la longitud de la parte local y del dominio
    if (parteLocal.length > 64 || parteLocal.length < 1 || parteDominio.length > 255 || parteDominio.length < 1) {
        return false;
    }

    // Verificar caracteres permitidos en la parte local
    var parteLocalValidador = /^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~.-]+$/;
    if (!parteLocalValidador.test(parteLocal)) {
        return false;
    }

    // Verificar que la parte local no comienza ni termina con un punto, y no tiene dos puntos seguidos
    if (parteLocal.startsWith('.') || parteLocal.endsWith('.') || parteLocal.includes('..')) {
        return false;
    }

    // Separar los subdominios
    var subdominios = parteDominio.split('.');

    // Verificar que cada subdominio cumple con las reglas
    for (var i = 0; i < subdominios.length; i++) {
        var subdominio = subdominios[i];

        // Verificar la longitud del subdominio
        if (subdominio.length > 63 || subdominio.length < 1) {
            return false;
        }

        // Verificar caracteres permitidos en el subdominio
        var subdominioValidador = /^[a-zA-Z0-9-]+$/;
        if (!subdominioValidador.test(subdominio)) {
            return false;
        }

        // Verificar que el subdominio no comienza ni termina con un guion
        if (subdominio.startsWith('-') || subdominio.endsWith('-')) {
            return false;
        }
    }

    // Si todas las validaciones pasan, el correo electrónico es válido
    return true;
}
