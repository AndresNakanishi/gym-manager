<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SexTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SexTable Test Case
 */
class SexTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SexTable
     */
    protected $Sex;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Sex',
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
        $config = $this->getTableLocator()->exists('Sex') ? [] : ['className' => SexTable::class];
        $this->Sex = $this->getTableLocator()->get('Sex', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Sex);

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
