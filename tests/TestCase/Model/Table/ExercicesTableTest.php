<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExercicesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExercicesTable Test Case
 */
class ExercicesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExercicesTable
     */
    protected $Exercices;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Exercices',
        'app.ExerciceTypes',
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
        $config = $this->getTableLocator()->exists('Exercices') ? [] : ['className' => ExercicesTable::class];
        $this->Exercices = $this->getTableLocator()->get('Exercices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Exercices);

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
