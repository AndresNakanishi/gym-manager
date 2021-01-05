<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RoutinesRoutineDays Model
 *
 * @property \App\Model\Table\RoutinesTable&\Cake\ORM\Association\BelongsTo $Routines
 * @property \App\Model\Table\RoutineDaysTable&\Cake\ORM\Association\BelongsTo $RoutineDays
 *
 * @method \App\Model\Entity\RoutinesRoutineDay newEmptyEntity()
 * @method \App\Model\Entity\RoutinesRoutineDay newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RoutinesRoutineDay[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RoutinesRoutineDay get($primaryKey, $options = [])
 * @method \App\Model\Entity\RoutinesRoutineDay findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RoutinesRoutineDay patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RoutinesRoutineDay[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RoutinesRoutineDay|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoutinesRoutineDay saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoutinesRoutineDay[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RoutinesRoutineDay[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RoutinesRoutineDay[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RoutinesRoutineDay[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RoutinesRoutineDaysTable extends Table
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

        $this->setTable('routines_routine_days');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Routines', [
            'foreignKey' => 'routine_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RoutineDays', [
            'foreignKey' => 'routine_day_id',
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
        $rules->add($rules->existsIn(['routine_id'], 'Routines'), ['errorField' => 'routine_id']);
        $rules->add($rules->existsIn(['routine_day_id'], 'RoutineDays'), ['errorField' => 'routine_day_id']);

        return $rules;
    }
}
