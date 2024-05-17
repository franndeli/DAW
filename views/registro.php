<?php
// views/registro.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2b7751e003.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once('views/header.php'); ?>
    <main>
    <fieldset class="registro">
        <legend>Por favor, introduce a continuación tus datos para registrarte</legend>
            <form action="registro" method="post" enctype="multipart/form-data">
                <p>
                    <label for="nombre_r">Nombre:</label>
                    <input type="text" id="nombre_r" name="nombre_r"  value="<?php echo htmlspecialchars($_POST['nombre_r'] ?? ''); ?>">
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($data['errors']['nombre_r'])): ?>
                        <p class="mensaje_error"><?php echo htmlspecialchars($data['errors']['nombre_r']); ?></p>
                    <?php endif; ?>
                </p>
                
                <p>
                    <label for="contraseña_r">Contraseña:</label>
                    <input type="text" id="contraseña_r" name="contraseña_r" value="<?php echo htmlspecialchars($_POST['contraseña_r'] ?? ''); ?>">
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($data['errors']['contraseña_r'])): ?>
                        <p class="mensaje_error"><?php echo htmlspecialchars($data['errors']['contraseña_r']); ?></p>
                    <?php endif; ?>
                </p>
                
                <p>
                    <label for="repetir_contraseña">Repetir contraseña:</label>
                    <input type="text" id="repetir_contraseña" name="repetir_contraseña" value="<?php echo htmlspecialchars($_POST['repetir_contraseña'] ?? ''); ?>">
                    <p class="mensaje-error" id="mensaje-repetir-contraseña"></p>
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($data['errors']['repetir_contraseña'])): ?>
                        <p class="mensaje_error"><?php echo htmlspecialchars($data['errors']['repetir_contraseña']); ?></p>
                    <?php endif; ?>
                </p>
                
                <p>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email">
                    <p class="mensaje-error" id="mensaje-email"></p> <!-- Etiqueta para mensaje de error -->
                </p>

                <p>
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="hombre">Hombre</option>
                        <option value="mujer">Mujer</option>
                        <option value="otro">Otro</option>
                    </select>
                    <p class="mensaje-error" id="mensaje-sexo"></p> <!-- Etiqueta para mensaje de error -->
                </p>

                <p>
                    <label for="fechaNacimiento">Fecha de nacimiento:</label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento">
                    <p class="mensaje-error" id="mensaje-nacimiento"></p> <!-- Etiqueta para mensaje de error -->
                </p>

                <p>
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" id="ciudad" name="ciudad">
                </p>

                <p>
                    <label for="pais">País:</label>
                    <input type="text" id="pais" name="pais">
                </p>

                <p>
                    <label for="foto_perfil">Foto de perfil:</label>
                    <input type="file" accept="image/*" id="foto_perfil" name="foto_perfil">
                </p>
                
                <button type="submit">Registrar</button>
            </form>
        </fieldset>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
