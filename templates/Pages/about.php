<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acerca de Nosotros | Signalia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->css('home') ?>
</head>
<body>
    <div class="navbar">
        <div class="logo">Signalia</div>
        <nav>
            <a href="/Signalia/pages/home">Inicio</a>
      <a href="/Signalia/pages/about">Sobre nosotros</a>
      <a href="/Signalia/usuarios/index">Iniciar sesión</a>
      <a href="/Signalia/usuarios/add">Registro</a>
        </nav>
    </div>
    <div class="hero">
        <h1>Acerca de Signalia</h1>
        <p>Signalia es una plataforma dedicada a la accesibilidad y la inclusión digital para personas con discapacidad.</p>
    </div>
    <div class="about-content" style="max-width: 800px; margin: 2rem auto; background: #fff; padding: 2rem; border-radius: 8px;">
        <h2>Nuestra Misión</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque euismod, nisi eu consectetur consectetur, nisl nisi consectetur nisi, euismod euismod nisi nisi euismod.</p>
        <h2>¿Quiénes somos?</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque aliquam odio et faucibus. Nulla rhoncus feugiat eros quis consectetur.</p>
        <h2>Valores</h2>
        <ul>
            <li>Inclusión</li>
            <li>Accesibilidad</li>
            <li>Innovación</li>
            <li>Empatía</li>
        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus.</p>
    </div>
    <div class="footer">
        &copy; <?= date('Y') ?> Signalia. Todos los derechos reservados.
    </div>
</body>
</html>