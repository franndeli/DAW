<!-- views/mostrarEstilo.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Estilo</title>
    <link rel="stylesheet" href="<?php echo '/DAW/' . $_SESSION['previsualizacionEstilo']; ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2b7751e003.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once('views/header.php'); ?>
    <main>
        <h1>Previsualización del Estilo</h1>
        <p>¿Te gusta este estilo?</p>
        <a href="/DAW/configurarestilos/confirmarEstilo?estiloId=<?php echo $estiloId; ?>">Sí, aplicar este estilo</a>
        <a href="/DAW/configurarestilos">No, volver a estilos</a>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
