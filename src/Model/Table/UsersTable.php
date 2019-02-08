<?php

namespace App\Model\Table;

use Cake\Auth\DigestAuthenticate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;

/**
 * Users Model
 *
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\CarsTable|\Cake\ORM\Association\HasMany $Cars
 * @property \App\Model\Table\DriversTable|\Cake\ORM\Association\HasMany $Drivers
 * @property \App\Model\Table\TripsTable|\Cake\ORM\Association\HasMany $Trips
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsToMany $Roles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);


        $this->setTable('users');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Cars', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasOne('Drivers', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->hasMany('Trips', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->belongsToMany('Roles', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'role_id',
            'joinTable' => 'roles_users'
        ]);
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'photo' => [
                'fields' => [
                    // if these fields or their defaults exist
                    // the values will be set.
                    'dir' => 'photo_dir', // defaults to `dir`
                    'size' => 'photo_size', // defaults to `size`
                    'type' => 'photo_type', // defaults to `type`
                ],
            ]
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 45)
            ->allowEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 45)
            ->allowEmpty('last_name');

        $validator
            ->scalar('contact')
            ->maxLength('contact', 25)
            ->allowEmpty('contact');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 60)
            ->allowEmpty('password');

        $validator
            ->scalar('type')
            ->maxLength('type', 20)
            ->allowEmpty('type');

        $validator
            ->scalar('api_key_plain')
            ->maxLength('api_key_plain', 60)
            ->allowEmpty('api_key_plain');

        $validator
            ->scalar('api_key')
            ->maxLength('api_key', 60)
            ->allowEmpty('api_key');

        $validator
            ->scalar('digest_hash')
            ->maxLength('digest_hash', 100)
            ->allowEmpty('digest_hash');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }

    public function beforeSave(Event $event)
    {
        $entity = $event->getData('entity');

        $hasher = new DefaultPasswordHasher();
        // Generate an API 'token'
        $entity->api_key_plain = Security::hash(Security::randomBytes(32), 'sha256', false);

        // Bcrypt the token so BasicAuthenticate can check
        // it during login.
        $entity->api_key = $hasher->hash($entity->api_key_plain);

        $entity->digest_hash = DigestAuthenticate::password(
            $entity->username,
            $entity->plain_password,
            env('SERVER_NAME')
        );
        return true;
    }

    public function findPermissions(Query $query, $options = [])
    {

        $id = ($options['id']) ? $options['id'] : null;
        $permissions = Array();
        $query->find('all')->contain(['Roles'])
            ->where(['Users.id' => $id]);
        $results = $query->all();
        foreach ($results as $u) {
            $roles = $u->roles;
            foreach ($roles as $r) {
                $permsQuery = TableRegistry::getTableLocator()->get('Roles')->find()->contain(['Permissions'])
                    ->where(['id' => $r->id]);
                $allowing = $permsQuery->all();
                foreach ($allowing as $pm) {
                    $list_of_allowed = $pm->permissions;
                    foreach ($list_of_allowed as $l) {
                        array_push($permissions, $l->name);
                    }
                }

            }

        }
        return $permissions;

    }

    public function findRoles(Query $query, $options = [])
    {
        $id = ($options['id']) ? $options['id'] : null;
        $information = Array();
        $query->find('all')->contain(['Roles'])
            ->where(['Users.id' => $id]);
        $results = $query->all();

        foreach ($results as $u) {
            $roles = $u->roles;
            foreach ($roles as $r) {
                array_push($information, $r->name);
            }
        }

        return $information;
    }

    public function findLogin(Query $query, array $options)
    {
        return $query->select(['id', 'contact', 'first_name', 'digest_hash', 'photo']);

    }

}
