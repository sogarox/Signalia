<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Calificaciones Model
 *
 * @method \App\Model\Entity\Calificacione newEmptyEntity()
 * @method \App\Model\Entity\Calificacione newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Calificacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Calificacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Calificacione findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Calificacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Calificacione[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Calificacione|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Calificacione saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Calificacione[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Calificacione[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Calificacione[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Calificacione[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CalificacionesTable extends Table
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

        $this->setTable('calificaciones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id_usuario')
            ->requirePresence('id_usuario', 'create')
            ->notEmptyString('id_usuario');

        $validator
            ->integer('id_actividad')
            ->requirePresence('id_actividad', 'create')
            ->notEmptyString('id_actividad');

        $validator
            ->decimal('calificacion')
            ->requirePresence('calificacion', 'create')
            ->notEmptyString('calificacion');

        $validator
            ->date('fecha_realizacion')
            ->requirePresence('fecha_realizacion', 'create')
            ->notEmptyDate('fecha_realizacion');

        return $validator;
    }
}
