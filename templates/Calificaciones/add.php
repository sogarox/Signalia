<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Calificacione $calificacione
 */
?>
<?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="calificaciones form content">
            <?= $this->Form->create($calificacione) ?>
            <fieldset>
                <legend><?= __('Añadir Calificacion') ?></legend>
                <?php
                    echo $this->Form->control('id_usuario');
                    echo $this->Form->control('id_actividad');
                    echo $this->Form->control('calificacion');
                    echo $this->Form->control('fecha_realizacion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
