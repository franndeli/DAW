<?php
// views/header.php
?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
$username = $isLoggedIn ? $_SESSION['username'] : (isset($_COOKIE['username']) ? $_COOKIE['username'] : null);
?>

<style>
    .bienvenido{
        color: #6B7D5C;
    }
</style>

<header>
    <div class="logo">
        <a href="home"><img class="logo_web" src="assets/img/respiro_natural.png" alt="Logo de la página" height="130"></a>
        <a href="home"><p class="titulo">RESPIRO NATURAL</p></a>
    </div>
    <div class="enlaces">
        <nav>
            <i id="icono_menu" class="fa-solid fa-bars"></i>
            <ul class="menu">
                <li>
                    <a class="enlaces_menu" href="home">Inicio <i class="fa-solid fa-house"></i> </a>
                </li>
                <li>
                    <a class="enlaces_menu" href="buscar">Buscar <i class="fa-solid fa-magnifying-glass"></i> </a>
                </li>
                    <?php
                        if (!isset($_SESSION['logged_in']) && !isset($_COOKIE['username'])) {
                            require_once('views/login.php');
                        }

                        if (isset($_COOKIE['last_visit']) && $isLoggedIn): ?>
                            <div class="welcome-message">
                                <p class="bienvenido"> Bienvenido de nuevo, <strong><?php echo htmlspecialchars($username); ?></strong>. 
                                <br>Su última visita fue el <?php echo htmlspecialchars($_COOKIE['last_visit']); ?>.</p>
                            </div>
                    <?php endif; ?>
                <li>
                <?php
                    // Verificar si la sesión está activa O si existe la cookie de usuario
                    if ($isLoggedIn): ?>
                        <a class="enlaces_menu" href="perfil">Perfil <i class="fa-solid fa-user"></i> </a>
                    <?php else: ?>
                        <a class="enlaces_menu" href="registro">Registrar <i class="fa-regular fa-user"></i> </a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>