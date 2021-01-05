<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RoutinesRoutineDaysFixture
 */
class RoutinesRoutineDaysFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'routine_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'routine_day_id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_rrd_routine_idx' => ['type' => 'index', 'columns' => ['routine_id'], 'length' => []],
            'fk_rrd_routine_day_idx' => ['type' => 'index', 'columns' => ['routine_day_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_rrd_routine_day' => ['type' => 'foreign', 'columns' => ['routine_day_id'], 'references' => ['routine_days', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_rrd_routine' => ['type' => 'foreign', 'columns' => ['routine_id'], 'references' => ['routines', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'routine_id' => 1,
                'routine_day_id' => 1,
            ],
        ];
        parent::init();
    }
}
