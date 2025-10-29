<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questly</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/images/icons/achievement.svg">
</head>

<!-- HEADER -->
<header class="header">
    <div class="logo">
        <span class="logo-icon"><img src="public/images/icons/achievement.svg" alt="Icono"></span>
        <span class="logo-text">QUESTLY</span>
    </div>
    <!-- Se ocultarán al estar en una página que no sea la landing page (index.php) -->
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'index';
    }
    if ($page === 'index') {
    ?>
        <div class="auth-buttons">
            <a href="index.php?page=login" class="btn-login">Iniciar sesión</a>
            <a href="index.php?page=register" class="btn-register">Registrarse</a>
        </div>
    <?php
    }
    ?>
</header>