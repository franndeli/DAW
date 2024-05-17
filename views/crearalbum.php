<?php
// views/home.php
?>

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
    <main class="main_crear_album">
        <fieldset class="crear_album">
            <legend>Crea tu nuevo álbum:</legend>
            <form action="perfil">
                <p>
                    <label for="titulo_a">Título:</label>
                    <input type="text" id="titulo_a" name="titulo_a">
                </p>
                <p>
                    <label for="descripcion_a">Descripción:</label>
                    <input type="textarea" id="descripcion_a" name="descripcion_a">
                </p>
            <form>
            <button type="submit">Crear</button>
        </fieldset>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>