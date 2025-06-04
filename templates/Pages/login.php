<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acerca de Nosotros | Signalia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->css('add') ?>
    <?php
    $usuario = $this->getRequest()->getSession()->read('Auth.Usuario');
            $dashboardUrl = ['controller' => 'Pages', 'action' => 'home']; // Valor por defecto

            if ($usuario) {
                switch (strtolower($usuario->rol)) {
                    case 'moderador':
                        $dashboardUrl = ['controller' => 'Moderador', 'action' => 'dashboard'];
                        break;
                    case 'estudiante':
                        $dashboardUrl = ['controller' => 'Estudiante', 'action' => 'dashboard'];
                        break;
                    case 'educador':
                        $dashboardUrl = ['controller' => 'Educador', 'action' => 'dashboard'];
                        break;
                }
            }
    ?>
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

  <section class="registro">
    <h1>Inicia sesión</h1>
    <div class="cards-container">
      <div class="card moderador">
        <br><br><br>
        <img src="/Signalia/img/moderador.png" alt="Moderador">
        <br>
        <button class="tipo" onclick="location.href='/Signalia/usuarios/loginPass?rol=moderador'">Moderador</button>
      </div>
      <div class="card estudiante">
        <br>
        <img src="/Signalia/img/estudiante.png" alt="Estudiante">
        <button class="tipo" onclick="location.href='/Signalia/usuarios/loginPass?rol=estudiante'">Estudiante</button>
      </div>
      <div class="card educador">
        <br>
        <img src="/signalia/img/educador.png" alt="Educador">
        <button class="tipo" onclick="location.href='/Signalia/usuarios/loginPass?rol=educador'">Educador</button>
      </div>
    </div>
  </section>

</body>
</html>