<?= $this->Form->postButton('Cerrar sesión', ['controller' => 'Usuarios', 'action' => 'logout'], ['class' => 'logout-button']) ?>
<?= $this->Html->css('dashboard') ?>
<div class="moderador-dashboard">
    <h1>Panel de Moderador</h1>
    <p>Bienvenido al panel de moderador. Aquí puedes gestionar los contenidos y usuarios.</p>
    
    <div class="actions">
        <h2>Acciones disponibles:</h2>
        <ul>
            <li><?= $this->Html->link('Gestionar Usuarios', ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Gestionar Contenidos', ['controller' => 'Cursos', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Ver Reportes', ['controller' => 'Reportes', 'action' => 'index']) ?></li>
        </ul>
    </div>