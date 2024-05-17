<?php
// views/comprobacionregistro.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobación registo</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2b7751e003.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once('views/header.php'); ?>
    <main class="comprobacion_registro">
        <fieldset>
            <h1>Comprobación de Registro</h1>

            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_POST['nombre_r'] ?? ''); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email'] ?? ''); ?></p>
            <p><strong>Sexo:</strong> <?php echo htmlspecialchars($_POST['sexo'] ?? ''); ?></p>
            <p><strong>Fecha de Nacimiento:</strong> <?php echo htmlspecialchars($_POST['fechaNacimiento'] ?? ''); ?></p>
            <p><strong>Ciudad:</strong> <?php echo htmlspecialchars($_POST['ciudad'] ?? ''); ?></p>
            <p><strong>País:</strong> <?php echo htmlspecialchars($_POST['pais'] ?? ''); ?></p>
            <p>¿Es correcto?</p>
            <form action="home">
                <button>Sí, continuar</button>
            </form>

            <button type="button" onclick="window.history.back();">No, volver</button>
        </fieldset>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
