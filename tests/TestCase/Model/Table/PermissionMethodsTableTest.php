<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissionMethodsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissionMethodsTable Test Case
 */
class PermissionMethodsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissionMethodsTable
     */
    protected $PermissionMethods;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PermissionMethods',
        'app.Permissions',
        'app.Methods',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PermissionMethods') ? [] : ['className' => PermissionMethodsTable::class];
        $this->PermissionMethods = $this->getTableLocator()->get('PermissionMethods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PermissionMethods);

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
