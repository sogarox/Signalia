<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @method \App\Model\Entity\Usuario newEmptyEntity()
 * @method \App\Model\Entity\Usuario newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
        $this->setDisplayField('nombres');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('nombres')
            ->maxLength('nombres', 60)
            ->requirePresence('nombres', 'create')
            ->notEmptyString('nombres');

        $validator
            ->scalar('apellidos')
            ->maxLength('apellidos', 60)
            ->requirePresence('apellidos', 'create')
            ->notEmptyString('apellidos');

        $validator
            ->scalar('correo')
            ->maxLength('correo', 100)
            ->requirePresence('correo', 'create')
            ->notEmptyString('correo');

        $validator
            ->scalar('telefono')
            ->maxLength('telefono', 20)
            ->allowEmptyString('telefono');

        $validator
            ->scalar('usuario')
            ->maxLength('usuario', 50)
            ->requirePresence('usuario', 'create')
            ->notEmptyString('usuario');

        $validator
            ->scalar('contrasena')
            ->maxLength('contrasena', 100)
            ->requirePresence('contrasena', 'create')
            ->notEmptyString('contrasena');

        $validator
            ->scalar('rol')
            ->requirePresence('rol', 'create')
            ->notEmptyString('rol');

        $validator
            ->scalar('clave_moderador')
            ->maxLength('clave_moderador', 50)
            ->allowEmptyString('clave_moderador');

        return $validator;
    }
}
