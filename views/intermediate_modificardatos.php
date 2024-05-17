<?php
// views/intermediate_modificardatos.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificando Datos...</title>
</head>
<body onload="document.forms['redirectForm'].submit()">
    <form name="redirectForm" action="comprobacionmodificaciondatos" method="POST">
        <?php if (isset($_SESSION['validated_data'])): ?>
            <?php foreach ($_SESSION['validated_data'] as $key => $value): ?>
                <input type="hidden" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($value); ?>">
            <?php endforeach; ?>
        <?php endif; ?>
    </form>
</body>
</html>
