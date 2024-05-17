<?php
// views/resultadobusqueda.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado búsqueda</title>
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
        <div class="buscador_avanzado"> 
            <fieldset class="cuadrado_busqueda">
                <legend>Busca aquí tu foto: </legend>
                <form action="resultadobusqueda">
                    <p>
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" name="titulo">
                    </p>
                    <p>
                        <label for="pais">País:</label>
                        <select id="pais" name="pais">
                            <option value="" disabled selected>Selecciona un país</option>
                            <?php foreach ($data['paises'] as $pais): ?>
                                <option value="<?php echo htmlspecialchars($pais['IdPais']); ?>">
                                    <?php echo htmlspecialchars($pais['NomPais']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </p>
                    
                    <div class="fechas_desde_hasta">
                        <label for="fechaInicio">&#128197; Fecha desde:</label>
                        <input type="date" id="fechaInicio" name="fechaInicio">
                    
                        <label for="fechaFin">Hasta:</label>
                        <input type="date" id="fechaFin" name="fechaFin">
                    </div>
                    
                    <button>Buscar</button>
                </form>
            </fieldset>
        </div>
        <h1>Resultados:</h1>
        <p><?php echo $data['textoBusqueda']; ?></p>
        <div class="publicaciones">
            <?php foreach ($data['resultados'] as $foto): ?>
                <a href="foto?id=<?php echo htmlspecialchars($foto['idFoto']); ?>">
                    <section class="publicacion_indv">
                        <h2 class="titulo_publicacion"><?php echo htmlspecialchars($foto['titulo']); ?></h2>
                        <img class="lista_publicacion_img" src="<?php echo htmlspecialchars($foto['fichero']); ?>" alt="<?php echo htmlspecialchars($foto['titulo']); ?>">
                        <div class="fecha_ubicacion">
                            <p><?php echo htmlspecialchars($foto['fecha']); ?></p>
                            <p><?php echo htmlspecialchars($foto['NomPais']); ?></p>
                        </div>
                    </section>
                </a>
            <?php endforeach; ?>
        </div>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
