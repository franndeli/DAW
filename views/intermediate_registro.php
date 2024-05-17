<!-- views/intermediate_registro.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Redireccionando...</title>
</head>
<body onload="document.forms['redirectForm'].submit()">
    <form name="redirectForm" action="comprobacionregistro" method="POST">
        <?php foreach ($_SESSION['validated_data'] as $key => $value): ?>
            <input type="hidden" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($value); ?>">
        <?php endforeach; ?>
    </form>
</body>
</html>

