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
            <?= $this->Html->link(__('Editar Calificación'), ['action' => 'edit', $calificacione->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Borrar Calificacion'), ['action' => 'delete', $calificacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calificacione->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Calificación'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva calificación'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="calificaciones view content">
            <h3><?= h($calificacione->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($calificacione->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Usuario') ?></th>
                    <td><?= $this->Number->format($calificacione->id_usuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Actividad') ?></th>
                    <td><?= $this->Number->format($calificacione->id_actividad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Calificacion') ?></th>
                    <td><?= $this->Number->format($calificacione->calificacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Realizacion') ?></th>
                    <td><?= h($calificacione->fecha_realizacion) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
