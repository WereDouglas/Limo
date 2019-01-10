<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Car Entity
 *
 * @property int $id
 * @property string $plate
 * @property string|null $registration
 * @property \Cake\I18n\FrozenDate|null $expiry
 * @property int|null $user_id
 * @property string|null $photo
 * @property string|null $photo_dir
 * @property string|null $photo_size
 * @property string|null $photo_type
 *
 * @property \App\Model\Entity\User $user
 */
class Car extends Entity
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
        'plate' => true,
        'registration' => true,
        'expiry' => true,
        'user_id' => true,
        'photo' => true,
        'photo_dir' => true,
        'photo_size' => true,
        'photo_type' => true,
        'user' => true
    ];
    protected function _getFullUrl()
    {
        return '/'.$this->_properties['photo_dir'] . '' . $this->_properties['photo'];
    }
}
