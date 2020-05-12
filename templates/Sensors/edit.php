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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sensor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sensor->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sensors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sensors form content">
            <?= $this->Form->create($sensor) ?>
            <fieldset>
                <legend><?= __('Edit Sensor') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('plot_id', ['options' => $plots]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
