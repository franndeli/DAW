<?php
// views/solicitudalbum.php
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var slider = document.getElementById('resolucion');
            var output = document.getElementById('value');

            // Actualiza el valor del span con el valor del slider
            slider.oninput = function() {
                output.textContent = this.value;
            }
        });
    </script>
</head>
<body>
    <?php require_once('views/header.php'); ?>
    <main class="solicitud">
        <h1>Solicitud de Álbum Impreso</h1>
        <p>Mediante esta opción de impresión de álbum y envío de uno de tus álbumes a todo color, toda resolucion. Lorem ipsum dolor sit, 
            amet consectetur adipisicing elit. Nesciunt minus provident blanditiis culpa eligendi beatae autem iste ab voluptatum perferendis 
            pariatur, tempora expedita hic distinctio! Odit adipisci tenetur maiores iusto.
        </p>

        <div class="tabla_formulario">
            <div class="tabla_div"> 
                <h2>Tarifas</h2>
                <table>
                    <tr>
                        <th>Número de Páginas</th>
                        <th>Tarifa</th>
                    </tr>
                    <tr>
                        <td>Menos de 5</td>
                        <td>0.10€ por pág.</td>
                    </tr>
                    <tr>
                        <td>Entre 5 y 11</td>
                        <td>0.08€ por pág.</td>
                    </tr>
                    <tr>
                        <td>Más de 11</td>
                        <td>0.07€ por pág.</td>
                    </tr>
                    <tr>
                        <th>Color</th>
                        <th>Tarifa</th>
                    </tr>
                    <tr>
                        <td>Blanco y negro</td>
                        <td>0€</td>
                    </tr>
                    <tr>
                        <td>Color</td>
                        <td>0.05€ por foto</td>
                    </tr>
                    <tr>
                        <th>Resolución</th>
                        <th>Tarifa</th>
                    </tr>
                    <tr>
                        <td>Más de 300 dpi</td>
                        <td>0.02€ por foto</td>
                    </tr>
                </table>

                <div class="tabla_calculada_div">
                    <?php echo $tablaHtml; ?>
                </div>
            </div>
            
            <div class="formulario_div"> 
                <section class="formulario_album">
                    <h3>Formulario de solicitud</h3>
                    <p>Rellene el siguiente formulario aportando todos los detalles para confeccionar tu álbum</p>
                    <form action="comprobacionalbum" method="post">
                        <ul>
                            <li>
                                <label for="nombre_persona_album">Nombre:</label>
                                <input type="text" id="nombre_persona_album" name="nombre_persona_album" maxlength="200">
                            </li>
                            
                            <li>
                                <label for="titulo_album">Título del Álbum:</label>
                                <input type="text" id="titulo_album" name="titulo_album" maxlength="200">
                            </li>
        
                            <li>
                                <label for="texto_adicional">Texto Adicional:</label>
                                <textarea id="texto_adicional" name="texto_adicional" maxlength="4000" rows="4" cols="50"></textarea>
                            </li>
        
                            <li>
                                <label for="email">Correo Electrónico:</label>
                                <input type="text" id="email" name="email" maxlength="200">                      
                            </li>
        
                            <!-- Dirección -->
                            <li>
                                <fieldset class="direccion">
                                    <legend>Dirección:</legend>
                                    <label for="calle">Calle:</label>
                                    <input type="text" id="calle" name="direccion[calle]">
                    
                                    <label for="numero">Número:</label>
                                    <input type="text" id="numero" name="direccion[numero]">
                    
                                    <label for="codigopostal">CP:</label>
                                    <input type="text" id="codigopostal" name="direccion[codigopostal]">
                    
                                    <label for="localidad">Localidad:</label>
                                    <input type="text" id="localidad" name="direccion[localidad]">
        
                                    <label for="provincia">Provincia:</label>
                                    <input type="text" id="provincia" name="direccion[provincia]">
                                </fieldset>
                            </li>
        
                            <li>
                                <label for="telefono">Teléfono:</label>
                                <input type="text" id="telefono" name="telefono">
                            </li>
                            
                            <li>
                                <label for="color_portada">Color de la Portada:</label>
                                <input type="color" id="color_portada" name="color_portada" value="#000000">
                            </li>
                            
                            <li>
                                <label for="num_copias">Número de Copias:</label>
                                <input type="number" id="num_copias" name="num_copias" min="1" value="1">
                            </li>
                            
                            <li>
                                <label for="resolucion">Resolución de las Fotos:</label>
                                <input type="range" id="resolucion" name="resolucion" min="150" max="900" step="150" value="150">
                                <span id="value">150</span>
                            </li>
                
                            <!-- Álbum de fotos del usuario -->
                            <li>
                                <label for="album_usuario">Álbum de Fotos:</label>
                                <select id="album_usuario" name="album_usuario">
                                    <option value="">Selecciona un álbum</option>
                                </select>
                            </li>
                            
                            <li>
                                <label for="fecha_recepcion">Fecha de Recepción:</label>
                                <input type="date" id="fecha_recepcion" name="fecha_recepcion">
                            </li>
                            
                            <li>
                                <label>Impresión a Color:</label>
                                <input type="checkbox" id="impresion_color" name="impresion_color">
                            </li>
                        </ul>
                        <button>Solicitar Album</button>
                    </form>
                </section>
            </div>
        </div>
    </main>
    <?php require_once('views/footer.php'); ?>
</body>
</html>
