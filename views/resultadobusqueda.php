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
        <div class="buscador_avanzado"> 
            <fieldset class="cuadrado_busqueda">
                <legend>Busca aquí tu foto: </legend>
                <form action="resultadobusqueda">
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
            <h1>Resultados:</h1>
        <p><?php echo $data['textoBusqueda']; ?></p>
        </div>

        <div class="publicaciones">

            <a href="foto?id=1">
                <section class="publicacion_indv">
                    <h2 class="titulo_publicacion">Acampada</h2>
                    <img class="lista_publicacion_img" src="assets/img/acampar.jpg" alt="Foto1">
                    <div class="fecha_ubicacion">
                        <p>23/04/2006</p>
                        <p>España</p>
                    </div>
                </section>
            </a>

            <a href="foto?id=2">
                <section class="publicacion_indv">
                    <h2 class="titulo_publicacion">Prado</h2>
                    <img class="lista_publicacion_img" src="assets/img/campo.jpg" alt="Foto1">
                    <div class="fecha_ubicacion">
                        <p>23/04/2006</p>
                        <p>España</p>
                    </div>
                </section>
            </a>
        </div>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
