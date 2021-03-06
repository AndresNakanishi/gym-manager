<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BloodType Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\BloodType newEmptyEntity()
 * @method \App\Model\Entity\BloodType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BloodType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BloodType get($primaryKey, $options = [])
 * @method \App\Model\Entity\BloodType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BloodType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BloodType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BloodType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BloodType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BloodType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BloodType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BloodType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BloodType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BloodTypeTable extends Table
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

        $this->setTable('blood_type');
        $this->setDisplayField('description');
        $this->setPrimaryKey('id');

        $this->hasMany('Users', [
            'foreignKey' => 'blood_type_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('description')
            ->maxLength('description', 3)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}
