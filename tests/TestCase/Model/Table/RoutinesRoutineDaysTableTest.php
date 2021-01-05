<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoutinesRoutineDaysTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoutinesRoutineDaysTable Test Case
 */
class RoutinesRoutineDaysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RoutinesRoutineDaysTable
     */
    protected $RoutinesRoutineDays;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RoutinesRoutineDays',
        'app.Routines',
        'app.RoutineDays',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RoutinesRoutineDays') ? [] : ['className' => RoutinesRoutineDaysTable::class];
        $this->RoutinesRoutineDays = $this->getTableLocator()->get('RoutinesRoutineDays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RoutinesRoutineDays);

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
