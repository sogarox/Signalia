<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Usuario> $usuarios
 */
?>
<head>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']); ?>
</head>
<div class="usuarios index content">
    <?= $this->Html->link(__('New Usuario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
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
    <h3><?= __('Usuarios') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombres') ?></th>
                    <th><?= $this->Paginator->sort('apellidos') ?></th>
                    <th><?= $this->Paginator->sort('correo') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th><?= $this->Paginator->sort('usuario') ?></th>
                    <th><?= $this->Paginator->sort('contrasena') ?></th>
                    <th><?= $this->Paginator->sort('rol') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $this->Number->format($usuario->id) ?></td>
                    <td><?= h($usuario->nombres) ?></td>
                    <td><?= h($usuario->apellidos) ?></td>
                    <td><?= h($usuario->correo) ?></td>
                    <td><?= h($usuario->telefono) ?></td>
                    <td><?= h($usuario->usuario) ?></td>
                    <td><?= h($usuario->contrasena) ?></td>
                    <td><?= h($usuario->rol) ?></td>
                    <td><?= h($usuario->created) ?></td>
                    <td><?= h($usuario->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usuario->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuario->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
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

