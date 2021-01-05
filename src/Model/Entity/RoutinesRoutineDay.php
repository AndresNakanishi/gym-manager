<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RoutinesRoutineDay Entity
 *
 * @property int $id
 * @property int $routine_id
 * @property int $routine_day_id
 *
 * @property \App\Model\Entity\Routine $routine
 * @property \App\Model\Entity\RoutineDay $routine_day
 */
class RoutinesRoutineDay extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'routine_id' => true,
        'routine_day_id' => true,
        'routine' => true,
        'routine_day' => true,
    ];
}
