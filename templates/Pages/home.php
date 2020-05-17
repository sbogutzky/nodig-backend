<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Plots'), ['controller' => 'plots'], ['action' => 'index'], ['class' => 'side-nav-item']) ?> <br>
            <?= $this->Html->link(__('List Sensors'), ['controller' => 'sensors'], ['action' => 'index'], ['class' => 'side-nav-item']) ?> <br>
            <?= $this->Html->link(__('List Details'), ['controller' => 'details'], ['action' => 'index'], ['class' => 'side-nav-item']) ?> <br>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="view content">
            <h3><?= __("Home") ?></h3>
        </div>
    </div>
</div>
