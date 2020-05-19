<?php
/**
 * @var AppView $this
 * @var Detail $detail
 * @var Sensor $sensors
 */

use App\Model\Entity\Detail;
use App\Model\Entity\Sensor;
use App\View\AppView;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="details form content">
            <?= $this->Form->create($detail) ?>
            <fieldset>
                <legend><?= __('Add Detail') ?></legend>
                <?php
                    echo $this->Form->control('soil_moisture');
                    echo $this->Form->control('humidity');
                    echo $this->Form->control('temperature');
                    echo $this->Form->control('sensor_id', ['options' => $sensors]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
