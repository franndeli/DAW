<?php
// views/accesibilidad.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
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
        <div class="main_accesibilidad">
            <section class="section_accesibilidad">
                <h1>Declaración de Accesibilidad</h1>
    
                <h2>Introducción a la accesibilidad</h2>
                <p>La accesibilidad es el grado en el que todas las personas pueden percibir, comprender y navegar 
                    por la información contenida en un documento digital independientemente de sus capacidades técnicas, 
                    cognitivas o físicas.
                </p>
    
                <h2>Declaración de accesibilidad de Respiro Natural</h2>
                <p>Respiro Natural se ha comprometido a hacer accesibles su sitio web de conformidad con el Real Decreto 1112/2018, de 7 de septiembre, 
                    sobre accesibilidad de los sitios web.
                    La presente declaración de accesibilidad se aplica a los sitios web del dominio <a href="http://daw2023.infinityfreeapp.com/index.html">www.daw2023.infinityfreeapp.com</a>
                </p>
                
                <h2>Situaciación de cumplimiento</h2>
                <p>Este sitio web es parcialmente conforme con el nivel AA de las Pautas de Accesibilidad para el contenido 
                    Web en su versión 2.1, debido a las excepciones y a la falta de conformidad de los aspectos que se indican a continuación
                </p>

                <p>
                    <strong>Entre las ventajas que aporta la implantación de las técnicas y criterios de accesibilidad a los usuarios del sitio web, están las siguientes:</strong>
                    <ul>
                        <li>Facilitar el acceso de los usuarios e independientemente de sus capacidades, entorno, o infraestructura tecnológica.</li>
                        <li>Facilita el acceso con diferentes navegadores (se visualiza correctamente en las últimas versiones de los navegadores más habituales como Microsoft Internet Explorer (excepto versión 6 obsoleta), Netscape, Mozilla Firefox, Safari y Google Chrome).</li>
                        <li>Los contenidos se presentan estructurados y más claros, facilitando su interpretación.</li>
                        <li>Mejora la navegación y la experiencia del usuario.</li>
                    </ul>

                    <strong>Para ello se han adoptado, entre otras medidas:</strong>
                    <ul>
                        <li>Separación entre contenido y presentación, utilizando las hojas de estilo (CSS).</li>
                        <li>Jerarquización del contenido, utilizado el marcado estructural y semántico adecuado para la información y las relaciones existentes entre el contenido.</li>
                        <li>Aplicación de los estándares del W3C.</li>
                        <li>Mejora de la navegabilidad, menú de navegación visible en todas las páginas, camino de migas.</li>
                    </ul>
                </p>
            </section>
        </div>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
