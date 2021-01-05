<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exercices Model
 *
 * @property \App\Model\Table\ExerciceTypesTable&\Cake\ORM\Association\BelongsTo $ExerciceTypes
 * @property \App\Model\Table\RepsTable&\Cake\ORM\Association\HasMany $Reps
 *
 * @method \App\Model\Entity\Exercice newEmptyEntity()
 * @method \App\Model\Entity\Exercice newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Exercice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exercice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exercice findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Exercice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exercice[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exercice|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exercice saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exercice[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Exercice[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Exercice[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Exercice[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ExercicesTable extends Table
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

        $this->setTable('exercices');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ExerciceTypes', [
            'foreignKey' => 'exercice_type_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Reps', [
            'foreignKey' => 'exercice_id',
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
            ->maxLength('name', 60)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('image')
            ->maxLength('image', 200)
            ->allowEmptyFile('image');

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
        $rules->add($rules->existsIn(['exercice_type_id'], 'ExerciceTypes'), ['errorField' => 'exercice_type_id']);

        return $rules;
    }
}
