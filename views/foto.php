<?php
// views/foto.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($data['detallesFoto']['Titulo']); ?></title>
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
        <?php if ((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) || 
            (isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] == '1')): ?>
            <div class="publicacion_section">
                <section class="publicacion">
                    <h1><?php $foto = $data['detallesFoto'];
                    //print_r($foto);
                    echo htmlspecialchars($foto['Titulo']); ?></h1>
                    <img src="<?php echo htmlspecialchars($foto['Fichero']); ?>" alt="<?php echo htmlspecialchars($foto["Titulo"]); ?>">
                    <div class="fecha_ubicacion_solo">
                        <p><?php echo htmlspecialchars($foto['Fecha']); ?></p>
                        <p><?php echo htmlspecialchars($foto['NomPais']); ?></p>
                    </div>
                    <div class="album_usuario">
                        <p>Álbum de fotos: <a href="veralbum?id=<?php echo htmlspecialchars($foto['Album']); ?>"><?php echo htmlspecialchars($foto['NombreAlbum']); ?></a></p>
                        <p>Usuario: <a href="perfilpublico?id=<?php echo htmlspecialchars($foto['usuario']); ?>"><?php echo htmlspecialchars($foto['NomUsuario']); ?></a></p>
                    </div>       
                </section>
            </div>
        <?php else: ?>
            <?php require_once('views/aviso.php'); ?>
        <?php endif; ?>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
