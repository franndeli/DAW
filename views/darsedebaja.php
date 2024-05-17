<?php
// views/baja.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Darse de baja </title>
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
    <?php require_once('views/header.php');
    // print_r($data);
    ?>
    <main>
        <h1>Confirmación de Baja</h1>
        <p>Listado de tus álbumes y fotos:</p>
        <ul>
            <?php 
            $totalFotos = 0;
            foreach ($data['albumes'] as $album): 
                $totalFotos += $album['cantidadFotos'];
            ?>
                <li><?php echo htmlspecialchars($album['Titulo']); ?> - <?php echo htmlspecialchars($album['cantidadFotos']); ?> fotos</li>
            <?php endforeach; ?>
        </ul>
        <p>Número total de fotos: <?php echo $totalFotos; ?></p>
        <form action="darsedebaja" method="post">
            <label for="contrasena">Introduce tu contraseña para confirmar:</label>
            <input type="password" id="contrasena" name="contrasena" required>
            <?php if (!empty($errores['ponlacontraseñaprimo'])): ?>
                <p class="mensaje_error"><?php echo htmlspecialchars($errores['ponlacontraseñaprimo']); ?></p>
            <?php endif; ?>
            <button type="submit" name="confirmarbaja">Confirmar Baja</button>
        </form>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
