<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sensor $sensor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sensor'), ['action' => 'edit', $sensor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sensor'), ['action' => 'delete', $sensor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sensor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sensors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sensor'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sensors view content">
            <h3><?= h($sensor->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($sensor->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Plot') ?></th>
                    <td><?= $sensor->has('plot') ? $this->Html->link($sensor->plot->name, ['controller' => 'Plots', 'action' => 'view', $sensor->plot->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sensor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sensor->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($sensor->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Details') ?></h4>
                <?php if (!empty($sensor->details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Soil Moisture') ?></th>
                            <th><?= __('Sensor Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sensor->details as $details) : ?>
                        <tr>
                            <td><?= h($details->id) ?></td>
                            <td><?= h($details->created) ?></td>
                            <td><?= h($details->modified) ?></td>
                            <td><?= h($details->soil_moisture) ?></td>
                            <td><?= h($details->sensor_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Details', 'action' => 'view', $details->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Details', 'action' => 'edit', $details->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Details', 'action' => 'delete', $details->id], ['confirm' => __('Are you sure you want to delete # {0}?', $details->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
