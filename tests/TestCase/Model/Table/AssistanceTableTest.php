<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssistanceTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssistanceTable Test Case
 */
class AssistanceTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AssistanceTable
     */
    protected $Assistance;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Assistance',
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
        $config = $this->getTableLocator()->exists('Assistance') ? [] : ['className' => AssistanceTable::class];
        $this->Assistance = $this->getTableLocator()->get('Assistance', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Assistance);

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
