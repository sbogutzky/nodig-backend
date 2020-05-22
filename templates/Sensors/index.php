<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sensor[]|\Cake\Collection\CollectionInterface $sensors
 */
?>
<div class="sensors index content">
    <?= $this->Html->link(__('New Sensor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sensors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('plot_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sensors as $sensor): ?>
                <tr>
                    <td><?= $this->Number->format($sensor->id) ?></td>
                    <td><?= h($this->Time->format($sensor->created, null, null, 'Europe/Berlin')) ?></td>
                    <td><?= h($this->Time->format($sensor->modified, null, null, 'Europe/Berlin')) ?></td>
                    <td><?= h($sensor->name) ?></td>
                    <td><?= $sensor->has('plot') ? $this->Html->link($sensor->plot->name, ['controller' => 'Plots', 'action' => 'view', $sensor->plot->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sensor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sensor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sensor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sensor->id)]) ?>
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
