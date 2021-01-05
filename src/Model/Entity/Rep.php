<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rep Entity
 *
 * @property int $id
 * @property int $exercice_id
 * @property int $series
 * @property int $repetition
 * @property int $order
 *
 * @property \App\Model\Entity\Exercice $exercice
 * @property \App\Model\Entity\RoutineDay[] $routine_days
 */
class Rep extends Entity
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
        'exercice_id' => true,
        'series' => true,
        'repetition' => true,
        'order' => true,
        'exercice' => true,
        'routine_days' => true,
    ];
}
