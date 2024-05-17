<?php
// views/publicaciones.php
?>

<h1>Últimas publicaciones:</h1>
<div class="publicaciones">
    <?php //var_dump($fotos); // Para depuración
        foreach ($data['fotos'] as $foto): ?>
        <a href="foto?id=<?php echo htmlspecialchars($foto['idFoto']); ?>">
            <section class="publicacion_indv">
                <h2 class="titulo_publicacion"><?php echo htmlspecialchars($foto['titulo']); ?></h2>
                <img class="lista_publicacion_img" src="<?php echo htmlspecialchars($foto['fichero']); ?>" alt="<?php echo htmlspecialchars($foto['titulo']); ?>">
                <div class="fecha_ubicacion">
                    <p><?php echo htmlspecialchars($foto['fregistro']); ?></p>
                    <p><?php echo htmlspecialchars($foto['NomPais']); ?></p>
                </div>
            </section>
        </a>
    <?php endforeach; ?>
</div>
