<!-- filepath: c:\xampp\htdocs\Signalia\templates\Educador\dashboard.php -->
<?= $this->Html->css('dashboard') ?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #9d5da3;
        margin: 0;
        padding: 0;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: rgb(255, 255, 255);
        padding: 10px 20px;
        color: white;
    }

    .navbar img {
        height: 40px;
    }

    .navbar a {
        color: white;
        margin-left: 15px;
        text-decoration: none;
        font-weight: bold;
    }

    .navbar a:hover {
        text-decoration: underline;
    }

    .dashboard-container {
        max-width: 900px;
        margin: 30px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .dashboard-title {
        text-align: center;
        color: rgb(0, 0, 0);
        font-size: 24px;
        margin-bottom: 30px;
    }

    .educador-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-bottom: 30px;
    }

    .action-button {
        background-color: #9d5da3;
        color: white;
        padding: 15px 25px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s;
    }

    .action-button:hover {
        background-color: rgb(130, 76, 134);
    }
    
    .logout-button {
        background-color: #e74c3c;
        color: white;
        padding: 12px 20px;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        display: block;
        margin: 30px auto 0;
        transition: background-color 0.3s;
    }

    .logout-button:hover {
        background-color: #c0392b;
    }

    .team-member {
      display: flex;
      flex-direction: column;
      align-items: center;
      max-width: 160px;
    }

    .team-member img {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .team-member .name {
      font-weight: bold;
      color: #333;
    }
    .profe{
        height: 40px;
        width: 40px;
        border-radius: 50%;
        margin-right: 10px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .team-member .role {
      color: #777;
      font-size: 14px;
    }
</style>

<!-- NAVBAR para usuarios logueados -->
<div class="navbar">
    <div>
        <img src="<?= $this->Url->image('logo_signalia.png') ?>" alt="Logo Signalia">
    </div>
    <div>
        <?= $this->Html->link('Inicio', ['controller' => 'Educador', 'action' => 'dashboard'], ['class' => 'action-button']) ?>
        <?= $this->Html->link(
    'Editar perfil',
    ['controller' => 'Usuarios', 'action' => 'edit', $this->getRequest()->getSession()->read('Auth.Usuario')->id],
    ['class' => 'action-button']
) ?>
        <?= $this->Html->link('Cerrar sesión', ['controller' => 'Usuarios', 'action' => 'logout'], ['class' => 'logout-button'], ['confirm' => '¿Estás seguro que deseas cerrar sesión?']) ?>
    </div>
</div>

<!-- CONTENIDO DEL DASHBOARD -->
<div class="dashboard-container">
    <h2 class="dashboard-title">Bienvenido al Panel del Educador</h2>
    <div class="team-member">
        <img class="profe" src="/Signalia/img/profe_sergio.jpg" alt="Sergio Jimenez">
        <div class="name">Sergio Jimenez</div>
        <div class="role">Educador de signalia</div>
    </div>


    <div class="educador-actions">
        <?= $this->Html->link('Ver y editar cursos', ['controller' => 'Cursos', 'action' => 'index'], ['class' => 'action-button']) ?>
        <?= $this->Html->link('Calificar estudiantes', ['controller' => 'Calificaciones', 'action' => 'index'], ['class' => 'action-button']) ?>
        <?= $this->Html->link(
    'Editar perfil',
    ['controller' => 'Usuarios', 'action' => 'edit', $this->getRequest()->getSession()->read('Auth.Usuario')->id],
    ['class' => 'action-button']
) ?>
        <?= $this->Html->link('Módulos', ['controller' => 'Modulos', 'action' => 'index'], ['class' => 'action-button']) ?>
    </div>



    <?= $this->Form->postButton('Cerrar sesión', ['controller' => 'Usuarios', 'action' => 'logout'], ['class' => 'logout-button'],  ['confirm' => '¿Estás seguro que deseas cerrar sesión?']) ?>