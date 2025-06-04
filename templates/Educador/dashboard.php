<p>educador works</p>
<!-- filepath: c:\xampp\htdocs\Signalia\templates\Educador\dashboard.php -->
<p>Bienvenido, educador</p>
<?= $this->Html->css('dashboard') ?>
<div class="educador-actions">
    <?= $this->Html->link('Ver y editar cursos', ['controller' => 'Cursos', 'action' => 'index'], ['class' => 'action-button']) ?>
    <?= $this->Html->link('Calificar estudiantes', ['controller' => 'Estudiantes', 'action' => 'calificar'], ['class' => 'action-button']) ?>
    <!-- Agrega más botones según lo que necesites -->
</div>
<?= $this->Form->postButton('Cerrar sesión', ['controller' => 'Usuarios', 'action' => 'logout'], ['class' => 'logout-button']) ?>