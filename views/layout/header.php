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
    <div style="cursor:pointer;" onclick="window.location.href='index.php'" class="logo">
        <span class="logo-icon"><img src="public/images/icons/achievement.svg" alt="Icono"></span>
        <span class="logo-text">QUESTLY</span>
    </div>
    <div class="auth-buttons">
        <a onclick="abrirModal('login')" class="btn-login">Iniciar sesión</a>
        <a onclick="abrirModal('registro')" class="btn-register">Registrarse</a>
    </div>
</header>