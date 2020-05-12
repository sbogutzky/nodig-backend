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
            'soil_moisture' => 0,
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
    }
}
