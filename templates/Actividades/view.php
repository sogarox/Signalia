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
            <?= $this->Html->link(__('Edit Actividad'), ['action' => 'edit', $actividad->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actividad'), ['action' => 'delete', $actividad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividad->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actividades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actividad'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividades view content">
            <h3><?= h($actividad->titulo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Titulo') ?></th>
                    <td><?= h($actividad->titulo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= h($actividad->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Respuesta Correcta') ?></th>
                    <td><?= h($actividad->respuesta_correcta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($actividad->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Modulo') ?></th>
                    <td><?= $this->Number->format($actividad->id_modulo) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($actividad->descripcion)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Contenido') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($actividad->contenido)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
