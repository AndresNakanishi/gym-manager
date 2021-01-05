<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Profile Entity
 *
 * @property int $id
 * @property int $level_id
 * @property string $name
 * @property int $discount
 *
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\User[] $users
 */
class Profile extends Entity
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
        'level_id' => true,
        'name' => true,
        'discount' => true,
        'level' => true,
        'users' => true,
    ];
}
