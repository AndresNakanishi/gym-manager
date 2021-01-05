<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int|null $user_id
 * @property int $saled_by
 * @property int $updated_by
 * @property int $active
 * @property int $amount
 * @property int|null $discount
 * @property \Cake\I18n\FrozenTime|null $saled_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\User $user
 */
class Sale extends Entity
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
        'product_id' => true,
        'user_id' => true,
        'saled_by' => true,
        'updated_by' => true,
        'active' => true,
        'amount' => true,
        'discount' => true,
        'saled_at' => true,
        'updated_at' => true,
        'product' => true,
        'user' => true,
    ];
}
