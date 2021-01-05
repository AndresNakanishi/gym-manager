<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RoutineDaysRep Entity
 *
 * @property int $id
 * @property int $routine_day_id
 * @property int $rep_id
 *
 * @property \App\Model\Entity\RoutineDay $routine_day
 * @property \App\Model\Entity\Rep $rep
 */
class RoutineDaysRep extends Entity
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
        'routine_day_id' => true,
        'rep_id' => true,
        'routine_day' => true,
        'rep' => true,
    ];
}
