<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modulo $modulo
 */
?>
<?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']); ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Modulo'), ['action' => 'edit', $modulo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Modulo'), ['action' => 'delete', $modulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modulo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Modulos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Modulo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="modulos view content">
            <h3><?= h($modulo->titulo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Titulo') ?></th>
                    <td><?= h($modulo->titulo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($modulo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Curso') ?></th>
                    <td><?= $this->Number->format($modulo->id_curso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Orden') ?></th>
                    <td><?= $this->Number->format($modulo->orden) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($modulo->descripcion)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
