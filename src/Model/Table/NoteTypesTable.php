<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NoteTypes Model
 *
 * @property \App\Model\Table\NotesTable&\Cake\ORM\Association\HasMany $Notes
 *
 * @method \App\Model\Entity\NoteType newEmptyEntity()
 * @method \App\Model\Entity\NoteType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\NoteType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NoteType get($primaryKey, $options = [])
 * @method \App\Model\Entity\NoteType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\NoteType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NoteType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\NoteType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NoteType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NoteType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\NoteType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\NoteType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\NoteType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class NoteTypesTable extends Table
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

        $this->setTable('note_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Notes', [
            'foreignKey' => 'note_type_id',
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

        $validator
            ->integer('level')
            ->requirePresence('level', 'create')
            ->notEmptyString('level');

        return $validator;
    }
}
