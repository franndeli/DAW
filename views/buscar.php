<?php
// views/buscar.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">

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
                <form action="resultadobusqueda" method="get">
                    <p>
                        <label for="titulo">Título:</label>
                        <input type="text" id="titulo" name="titulo">
                    </p>
                    <p>
                        <label for="pais">&#127759; País:</label>
                        <input type="text" id="pais" name="pais">
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
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
