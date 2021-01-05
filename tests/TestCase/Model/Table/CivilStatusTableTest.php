<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CivilStatusTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CivilStatusTable Test Case
 */
class CivilStatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CivilStatusTable
     */
    protected $CivilStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CivilStatus',
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
        $config = $this->getTableLocator()->exists('CivilStatus') ? [] : ['className' => CivilStatusTable::class];
        $this->CivilStatus = $this->getTableLocator()->get('CivilStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CivilStatus);

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
