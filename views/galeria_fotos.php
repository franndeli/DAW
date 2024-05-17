<!-- Parte de la galería de fotos -->
<div class="veralbum-galeria">
    <?php foreach ($fotos as $foto): ?>
        <a href="foto?id=<?php echo htmlspecialchars($foto['IdFoto']); ?>">
        <div class="foto-album">
            <h3><?php echo htmlspecialchars($foto['Titulo']); ?></h3>
            <img src="<?php echo htmlspecialchars($foto['Fichero']); ?>" alt="<?php echo htmlspecialchars($foto['Titulo']); ?>">
            <p>País: <?php echo htmlspecialchars($foto['NomPais']); ?></p>
        </div> </a>
    <?php endforeach; ?>
</div>
