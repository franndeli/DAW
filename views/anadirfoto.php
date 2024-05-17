<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Foto a Álbum</title>
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

    <main class="formulario-anadir-foto">
        <h1>Añadir Foto a Álbum</h1>
        <form action="anadirfoto" method="post" enctype="multipart/form-data">
            <p>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo">
                <?php if (isset($errors['titulo'])): ?>
                    <div class="mensaje_error"><?php echo htmlspecialchars($errors['titulo']); ?></div>
                <?php endif; ?>
            </p>

            <p>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"></textarea>
            </p>

            <p>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha">
            </p>

            <p>
                <label for="pais">País:</label>
                <select id="pais" name="pais">
                    <option value="" disabled <?php if (!isset($datosUsuario['Pais'])) echo 'selected'; ?>>Selecciona un país</option>
                    <?php foreach ($data['paises'] as $pais): ?>
                        <option value="<?php echo htmlspecialchars($pais['IdPais']); ?>"
                            <?php if (isset($datosUsuario['Pais']) && $pais['IdPais'] == $datosUsuario['Pais']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($pais['NomPais']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>
                <label for="foto">Foto:</label>
                <input type="file" id="foto" name="foto">
            </p>

            <p>
                <label for="textoAlternativo">Texto Alternativo:</label>
                <input type="text" id="textoAlternativo" name="textoAlternativo">
                <?php if (isset($errors['textoAlternativo'])): ?>
                    <div class="mensaje_error"><?php echo htmlspecialchars($errors['textoAlternativo']); ?></div>
                <?php endif; ?>
            </p>

            <p>
                <label for="album">Álbum:</label>
                <select id="album" name="album">
                    <?php if (is_array($albumPreseleccionado)): ?>
                        <option value="<?php echo htmlspecialchars($albumPreseleccionado['IdAlbum']); ?>" selected>
                            <?php echo htmlspecialchars($albumPreseleccionado['Titulo']); ?>
                        </option>
                    <?php else: ?>
                        <option value="" selected>Selecciona un álbum</option>
                    <?php endif; ?>
                    <?php foreach ($albumes as $album): ?>
                        <?php if (!isset($albumPreseleccionado) || $album['IdAlbum'] != $albumPreseleccionado['IdAlbum']): ?>
                            <option value="<?php echo htmlspecialchars($album['IdAlbum']); ?>">
                                <?php echo htmlspecialchars($album['Titulo']); ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </p>

            <?php if (isset($errors['textoAlternativo'])): ?>
                <div class="mensaje_error"><?php echo htmlspecialchars($errors['noInsercion']); ?></div>
            <?php endif; ?>

            <button type="submit" name="anadelafoto">Añadir Foto</button>
        </form>
    </main>

    <?php require_once('views/footer.php'); ?>
</body>
</html>
