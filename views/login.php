<?php
// views/login.php
?>

<?php
$error_message = '';
if (isset($_GET['error']) && $_GET['error'] == 'invalid_credentials') {
    $error_message = 'Nombre de usuario o contraseña incorrectos.';
    echo '<script>window.history.replaceState({}, document.title, window.location.pathname);</script>';
}
?>

<li>
    <div class="formulario_entrar">
        <?php if (!empty($error_message)): ?>
            <p class="mensaje_error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <input type="hidden" name="action" value="login">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>
            <div>
                <label for="contraseña">Contraseña:</label>
                <input type="text" id="contraseña" name="contraseña">
            </div>
            <div>
                <input type="checkbox" id="remember_me" name="remember_me">
                <label for="remember_me">Recordarme en este equipo</label>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>
</li>

