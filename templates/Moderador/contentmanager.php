<?= $this->Form->postButton('Cerrar sesión', ['controller' => 'Usuarios', 'action' => 'logout'], ['class' => 'logout-button']) ?>
<?= $this->Html->css('dashboard') ?>
<div class="moderador-dashboard">
    <h1>Panel de Moderador</h1>
    <p>Bienvenido al panel de moderador. Aquí puedes gestionar los contenidos y usuarios.</p>
    
    <div class="actions">
        <h2>Acciones disponibles:</h2>
        <ul>
            <li><?= $this->Html->link('Gestionar Cursos', ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Gestionar Modulos', ['controller' => 'Cursos', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link('Ver Calificaciones', ['controller' => 'Calificaciones', 'action' => 'index']) ?></li>
        </ul>
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
            <?= $this->Html->link(__('Volver al Dashboard'), $dashboardUrl, ['class' => 'button']) ?>
        
    </div>