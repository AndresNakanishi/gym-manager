<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoutinesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoutinesTable Test Case
 */
class RoutinesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RoutinesTable
     */
    protected $Routines;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Routines',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('Routines') ? [] : ['className' => RoutinesTable::class];
        $this->Routines = $this->getTableLocator()->get('Routines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Routines);

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
