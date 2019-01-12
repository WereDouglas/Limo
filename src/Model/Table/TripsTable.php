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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('client')
            ->maxLength('client', 45)
            ->allowEmpty('client');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 45)
            ->allowEmpty('phone');

        $validator
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->scalar('pick_up_time')
            ->maxLength('pick_up_time', 10)
            ->allowEmpty('pick_up_time');

        $validator
            ->scalar('appointment_time')
            ->maxLength('appointment_time', 10)
            ->allowEmpty('appointment_time');

        $validator
            ->scalar('pick_up_address')
            ->maxLength('pick_up_address', 45)
            ->allowEmpty('pick_up_address');

        $validator
            ->scalar('pick_up_city')
            ->maxLength('pick_up_city', 45)
            ->allowEmpty('pick_up_city');

        $validator
            ->scalar('drop_off_address')
            ->maxLength('drop_off_address', 45)
            ->allowEmpty('drop_off_address');

        $validator
            ->scalar('drop_off_city')
            ->maxLength('drop_off_city', 45)
            ->allowEmpty('drop_off_city');

        $validator
            ->scalar('comments')
            ->allowEmpty('comments');

        $validator
            ->scalar('distance')
            ->allowEmpty('distance');

        $validator
            ->scalar('complete')
            ->allowEmpty('complete');

        $validator
            ->decimal('start_lat')
            ->allowEmpty('start_lat');

        $validator
            ->decimal('start_long')
            ->allowEmpty('start_long');

        $validator
            ->decimal('drop_lat')
            ->allowEmpty('drop_lat');

        $validator
            ->decimal('drop_long')
            ->allowEmpty('drop_long');

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
