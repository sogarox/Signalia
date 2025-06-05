<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Modulo> $modulos
 */
?>
<?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']); ?>
<div class="modulos index content">
    <?= $this->Html->link(__('New Modulo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Modulos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('id_curso') ?></th>
                    <th><?= $this->Paginator->sort('titulo') ?></th>
                    <th><?= $this->Paginator->sort('orden') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modulos as $modulo): ?>
                <tr>
                    <td><?= $this->Number->format($modulo->id) ?></td>
                    <td><?= $this->Number->format($modulo->id_curso) ?></td>
                    <td><?= h($modulo->titulo) ?></td>
                    <td><?= $this->Number->format($modulo->orden) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $modulo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modulo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $modulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modulo->id)]) ?>
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
