<?php
/**
 * @var AppView $this
 * @var Sensor $sensor
 */

use App\Model\Entity\Sensor;
use App\View\AppView;

require_once(ROOT . DS . 'src' . DS . 'fusioncharts.php');
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
                    <td><?= h($this->Time->format($sensor->created, null, null, 'Europe/Berlin')) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($this->Time->format($sensor->modified, null, null, 'Europe/Berlin')) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Details') ?></h4>
                <?php if (!empty($sensor->details)) : ?>
                    <?= $this->Html->script('fusioncharts/fusioncharts.js') ?>
                    <?= $this->Html->script('fusioncharts/themes/fusioncharts.theme.gammel.js') ?>

                    <?php

                    $data = [];
                    foreach ($sensor->details as $detail) {
                        array_push($data, array($this->Time->format($detail["created"], "yyyy-MM-dd HH:mm:ss", null, 'Europe/Berlin'), $detail["soil_moisture"])
                        );
                    }
                    $data = (json_encode($data));

                    $schema = '[{
                                  "name": "Time",
                                  "type": "date",
                                  "format": "%Y-%m-%d %H:%M:%S"
                                }, {
                                  "name": "' . __("Soil moisture") . '",
                                  "type": "number"
                                }]';


                    $fusionTable = new FusionTable($schema, $data);
                    $timeSeries = new TimeSeries($fusionTable);

                    $timeSeries->AddAttribute("chart", "{
                                            paletteColors: '#d33c43',
											showLegend: 0,
											theme: 'gammel'
										  }");

                    $timeSeries->AddAttribute("caption", "{
											text: '" . __("Soil moisture") . "'}");

                    //$timeSeries->AddAttribute('xaxis', '{"outputtimeformat":{"month":"","day":"%d.%m","hour":"%H:%M:%S"}}');

                    // chart object
                    $Chart = new FusionCharts("timeseries", "chart-1", "100%", "600", "chart-container", "json", $timeSeries);

                    // Render the chart
                    $Chart->render();

                    ?>
                    <div id="chart-container"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
