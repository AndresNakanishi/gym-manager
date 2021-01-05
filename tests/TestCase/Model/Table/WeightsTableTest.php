<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WeightsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WeightsTable Test Case
 */
class WeightsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WeightsTable
     */
    protected $Weights;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Weights',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Weights') ? [] : ['className' => WeightsTable::class];
        $this->Weights = $this->getTableLocator()->get('Weights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Weights);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
