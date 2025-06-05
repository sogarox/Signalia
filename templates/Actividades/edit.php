<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividad $actividad
 */
?>
<?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']); ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $actividad->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $actividad->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividades form content">
            <?= $this->Form->create($actividad) ?>
            <fieldset>
                <legend><?= __('Editar Actividad') ?></legend>
                <?php
                    echo $this->Form->control('id_modulo');
                    echo $this->Form->control('titulo');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('tipo');
                    echo $this->Form->control('contenido');
                    echo $this->Form->control('respuesta_correcta');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
