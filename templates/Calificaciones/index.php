<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Calificacione> $calificaciones
 */
?>
<?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

<div class="calificaciones index content">
    <?= $this->Html->link(__('Nueva calificación'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Calificaciones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('id_usuario') ?></th>
                    <th><?= $this->Paginator->sort('id_actividad') ?></th>
                    <th><?= $this->Paginator->sort('calificacion') ?></th>
                    <th><?= $this->Paginator->sort('fecha_realizacion') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($calificaciones as $calificacione): ?>
                <tr>
                    <td><?= $this->Number->format($calificacione->id) ?></td>
                    <td><?= $this->Number->format($calificacione->id_usuario) ?></td>
                    <td><?= $this->Number->format($calificacione->id_actividad) ?></td>
                    <td><?= $this->Number->format($calificacione->calificacion) ?></td>
                    <td><?= h($calificacione->fecha_realizacion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $calificacione->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $calificacione->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $calificacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calificacione->id)]) ?>
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
