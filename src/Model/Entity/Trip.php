<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trip Entity
 *
 * @property int $id
 * @property string|null $client
 * @property string|null $phone
 * @property \Cake\I18n\FrozenDate|null $date
 * @property string|null $pick_up_time
 * @property string|null $appointment_time
 * @property string|null $pick_up_address
 * @property string|null $pick_up_city
 * @property string|null $drop_off_address
 * @property string|null $drop_off_city
 * @property string|null $comments
 * @property \Cake\I18n\FrozenTime|null $created
 * @property string|null $distance
 * @property int|null $user_id
 * @property int $company_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Company $company
 */
class Trip extends Entity
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
        'client' => true,
        'phone' => true,
        'date' => true,
        'pick_up_time' => true,
        'appointment_time' => true,
        'pick_up_address' => true,
        'pick_up_city' => true,
        'drop_off_address' => true,
        'drop_off_city' => true,
        'comments' => true,
        'created' => true,
        'distance' => true,
        'user_id' => true,
        'user' => true,
        'company' => true
    ];
}
