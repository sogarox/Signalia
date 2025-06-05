<?= $this->Form->postButton('Cerrar sesión', ['controller' => 'Usuarios', 'action' => 'logout'], ['class' => 'logout-button']) ?>
<!--<?= $this->Form->postButton('Volver', ['controller' => 'Estudiante', 'action' => 'dashboard'], ['class' => 'logout-button']) ?> -->
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso $curso
 */
?>
<?= $this->Html->css('dashboard') ?>
<div class="dashboard-container">
    <?php foreach ($cursos as $curso): ?>
        <div class="cursos-view-content">
            <h3><?= h($curso->titulo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Titulo') ?></th>
                    <td><?= h($curso->titulo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Categoria Discapacidad') ?></th>
                    <td><?= h($curso->categoria_discapacidad) ?></td>
                </tr>
                <!-- ...otros campos... -->
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph($curso->descripcion); ?>
                </blockquote>
            </div>
        </div>
    <?php endforeach; ?>
</div>