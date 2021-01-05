<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoutineDaysTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoutineDaysTable Test Case
 */
class RoutineDaysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RoutineDaysTable
     */
    protected $RoutineDays;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RoutineDays',
        'app.Reps',
        'app.Routines',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RoutineDays') ? [] : ['className' => RoutineDaysTable::class];
        $this->RoutineDays = $this->getTableLocator()->get('RoutineDays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RoutineDays);

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
}
