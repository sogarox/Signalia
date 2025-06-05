<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Actividades Model
 *
 * @method \App\Model\Entity\Actividad newEmptyEntity()
 * @method \App\Model\Entity\Actividad newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Actividad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Actividad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Actividad findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Actividad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Actividad[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Actividad|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actividad saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ActividadesTable extends Table
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

        $this->setTable('actividades');
        $this->setDisplayField('titulo');
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
            ->integer('id_modulo')
            ->requirePresence('id_modulo', 'create')
            ->notEmptyString('id_modulo');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 100)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->scalar('descripcion')
            ->requirePresence('descripcion', 'create')
            ->notEmptyString('descripcion');

        $validator
            ->scalar('tipo')
            ->allowEmptyString('tipo');

        $validator
            ->scalar('contenido')
            ->allowEmptyString('contenido');

        $validator
            ->scalar('respuesta_correcta')
            ->maxLength('respuesta_correcta', 255)
            ->allowEmptyString('respuesta_correcta');

        return $validator;
    }
}
