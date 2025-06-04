<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso $curso
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cursos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cursos form content">
            <?= $this->Form->create($curso) ?>
            <fieldset>
                <legend><?= __('Add Curso') ?></legend>
                <?php
                    echo $this->Form->control('titulo');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('categoria_discapacidad', [
                        'type' => 'select',
                        'options' => [
                            'visual' => 'Visual',
                            'auditiva' => 'Auditiva',
                            'cognitiva' => 'Cognitiva',
                            'habla' => 'Habla',
                            'multiple' => 'Múltiple'
                        ]
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
