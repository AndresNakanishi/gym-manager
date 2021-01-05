<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RoutineDaysReps Model
 *
 * @property \App\Model\Table\RoutineDaysTable&\Cake\ORM\Association\BelongsTo $RoutineDays
 * @property \App\Model\Table\RepsTable&\Cake\ORM\Association\BelongsTo $Reps
 *
 * @method \App\Model\Entity\RoutineDaysRep newEmptyEntity()
 * @method \App\Model\Entity\RoutineDaysRep newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RoutineDaysRep[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RoutineDaysRep get($primaryKey, $options = [])
 * @method \App\Model\Entity\RoutineDaysRep findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RoutineDaysRep patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RoutineDaysRep[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RoutineDaysRep|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoutineDaysRep saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoutineDaysRep[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RoutineDaysRep[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RoutineDaysRep[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RoutineDaysRep[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RoutineDaysRepsTable extends Table
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

        $this->setTable('routine_days_reps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('RoutineDays', [
            'foreignKey' => 'routine_day_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Reps', [
            'foreignKey' => 'rep_id',
            'joinType' => 'INNER',
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
        $rules->add($rules->existsIn(['routine_day_id'], 'RoutineDays'), ['errorField' => 'routine_day_id']);
        $rules->add($rules->existsIn(['rep_id'], 'Reps'), ['errorField' => 'rep_id']);

        return $rules;
    }
}
