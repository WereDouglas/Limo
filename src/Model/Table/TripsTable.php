<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trips Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\Trip get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trip newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Trip[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trip|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trip|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trip[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trip findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TripsTable extends Table
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

        $this->setTable('trips');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('client')
            ->maxLength('client', 45)
            ->allowEmptyString('client');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 45)
            ->allowEmptyString('phone');

        $validator
            ->date('date')
            ->allowEmptyDate('date');

        $validator
            ->scalar('pick_up_time')
            ->maxLength('pick_up_time', 10)
            ->allowEmptyString('pick_up_time');

        $validator
            ->scalar('appointment_time')
            ->maxLength('appointment_time', 10)
            ->allowEmptyString('appointment_time');

        $validator
            ->scalar('pick_up_address')
            ->maxLength('pick_up_address', 100)
            ->allowEmptyString('pick_up_address');

        $validator
            ->scalar('pick_up_city')
            ->maxLength('pick_up_city', 100)
            ->allowEmptyString('pick_up_city');

        $validator
            ->scalar('drop_off_address')
            ->maxLength('drop_off_address', 100)
            ->allowEmptyString('drop_off_address', 'create');

        $validator
            ->scalar('drop_off_city')
            ->maxLength('drop_off_city', 45)
            ->allowEmptyString('drop_off_city');

        $validator
            ->scalar('comments')
            ->allowEmptyString('comments');

        $validator
            ->scalar('distance')
            ->allowEmptyString('distance');

        $validator
            ->scalar('complete')
            ->allowEmptyString('complete');

        $validator
            ->decimal('start_lat')
            ->allowEmptyString('start_lat');

        $validator
            ->decimal('start_long')
            ->allowEmptyString('start_long');

        $validator
            ->decimal('drop_lat')
            ->allowEmptyString('drop_lat');

        $validator
            ->decimal('drop_long')
            ->allowEmptyString('drop_long');

        $validator
            ->scalar('miles')
            ->maxLength('miles', 10)
            ->allowEmptyString('miles');

        $validator
            ->scalar('vehicle_type')
            ->maxLength('vehicle_type', 45)
            ->allowEmptyString('vehicle_type');

        $validator
            ->integer('escort')
            ->allowEmptyString('escort');

        $validator
            ->scalar('trip_num')
            ->maxLength('trip_num', 45)
            ->allowEmptyString('trip_num');

        $validator
            ->scalar('shared_group')
            ->maxLength('shared_group', 45)
            ->allowEmptyString('shared_group');

        $validator
            ->scalar('outbound')
            ->maxLength('outbound', 20)
            ->allowEmptyString('outbound');

        $validator
            ->scalar('one_way')
            ->allowEmptyString('one_way');

        $validator
            ->scalar('priority')
            ->allowEmptyString('priority');

        $validator
            ->scalar('re_route')
            ->requirePresence('re_route', 'create')
            ->allowEmptyString('re_route', false);

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
