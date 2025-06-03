<?= $this->Html->css('add') ?>
<h1>Iniciar sesión</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('usuario', ['label' => 'Usuario']) ?>
<?= $this->Form->control('contrasena', ['label' => 'Contraseña', 'type' => 'password']) ?>
<?= $this->Form->button('Entrar') ?>
<?= $this->Form->end() ?>
    <div><?= $this->Flash->render() ?></div>