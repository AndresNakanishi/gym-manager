<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExerciceTypes Model
 *
 * @property \App\Model\Table\ExercicesTable&\Cake\ORM\Association\HasMany $Exercices
 *
 * @method \App\Model\Entity\ExerciceType newEmptyEntity()
 * @method \App\Model\Entity\ExerciceType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ExerciceType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExerciceType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExerciceType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ExerciceType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExerciceType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExerciceType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExerciceType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExerciceType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExerciceType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExerciceType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExerciceType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ExerciceTypesTable extends Table
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

        $this->setTable('exercice_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Exercices', [
            'foreignKey' => 'exercice_type_id',
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
