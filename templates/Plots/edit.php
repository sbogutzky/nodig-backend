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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $plot->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $plot->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Plots'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="plots form content">
            <?= $this->Form->create($plot) ?>
            <fieldset>
                <legend><?= __('Edit Plot') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
