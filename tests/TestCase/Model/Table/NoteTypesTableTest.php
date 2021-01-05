<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NoteTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NoteTypesTable Test Case
 */
class NoteTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NoteTypesTable
     */
    protected $NoteTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.NoteTypes',
        'app.Notes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NoteTypes') ? [] : ['className' => NoteTypesTable::class];
        $this->NoteTypes = $this->getTableLocator()->get('NoteTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->NoteTypes);

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
