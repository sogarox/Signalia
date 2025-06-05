<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Actividad> $actividades
 */
?>
<div class="actividades index content">
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']); ?>
    <?= $this->Html->link(__('New Actividad'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actividades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('id_modulo') ?></th>
                    <th><?= $this->Paginator->sort('titulo') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('respuesta_correcta') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actividades as $actividad): ?>
                <tr>
                    <td><?= $this->Number->format($actividad->id) ?></td>
                    <td><?= $this->Number->format($actividad->id_modulo) ?></td>
                    <td><?= h($actividad->titulo) ?></td>
                    <td><?= h($actividad->tipo) ?></td>
                    <td><?= h($actividad->respuesta_correcta) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $actividad->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actividad->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actividad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividad->id)]) ?>
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
