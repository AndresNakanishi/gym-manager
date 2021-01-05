<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Routine Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\RoutineDay[] $routine_days
 */
class Routine extends Entity
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
        'name' => true,
        'description' => true,
        'created_by' => true,
        'created_at' => true,
        'updated_at' => true,
        'users' => true,
        'routine_days' => true,
    ];
}
