<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher; 
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property int $profile_id
 * @property int|null $routine_id
 * @property string $name
 * @property string $surname
 * @property \Cake\I18n\FrozenDate $birthday
 * @property string $dni
 * @property int|null $active
 * @property string|null $mail
 * @property string|null $password
 * @property string|null $nationality
 * @property string|null $occupation
 * @property string|null $cellphone
 * @property string|null $contact
 * @property string|null $address
 * @property string|null $avatar
 * @property bool|null $smoker
 * @property int|null $cigarretes_per_day
 * @property bool|null $diabetic
 * @property int|null $civil_status_id
 * @property int|null $blood_type_id
 * @property int|null $sex_id
 * @property string|null $note
 * @property \Cake\I18n\FrozenTime|null $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $recommended_by
 *
 * @property \App\Model\Entity\Profile $profile
 * @property \App\Model\Entity\Routine $routine
 * @property \App\Model\Entity\CivilStatus $civil_status
 * @property \App\Model\Entity\BloodType $blood_type
 * @property \App\Model\Entity\Sex $sex
 * @property \App\Model\Entity\Assistance[] $assistance
 * @property \App\Model\Entity\Membership[] $memberships
 * @property \App\Model\Entity\Note[] $notes
 * @property \App\Model\Entity\Sale[] $sales
 * @property \App\Model\Entity\Weight[] $weights
 */
class User extends Entity
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
        'profile_id' => true,
        'routine_id' => true,
        'name' => true,
        'surname' => true,
        'birthday' => true,
        'dni' => true,
        'active' => true,
        'mail' => true,
        'password' => true,
        'nationality' => true,
        'occupation' => true,
        'cellphone' => true,
        'contact' => true,
        'address' => true,
        'avatar' => true,
        'smoker' => true,
        'cigarretes_per_day' => true,
        'diabetic' => true,
        'civil_status_id' => true,
        'blood_type_id' => true,
        'sex_id' => true,
        'note' => true,
        'created_at' => true,
        'updated_at' => true,
        'created_by' => true,
        'updated_by' => true,
        'recommended_by' => true,
        'profile' => true,
        'routine' => true,
        'civil_status' => true,
        'blood_type' => true,
        'sex' => true,
        'assistance' => true,
        'memberships' => true,
        'notes' => true,
        'sales' => true,
        'weights' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}
