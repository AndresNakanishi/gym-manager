<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RoutineDays Model
 *
 * @property \App\Model\Table\RepsTable&\Cake\ORM\Association\BelongsToMany $Reps
 * @property \App\Model\Table\RoutinesTable&\Cake\ORM\Association\BelongsToMany $Routines
 *
 * @method \App\Model\Entity\RoutineDay newEmptyEntity()
 * @method \App\Model\Entity\RoutineDay newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RoutineDay[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RoutineDay get($primaryKey, $options = [])
 * @method \App\Model\Entity\RoutineDay findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RoutineDay patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RoutineDay[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RoutineDay|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoutineDay saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoutineDay[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RoutineDay[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RoutineDay[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RoutineDay[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RoutineDaysTable extends Table
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

        $this->setTable('routine_days');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Reps', [
            'foreignKey' => 'routine_day_id',
            'targetForeignKey' => 'rep_id',
            'joinTable' => 'routine_days_reps',
        ]);
        $this->belongsToMany('Routines', [
            'foreignKey' => 'routine_day_id',
            'targetForeignKey' => 'routine_id',
            'joinTable' => 'routines_routine_days',
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
            ->maxLength('name', 40)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
