<?php
// views/header.php
?>


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
                    <?php if (isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] == '1'): ?>
                    <?php else: ?>
                        <?php require_once('views/login.php'); ?>
                    <?php endif; ?>
                <li>
                    <?php if (isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] == '1'): ?>
                        <a class="enlaces_menu" href="perfil">Perfil <i class="fa-solid fa-user"></i> </a>
                    <?php else: ?>
                        <a class="enlaces_menu" href="registro">Registrar <i class="fa-regular fa-user"></i> </a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>