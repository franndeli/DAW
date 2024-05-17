<?php
// views/veralbum.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Foto</title>
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
    <?php 
    $album = $data['album'];
    $fotos = $data['fotos'];
    $paises = $data['paises'];
    $intervaloTiempo = $data['intervaloTiempo'];

    require_once('views/header.php'); 
    ?>

    <main class="veralbum-main">
        <div class="veralbum-info">
            <h1>Fotos del Álbum: <?php echo htmlspecialchars($album['Titulo']); ?></h1>
            <p><strong>Descripción:</strong> <?php echo htmlspecialchars($album['Descripcion']); ?></p>
            <p><strong>Número de fotos:</strong> <?php echo count($fotos); ?></p>
            <p><strong>Países:</strong> <?php echo implode(", ", $paises); ?></p>
            <p><strong>Intervalo de tiempo: Desde</strong> <?php echo $intervaloTiempo['fechaInicio']; ?> <strong>hasta</strong> <?php echo $intervaloTiempo['fechaFin']; ?></p>
        </div>

        <?php require_once('views/galeria_fotos.php'); ?>
    </main>

    <?php require_once('views/footer.php'); ?>
</body>
</html>
