<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Detail;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Details Model
 *
 * @property SensorsTable&BelongsTo $Sensors
 *
 * @method Detail newEmptyEntity()
 * @method Detail newEntity(array $data, array $options = [])
 * @method Detail[] newEntities(array $data, array $options = [])
 * @method Detail get($primaryKey, $options = [])
 * @method Detail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method Detail patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Detail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method Detail|false save(EntityInterface $entity, $options = [])
 * @method Detail saveOrFail(EntityInterface $entity, $options = [])
 * @method Detail[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method Detail[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method Detail[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method Detail[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class DetailsTable extends Table
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

        $this->setTable('details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sensors', [
            'foreignKey' => 'sensor_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('soil_moisture')
            ->requirePresence('soil_moisture', 'create')
            ->notEmptyString('soil_moisture');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['sensor_id'], 'Sensors'));

        return $rules;
    }
}
