<?php
/**
 * @var AppView $this
 * @var Detail[]|CollectionInterface $details
 */

use App\Model\Entity\Detail;
use App\View\AppView;
use Cake\Collection\CollectionInterface;

?>
<div class="details index content">
    <?= $this->Html->link(__('New Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('soil_moisture') ?></th>
                    <th><?= $this->Paginator->sort('humidity') ?></th>
                    <th><?= $this->Paginator->sort('temperature') ?></th>
                    <th><?= $this->Paginator->sort('sensor_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details as $detail): ?>
                <tr>
                    <td><?= $this->Number->format($detail->id) ?></td>
                    <td><?= h($this->Time->format($detail->created, null, null, 'Europe/Berlin')) ?></td>
                    <td><?= h($this->Time->format($detail->modified, null, null, 'Europe/Berlin')) ?></td>
                    <td><?= $this->Number->format($detail->soil_moisture) ?></td>
                    <td><?= $this->Number->format($detail->humidity) ?></td>
                    <td><?= $this->Number->format($detail->temperature) ?></td>
                    <td><?= $detail->has('sensor') ? $this->Html->link($detail->sensor->name, ['controller' => 'Sensors', 'action' => 'view', $detail->sensor->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detail->id)]) ?>
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
