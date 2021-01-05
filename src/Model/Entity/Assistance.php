<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Assistance Entity
 *
 * @property int $id
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate|null $day
 * @property \Cake\I18n\FrozenTime|null $checkin
 * @property \Cake\I18n\FrozenTime|null $checkout
 *
 * @property \App\Model\Entity\User $user
 */
class Assistance extends Entity
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
        'user_id' => true,
        'day' => true,
        'checkin' => true,
        'checkout' => true,
        'user' => true,
    ];
}
