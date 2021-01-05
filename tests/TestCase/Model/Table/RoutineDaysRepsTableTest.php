<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoutineDaysRepsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoutineDaysRepsTable Test Case
 */
class RoutineDaysRepsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RoutineDaysRepsTable
     */
    protected $RoutineDaysReps;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RoutineDaysReps',
        'app.RoutineDays',
        'app.Reps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RoutineDaysReps') ? [] : ['className' => RoutineDaysRepsTable::class];
        $this->RoutineDaysReps = $this->getTableLocator()->get('RoutineDaysReps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RoutineDaysReps);

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
