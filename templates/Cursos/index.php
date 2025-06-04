<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Curso> $cursos
 */
?>

<div class="cursos index content">
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']); ?>
    <?= $this->Html->link(__('Subir nuevo Curso'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cursos') ?></h3>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('titulo') ?></th>
                    <th><?= $this->Paginator->sort('categoria_discapacidad') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursos as $curso): ?>
                    <tr>
                        <td><?= $this->Number->format($curso->id) ?></td>
                        <td><?= h($curso->titulo) ?></td>
                        <td><?= h($curso->categoria_discapacidad) ?></td>
                        <td><?= h($curso->created) ?></td>
                        <td><?= h($curso->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $curso->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $curso->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $curso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $curso->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <?php
            $usuario = $this->getRequest()->getSession()->read('Auth.Usuario');
            $dashboardUrl = ['controller' => 'Pages', 'action' => 'home']; // Valor por defecto

            if ($usuario) {
                switch (strtolower($usuario->rol)) {
                    case 'moderador':
                        $dashboardUrl = ['controller' => 'Moderador', 'action' => 'dashboard'];
                        break;
                    case 'estudiante':
                        $dashboardUrl = ['controller' => 'Estudiante', 'action' => 'dashboard'];
                        break;
                    case 'educador':
                        $dashboardUrl = ['controller' => 'Educador', 'action' => 'dashboard'];
                        break;
                }
            }
            ?>
            <?= $this->Html->link(__('Volver al Dashboard'), $dashboardUrl, ['class' => 'button']) ?>
        </table>

    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>