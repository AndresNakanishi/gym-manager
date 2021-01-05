<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RepsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RepsTable Test Case
 */
class RepsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RepsTable
     */
    protected $Reps;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Reps',
        'app.Exercices',
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
        $config = $this->getTableLocator()->exists('Reps') ? [] : ['className' => RepsTable::class];
        $this->Reps = $this->getTableLocator()->get('Reps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Reps);

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
