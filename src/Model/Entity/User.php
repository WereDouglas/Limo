<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;


use Cake\Utility\Text;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\Utility\Security;


/**
 * User Entity
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $contact
 * @property string|null $email
 * @property string|null $password
 * @property string|null $type
 * @property int|null $company_id
 * @property string|null $api_key_plain
 * @property string|null $api_key
 * @property string|null $digest_hash
 * @property string|null $photo
 * @property string|null $photo_dir
 * @property string|null $photo_size
 * @property string|null $photo_type
 * @property string|null $activated
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Car[] $cars
 * @property \App\Model\Entity\Driver[] $drivers
 * @property \App\Model\Entity\Trip[] $trips
 * @property \App\Model\Entity\Role[] $roles
 */
class User extends Entity
{
   // use AuthorizationTrait;

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
        'id' => true,
        'first_name' => true,
        'last_name' => true,
        'contact' => true,
        'email' => true,
        'password' => true,
        'type' => true,
        'company_id' => true,
        'api_key_plain' => true,
        'api_key' => true,
        'digest_hash' => true,
        'photo' => true,
        'photo_dir' => true,
        'photo_size' => true,
        'photo_type' => true,
        'company' => true,
        'cars' => true,
        'drivers' => true,
        'trips' => true,
        'roles' => true,
        'activated' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
    protected function _getFullName()
    {
        return $this->_properties['first_name'] . '  ' .
            $this->_properties['last_name'];
    }
    protected function _getUserType()
    {
        return $this->_properties['type'] ;
    }
    protected function _getFullUrl()
    {
        return '/'.$this->_properties['photo_dir'] . '' . $this->_properties['photo'];
    }
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('contact', 'A contact is required')
            ->notEmpty('password', 'A password is required');
    }


}
