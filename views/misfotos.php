<!-- views/misfotos.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Mis fotos</title>
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
        <h1>Mis Fotos</h1>
        <div class="galeria-fotos">
            <?php foreach ($data['fotos'] as $foto): ?>
                <div class="foto">
                    <h3><?php echo htmlspecialchars($foto['Titulo']); ?></h3>
                    <img src="<?php echo htmlspecialchars($foto['Fichero']); ?>" alt="<?php echo htmlspecialchars($foto['Titulo']); ?>">
                    <p>Álbum: <a href='veralbumprivado?id= <?php echo htmlspecialchars($foto['Album']); ?>'><?php echo htmlspecialchars($foto['NombreAlbum']); ?></a></p>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>