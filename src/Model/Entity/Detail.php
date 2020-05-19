<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Detail Entity
 *
 * @property int $id
 * @property FrozenTime|null $created
 * @property FrozenTime|null $modified
 * @property int $soil_moisture
 * @property float $humidity
 * @property float $temperature
 * @property int $sensor_id
 *
 * @property Sensor $sensor
 */
class Detail extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'created' => true,
        'modified' => true,
        'soil_moisture' => true,
        'humidity' => true,
        'temperature' => true,
        'sensor_id' => true,
        'sensor' => true,
    ];
}
