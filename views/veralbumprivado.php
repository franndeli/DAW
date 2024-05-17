<!--views/veralbumprivado.php-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($album['Titulo']); ?></title>
    <?php
    if (isset($_SESSION['style'])) {
        echo '<link rel="stylesheet" href="/DAW/' . $_SESSION['style'] . '">';
    } elseif (isset($_COOKIE['style'])) {
        echo '<link rel="stylesheet" href="DAW/' . $_COOKIE['style'] . '">';
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

    <main class="veralbumprivado">
        <h1><strong>Álbum:</strong> <?php echo htmlspecialchars($album['Titulo'] ?? 'Título no disponible'); ?></h1>
        <p><strong>Descripción:</strong> <?php echo htmlspecialchars($album['Descripcion'] ?? 'Descripción no disponible'); ?></p>
        <p><strong>Número total de fotos:</strong> <?php echo count($fotos); ?></p>
        <p><strong>Países:</strong> <?php echo implode(", ", $paises); ?></p>
        <p><strong>Intervalo de tiempo: Desde</strong> <?php echo htmlspecialchars($intervaloTiempo['fechaInicio'] ?? 'Fecha no disponible'); ?> <strong>hasta</strong> <?php echo htmlspecialchars($intervaloTiempo['fechaFin'] ?? 'Fecha no disponible'); ?></p>

        <?php require_once('views/galeria_fotos.php'); ?>
        <div class="putoboton">
            <a class="añadirfoto_boton" href="anadirfoto?id=<?php echo htmlspecialchars($album['IdAlbum']); ?>">Añadir foto</a>
        </div>
    </main>

    <?php require_once('views/footer.php'); ?>
</body>
</html>
