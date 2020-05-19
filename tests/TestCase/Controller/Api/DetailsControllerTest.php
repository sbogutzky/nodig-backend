<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Throwable;

/**
 * App\Controller\Api\DetailsController Test Case
 *
 * @uses \App\Controller\Api\DetailsController
 */
class DetailsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Details',
        'app.Sensors',
    ];

    public function setUp(): void
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json', 'Content-Type' => 'application/json']
        ]);
        parent::setUp();
    }

    /**
     * Test add method
     *
     * @return void
     * @throws Throwable
     */
    public function testAdd(): void
    {
        // Arrange
        $data = [
            'soil_moisture' => 1,
            'sensor_id' => 1
        ];
        $jsonData = json_encode($data);

        // Act
        $this->post('api/details/add', $jsonData);

        // Assert
        $this->assertResponseSuccess();
        $table = TableRegistry::getTableLocator()->get('Details');
        $query = $table->find()->where(['sensor_id' => $data['sensor_id']]);
        $this->assertEquals(2, $query->count());
        $lastDetail = $query->last();
        $this->assertEquals(1, $lastDetail->soil_moisture);
        $this->assertEquals(0, $lastDetail->humidity);
        $this->assertEquals(0, $lastDetail->temperature);
    }

    /**
     * Test add method
     *
     * @return void
     * @throws Throwable
     */
    public function testAddOptional(): void
    {
        // Arrange
        $data = [
            'soil_moisture' => 1,
            'humidity' => 2.2,
            'temperature' => 3.3,
            'sensor_id' => 1
        ];
        $jsonData = json_encode($data);

        // Act
        $this->post('api/details/add', $jsonData);

        // Assert
        $this->assertResponseSuccess();
        $table = TableRegistry::getTableLocator()->get('Details');
        $query = $table->find()->where(['sensor_id' => $data['sensor_id']]);
        $this->assertEquals(2, $query->count());
        $lastDetail = $query->last();
        $this->assertEquals(1, $lastDetail->soil_moisture);
        $this->assertEquals(2.2, $lastDetail->humidity);
        $this->assertEquals(3.3, $lastDetail->temperature);
    }
}
