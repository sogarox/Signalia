<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar la cuenta'),
                ['action' => 'delete', $usuario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usuarios form content">
            <?= $this->Form->create($usuario) ?>
            <fieldset>
                <legend><?= __('Edit Usuario') ?></legend>
                <?php
                    echo $this->Form->control('nombres');
                    echo $this->Form->control('apellidos');
                    echo $this->Form->control('correo');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('usuario');
                    echo $this->Form->control('contrasena');
                    echo $this->Form->control('rol');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
