<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plot $plot
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Plot'), ['action' => 'edit', $plot->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Plot'), ['action' => 'delete', $plot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plot->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Plots'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Plot'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="plots view content">
            <h3><?= h($plot->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($plot->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($plot->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($this->Time->format($plot->created, null, null, 'Europe/Berlin')) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($this->Time->format($plot->modified, null, null, 'Europe/Berlin')) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Sensors') ?></h4>
                <?php if (!empty($plot->sensors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Plot Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($plot->sensors as $sensors) : ?>
                        <tr>
                            <td><?= h($sensors->id) ?></td>
                            <td><?= h($sensors->created) ?></td>
                            <td><?= h($sensors->modified) ?></td>
                            <td><?= h($sensors->name) ?></td>
                            <td><?= h($sensors->plot_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Sensors', 'action' => 'view', $sensors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Sensors', 'action' => 'edit', $sensors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sensors', 'action' => 'delete', $sensors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sensors->id)]) ?>
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
