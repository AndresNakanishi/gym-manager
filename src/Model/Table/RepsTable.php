<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reps Model
 *
 * @property \App\Model\Table\ExercicesTable&\Cake\ORM\Association\BelongsTo $Exercices
 * @property \App\Model\Table\RoutineDaysTable&\Cake\ORM\Association\BelongsToMany $RoutineDays
 *
 * @method \App\Model\Entity\Rep newEmptyEntity()
 * @method \App\Model\Entity\Rep newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Rep[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rep get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rep findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Rep patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rep[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rep|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rep saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rep[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rep[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rep[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rep[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RepsTable extends Table
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

        $this->setTable('reps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Exercices', [
            'foreignKey' => 'exercice_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('RoutineDays', [
            'foreignKey' => 'rep_id',
            'targetForeignKey' => 'routine_day_id',
            'joinTable' => 'routine_days_reps',
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
            ->integer('series')
            ->requirePresence('series', 'create')
            ->notEmptyString('series');

        $validator
            ->integer('repetition')
            ->requirePresence('repetition', 'create')
            ->notEmptyString('repetition');

        $validator
            ->integer('order')
            ->requirePresence('order', 'create')
            ->notEmptyString('order');

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
        $rules->add($rules->existsIn(['exercice_id'], 'Exercices'), ['errorField' => 'exercice_id']);

        return $rules;
    }
}
