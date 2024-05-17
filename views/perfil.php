<?php
// views/perfil.php
?>

<style>
    .buenos_dias{
        display: flex;
        justify-content: center;
        font-size: 20px;
    }
</style>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
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
    <?php if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        } else {
            header('Location: home');
            exit;
        }
    ?>
        <div class="buenos_dias">
            <?php $username = isset($_SESSION['username']) ? $_SESSION['username'] : (isset($_COOKIE['username']) ? $_COOKIE['username'] : 'Invitado'); 
            echo $greeting . " " . htmlspecialchars($username) . "."; ?>
        </div>
        <nav class="perfil">
            <ul>
                <li> <a href="datosusuario">Modificar datos</a> </li>
                <li> <a href="configurarestilos">Configurar estilos</a></li>
                <li> <a href="#">Darse de baja</a> </li>
                <li> <a href="misalbumes">Mis álbumes</a> </li>
                <li> <a href="misfotos">Mis fotos</a> </li>
                <li> <a href="anadirfoto">Añadir foto a album</a> </li>
                <li> <a href="crearalbum">Crear un nuevo álbum</a> </li>
                <li> <a href="solicitudalbum">Solicitar un álbum impreso</a> </li>  
                <li> <a href="login/logout">Cerrar sesión</a></li>
            </ul>
        </nav>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
