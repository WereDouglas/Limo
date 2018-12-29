<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarsTable Test Case
 */
class CarsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CarsTable
     */
    public $Cars;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cars',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cars') ? [] : ['className' => CarsTable::class];
        $this->Cars = TableRegistry::getTableLocator()->get('Cars', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cars);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
