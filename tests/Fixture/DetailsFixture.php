<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetailsFixture
 */
class DetailsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'soil_moisture' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'humidity' => ['type' => 'float', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => 0, 'comment' => '', 'precision' => 2, 'autoIncrement' => null],
        'temperature' => ['type' => 'float', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => 0, 'comment' => '', 'precision' => 2, 'autoIncrement' => null],
        'sensor_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_details_sensors1_idx' => ['type' => 'index', 'columns' => ['sensor_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_details_sensors1' => ['type' => 'foreign', 'columns' => ['sensor_id'], 'references' => ['sensors', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'created' => '2020-05-04 15:06:39',
                'modified' => '2020-05-04 15:06:39',
                'soil_moisture' => 0,
                'sensor_id' => 1,
            ],
        ];
        parent::init();
    }
}
