<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modulo $modulo
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
        <div class="modulos form content">
            <?= $this->Form->create($modulo) ?>
            <fieldset>
                <legend><?= __('Add Modulo') ?></legend>
                <?php
                     echo $this->Form->control('id_curso', ['options' => $cursos]);
                    echo $this->Form->control('titulo');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('orden');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
