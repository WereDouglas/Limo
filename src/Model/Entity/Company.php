<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $photo
 * @property string|null $address
 * @property string|null $contact
 * @property string|null $photo_dir
 * @property string|null $photo_size
 * @property string|null $photo_type
 * @property string|null $email
 *
 * @property \App\Model\Entity\Trip[] $trips
 * @property \App\Model\Entity\User[] $users
 */
class Company extends Entity
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
        'photo' => true,
        'address' => true,
        'contact' => true,
        'photo_dir' => true,
        'photo_size' => true,
        'photo_type' => true,
        'email' => true,
        'trips' => true,
        'users' => true
    ];
}
