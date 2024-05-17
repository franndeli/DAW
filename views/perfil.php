<?php
// views/perfil.php
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
        <?php if (isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] == '1'): ?>
            <nav class="perfil">
            <ul>
                <li> <a href="#">Modificar datos</a> </li>
                <li> <a href="#">Darse de baja</a> </li>
                <li> <a href="#">Visualizar álbumes</a> </li>
                <li> <a href="crearalbum">Crear un nuevo álbum</a> </li>
                <li> <a href="solicitudalbum">Solicitar un álbum impreso</a> </li>  
                <li> <a href="home">Logout</a></li>
            </ul>
        </nav>
        <?php else: ?>
            <?php require_once('views/aviso.php'); ?>
        <?php endif; ?>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
