<?php
// views/perfil_publico.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pérfil público</title>
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
    <main>
        <div class="perfil-publico">
            <h1>Perfil de <?php echo htmlspecialchars($data['usuario']['NomUsuario']); ?></h1>
            <img src="<?php echo htmlspecialchars($data['usuario']['Foto']); ?>" alt="Foto de perfil">
            <p>Fecha de registro: <?php echo htmlspecialchars($data['usuario']['FRegistro']); ?></p>
        </div>
        <div class="albumes-usuario">
            <h2>Álbumes de <?php echo htmlspecialchars($data['usuario']['NomUsuario']); ?></h2>
            <ul>
                <?php foreach ($data['albumes'] as $album): ?>
                    <li><a href="veralbum?id=<?php echo htmlspecialchars($album['IdAlbum']); ?>"><?php echo htmlspecialchars($album['Titulo']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
