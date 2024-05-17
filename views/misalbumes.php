<!-- views/mis_albumes.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Mis álbumes</title>
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

    <main class="misalbumes_main">
        <h1>Mis Álbumes</h1>
        <div class="lista-albumes">
            <?php foreach ($data['albumes'] as $album): ?>
                <a href='veralbumprivado?id= <?php echo htmlspecialchars($album['IdAlbum']); ?>'> 
                <div class="album">
                    <p class="titulo_misalbum"><?php echo htmlspecialchars($album['Titulo']); ?></p>
                    <p><?php echo htmlspecialchars($album['Descripcion']); ?></p>
                </div> </a>
            <?php endforeach; ?>
        </div>
    </main>

    <?php require_once('views/footer.php'); ?>
</body>
</html>
