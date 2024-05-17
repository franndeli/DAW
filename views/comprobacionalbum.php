<?php
// views/comprobacionalbum.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobar album</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2b7751e003.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once('views/header.php'); ?>
    <main>
        <h1>Comprobación de Datos del Álbum</h1>
        <div>
            <?php if (isset($datos)): ?>
                <ul>
                    <li><strong>Nombre:</strong> <?php echo htmlspecialchars($datos['nombre_persona_album']); ?></li>
                    <li><strong>Título del Álbum:</strong> <?php echo htmlspecialchars($datos['titulo_album']); ?></li>
                    <li><strong>Texto Adicional:</strong> <?php echo nl2br(htmlspecialchars($datos['texto_adicional'])); ?></li>
                    <li><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($datos['email']); ?></li>
                    <!-- DIRECCIÓN -->
                    <li><strong>Dirección:</strong> 
                        Calle <?php echo htmlspecialchars($datos['direccion']['calle']); ?>, 
                        Nº <?php echo htmlspecialchars($datos['direccion']['numero']); ?>, 
                        CP <?php echo htmlspecialchars($datos['direccion']['codigopostal']); ?>, 
                        <?php echo htmlspecialchars($datos['direccion']['localidad']); ?>, 
                        <?php echo htmlspecialchars($datos['direccion']['provincia']); ?>
                    </li>
                    <li><strong>Teléfono:</strong> <?php echo htmlspecialchars($datos['telefono']); ?></li>
                    <li><strong>Color de la Portada:</strong> <span style="background-color:<?php echo htmlspecialchars($datos['color_portada']); ?>;">&nbsp;&nbsp;&nbsp;&nbsp;</span></li>
                    <li><strong>Número de Copias:</strong> <?php echo (int) $datos['num_copias']; ?></li>
                    <li><strong>Resolución de las Fotos:</strong> <?php echo (int) $datos['resolucion']; ?> dpi</li>
                    <li><strong>Álbum de Fotos:</strong> <?php echo htmlspecialchars($datos['album_usuario']); ?></li>
                    <li><strong>Fecha de Recepción:</strong> <?php echo htmlspecialchars($datos['fecha_recepcion']); ?></li>
                    <li><strong>Impresión a Color:</strong> <?php echo isset($datos['impresion_color']) ? 'Sí' : 'No'; ?></li>
                </ul>
            <P class="precio_total">PRECIO TOTAL: <?php echo htmlspecialchars($datos['costeTotal']); ?> € <p>
            <?php else: ?>
                <p>No se han proporcionado datos.</p>
            <?php endif; ?>
        </div>
        <p>¿Es correcto?</p>
        <form action="home">
            <button>Sí, continuar</button>
        </form>

        <button type="button" onclick="window.history.back();">No, volver</button>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
