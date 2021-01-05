<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BloodTypeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BloodTypeTable Test Case
 */
class BloodTypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BloodTypeTable
     */
    protected $BloodType;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BloodType',
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
        $config = $this->getTableLocator()->exists('BloodType') ? [] : ['className' => BloodTypeTable::class];
        $this->BloodType = $this->getTableLocator()->get('BloodType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BloodType);

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
