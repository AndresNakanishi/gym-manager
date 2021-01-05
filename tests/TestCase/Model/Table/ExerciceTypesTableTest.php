<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExerciceTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExerciceTypesTable Test Case
 */
class ExerciceTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExerciceTypesTable
     */
    protected $ExerciceTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ExerciceTypes',
        'app.Exercices',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ExerciceTypes') ? [] : ['className' => ExerciceTypesTable::class];
        $this->ExerciceTypes = $this->getTableLocator()->get('ExerciceTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ExerciceTypes);

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
