<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\ProfilesTable&\Cake\ORM\Association\BelongsTo $Profiles
 * @property \App\Model\Table\RoutinesTable&\Cake\ORM\Association\BelongsTo $Routines
 * @property \App\Model\Table\CivilStatusTable&\Cake\ORM\Association\BelongsTo $CivilStatus
 * @property \App\Model\Table\BloodTypeTable&\Cake\ORM\Association\BelongsTo $BloodType
 * @property \App\Model\Table\SexTable&\Cake\ORM\Association\BelongsTo $Sex
 * @property \App\Model\Table\AssistanceTable&\Cake\ORM\Association\HasMany $Assistance
 * @property \App\Model\Table\MembershipsTable&\Cake\ORM\Association\HasMany $Memberships
 * @property \App\Model\Table\NotesTable&\Cake\ORM\Association\HasMany $Notes
 * @property \App\Model\Table\SalesTable&\Cake\ORM\Association\HasMany $Sales
 * @property \App\Model\Table\WeightsTable&\Cake\ORM\Association\HasMany $Weights
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Profiles', [
            'foreignKey' => 'profile_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Routines', [
            'foreignKey' => 'routine_id',
        ]);
        $this->belongsTo('CivilStatus', [
            'foreignKey' => 'civil_status_id',
        ]);
        $this->belongsTo('BloodType', [
            'foreignKey' => 'blood_type_id',
        ]);
        $this->belongsTo('Sex', [
            'foreignKey' => 'sex_id',
        ]);
        $this->hasMany('Assistance', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Memberships', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Notes', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Sales', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Weights', [
            'foreignKey' => 'user_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('name')
            ->maxLength('name', 60)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('surname')
            ->maxLength('surname', 60)
            ->requirePresence('surname', 'create')
            ->notEmptyString('surname');

        $validator
            ->scalar('dni')
            ->maxLength('dni', 11)
            ->requirePresence('dni', 'create')
            ->notEmptyString('dni')
            ->add('dni', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->dateTime('birthday')
            ->requirePresence('birthday', 'create')
            ->notEmptyDateTime('birthday');

        $validator
            ->integer('active')
            ->allowEmptyString('active');

        $validator
            ->scalar('mail')
            ->maxLength('mail', 150)
            ->allowEmptyString('mail');

        $validator
            ->scalar('password')
            ->maxLength('password', 200)
            ->allowEmptyString('password');

        $validator
            ->scalar('nationality')
            ->maxLength('nationality', 45)
            ->allowEmptyString('nationality');

        $validator
            ->scalar('occupation')
            ->maxLength('occupation', 100)
            ->allowEmptyString('occupation');

        $validator
            ->scalar('cellphone')
            ->maxLength('cellphone', 45)
            ->allowEmptyString('cellphone');

        $validator
            ->scalar('contact')
            ->maxLength('contact', 45)
            ->allowEmptyString('contact');

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->allowEmptyString('address');

        $validator
            ->scalar('avatar')
            ->maxLength('avatar', 200)
            ->allowEmptyString('avatar', null, 'create');

        $validator
            ->boolean('smoker')
            ->allowEmptyString('smoker');

        $validator
            ->integer('cigarretes_per_day')
            ->allowEmptyString('cigarretes_per_day');

        $validator
            ->boolean('diabetic')
            ->allowEmptyString('diabetic');

        $validator
            ->scalar('note')
            ->maxLength('note', 4294967295)
            ->allowEmptyString('note');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        $validator
            ->nonNegativeInteger('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->nonNegativeInteger('updated_by')
            ->allowEmptyString('updated_by');

        $validator
            ->nonNegativeInteger('recommended_by')
            ->allowEmptyString('recommended_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->isUnique(['dni']), ['errorField' => 'dni']);
        $rules->add($rules->existsIn(['profile_id'], 'Profiles'), ['errorField' => 'profile_id']);
        $rules->add($rules->existsIn(['routine_id'], 'Routines'), ['errorField' => 'routine_id']);
        $rules->add($rules->existsIn(['civil_status_id'], 'CivilStatus'), ['errorField' => 'civil_status_id']);
        $rules->add($rules->existsIn(['blood_type_id'], 'BloodType'), ['errorField' => 'blood_type_id']);
        $rules->add($rules->existsIn(['sex_id'], 'Sex'), ['errorField' => 'sex_id']);

        return $rules;
    }
}
