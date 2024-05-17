<!-- views/formulario_usuario.php -->

<?php $datosUsuario = $datosUsuario ?? [];
//print_r($datosUsuario); ?>

<fieldset class="registro">
    <legend>Por favor, introduce tus datos</legend>
    <form action="<?php echo $action_url; ?>" method="post" enctype="multipart/form-data">
        <p>
            <label for="nombre_r">Nombre:</label>
            <input type="text" id="nombre_r" name="nombre_r"  value="<?php echo htmlspecialchars($datosUsuario['NomUsuario'] ?? ''); ?>">
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($data['errors']['nombre_r'])): ?>
                <p class="mensaje_error"><?php echo htmlspecialchars($data['errors']['nombre_r']); ?></p>
            <?php endif; ?>
        </p>
        
        <p>
            <label for="contraseña_r"><?php echo ($action_url == 'datosusuario') ? 'Nueva Contraseña:' : 'Contraseña:'; ?></label>
            <input type="text" id="contraseña_r" name="contraseña_r" value="<?php echo ($action_url == 'datosusuario') ? '' : htmlspecialchars($datosUsuario['Clave'] ?? ''); ?>">
            <?php if (!empty($data['errors']['contraseña_r'])): ?>
                <p class="mensaje_error"><?php echo htmlspecialchars($data['errors']['contraseña_r']); ?></p>
            <?php endif; ?>
        </p>
        
        <p>
            <label for="repetir_contraseña">Repetir contraseña:</label>
            <input type="text" id="repetir_contraseña" name="repetir_contraseña">
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($data['errors']['repetir_contraseña'])): ?>
                <p class="mensaje_error"><?php echo htmlspecialchars($data['errors']['repetir_contraseña']); ?></p>
            <?php endif; ?>
        </p>
        
        <p>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($datosUsuario['Email'] ?? ''); ?>">
            <?php if (!empty($data['errors']['email'])): ?>
                <p class="mensaje_error"><?php echo htmlspecialchars($data['errors']['email']); ?></p>
            <?php endif; ?>
        </p>

        <p>
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo">
                <option value="" disabled <?php if (!isset($datosUsuario['Sexo'])) echo 'selected'; ?>>Selecciona una opción</option>
                <option value="1" <?php if (isset($datosUsuario['Sexo']) && $datosUsuario['Sexo'] == 1) echo 'selected'; ?>>Hombre</option>
                <option value="2" <?php if (isset($datosUsuario['Sexo']) && $datosUsuario['Sexo'] == 2) echo 'selected'; ?>>Mujer</option>
                <option value="otro" <?php if (isset($datosUsuario['Sexo']) && $datosUsuario['Sexo'] == 'otro') echo 'selected'; ?>>Otro</option>
            </select>
        </p>

        <p>
            <label for="fechaNacimiento">Fecha de nacimiento:</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo htmlspecialchars($datosUsuario['FNacimiento'] ?? ''); ?>">
            <?php if (!empty($data['errors']['fechaNacimiento'])): ?>
                <p class="mensaje_error"><?php echo htmlspecialchars($data['errors']['fechaNacimiento']); ?></p>
            <?php endif; ?>
        </p>

        <p>
            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" value="<?php echo htmlspecialchars($datosUsuario['Ciudad'] ?? ''); ?>">
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
            <label for="foto_perfil">Foto de perfil:</label>
            <input type="file" accept="image/*" id="foto_perfil" name="foto_perfil">
        </p>
        
        <button type="submit"><?php echo htmlspecialchars($textoBoton); ?></button>
    </form>
</fieldset>
