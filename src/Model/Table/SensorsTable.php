<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sensors Model
 *
 * @property \App\Model\Table\PlotsTable&\Cake\ORM\Association\BelongsTo $Plots
 * @property \App\Model\Table\DetailsTable&\Cake\ORM\Association\HasMany $Details
 *
 * @method \App\Model\Entity\Sensor newEmptyEntity()
 * @method \App\Model\Entity\Sensor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Sensor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sensor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sensor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Sensor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sensor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sensor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sensor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sensor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sensor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sensor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sensor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SensorsTable extends Table
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

        $this->setTable('sensors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Plots', [
            'foreignKey' => 'plot_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Details', [
            'foreignKey' => 'sensor_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn(['plot_id'], 'Plots'));

        return $rules;
    }
}
