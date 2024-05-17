<!-- views/datosusuario.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Datos</title>
    <?php
    if (isset($_SESSION['style'])) {
        echo '<link rel="stylesheet" href="assets/css/' . $_SESSION['style'] . '">';
    } elseif (isset($_COOKIE['style'])) {
        echo '<link rel="stylesheet" href="assets/css/' . $_COOKIE['style'] . '">';
    } else {
        echo '<link rel="stylesheet" href="assets/css/style.css">';
    }
    ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2b7751e003.js" crossorigin="anonymous"></script>
</head>
<body>
<?php require_once('views/header.php'); ?>
    <main>
        <?php $action_url = 'registro';
        $datosUsuario = $data['datosUsuario'];
        require_once('views/formulario_usuario.php'); ?>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
