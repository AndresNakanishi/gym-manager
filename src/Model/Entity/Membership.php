<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Membership Entity
 *
 * @property int $id
 * @property int $membership_type_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $valid_from
 * @property \Cake\I18n\FrozenTime $valid_to
 * @property string|null $note
 *
 * @property \App\Model\Entity\MembershipType $membership_type
 * @property \App\Model\Entity\User $user
 */
class Membership extends Entity
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
        'membership_type_id' => true,
        'user_id' => true,
        'valid_from' => true,
        'valid_to' => true,
        'note' => true,
        'membership_type' => true,
        'user' => true,
    ];
}
