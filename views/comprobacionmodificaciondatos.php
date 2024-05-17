<?php
// views/comprobacionmodificaciondatos.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobación de Modificación</title>

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
    <main class="comprobacion_registro">
        <fieldset>
            <h1>Comprobación de Modificación de Datos</h1>
            <!-- Mostrar los datos actualizados de forma similar a comprobacionregistro.php -->
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_POST['nombre_r'] ?? ''); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email'] ?? ''); ?></p>
            <p><strong>Sexo:</strong> 
                <?php
                $sexo = $_POST['sexo'] ?? '';
                $sexoTexto = ($sexo == 1) ? 'Hombre' : (($sexo == 2) ? 'Mujer' : 'Otro');
                echo htmlspecialchars($sexoTexto);
                ?>
            </p>
            <p><strong>Fecha de Nacimiento:</strong> <?php echo htmlspecialchars($_POST['fechaNacimiento'] ?? ''); ?></p>
            <p><strong>Ciudad:</strong> <?php echo htmlspecialchars($_POST['ciudad'] ?? ''); ?></p>
            <p><strong>País:</strong> 
                <?php
                $paisID = $_POST['pais'] ?? '';
                $paisNombre = '';
                foreach ($data['paises'] as $pais) {
                    if ($pais['IdPais'] == $paisID) {
                        $paisNombre = $pais['NomPais'];
                        break;
                    }
                }
                echo htmlspecialchars($paisNombre);
                ?>
            </p>
            <p>¿Confirmas los cambios?</p>
            <form action="comprobacionmodificaciondatos" method="post">
                <button type="submit" name="confirmar">Confirmar Cambios</button>
            </form>
            
            <button type="button" onclick="window.history.back();">Cancelar</button>
        </fieldset>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>